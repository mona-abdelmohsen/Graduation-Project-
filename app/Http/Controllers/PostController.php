<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidationRequest;
use App\Models\appartment;
use App\Models\branch;
use App\Models\picture;
use App\Models\post;
use App\Models\region;
use App\Models\User;
use App\Notifications\NewPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:انشاء بوست', ['only' => ['index', 'store', 'create', 'show', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        $posts = post::all();
        return view ('posts.regions');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostValidationRequest $request)
    {

        try {
            $validated = $request->validated();

            $appartment = appartment::create([
                'contact' => $request->contact,
                'type' => $request->type,
                'room_num' => $request->room_num,
                'location' => $request->location,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'user_id' => auth()->user()->id,
                'price' => $request->price,
                'status' => 'لم تسكن'

            ]);
            $post = post::create([
                'description' => $request->description,
                'user_id' => auth()->user()->id,
                'appartment_id' => $appartment->id,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'type' => $request->type,

            ]);
            if ($request->hasFile('photos')) {
                $files = $request->file('photos');
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $filename = $file->storeAs($post->id, $filename, 'mypublic');
                    picture::create([
                        'picture_path' => $filename,
                        'post_id' => $post->id,
                    ]);
                }
                
             }

            $branch_name = branch::find($request->branch_id);
            /*  notification by database */
            $users = User::where('roles_name', 'مستخدم')->get();
            Notification::send($users, new NewPost( auth()->user()->id, $post->id));


            toastr()->success('تم إضافة البيانات بنجاح');

            if ($request->B) {
                return redirect()->route('branches.show', $request->branch_id);
            }
            return redirect()->back();
        } catch (\Exception $e) {

            toastr()->error('لم يتم إضافة البيانات ');
            if ($request->B) {
                return redirect()->route('branches.show', $request->branch_id)->withErrors(['error' => $e->getMessage()]);
            }
            return 'oops';
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(PostValidationRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $post = post::find($id);
            $appartment = appartment::where('id', $post->appartment_id)->first();
            $pictures = picture::where('post_id', $id)->get();
            $post->update([
                'description' => $request->description,
                'user_id' => auth()->user()->id,
                'appartment_id' => $appartment->id,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'type' => $request->type,

            ]);
            $status = 'لم تسكن';
            if ($request->room_num == 0) {
                $status = 'تم التسكين';
            }
            $appartment->update([
                'contact' => $request->contact,
                'type' => $request->type,
                'room_num' => $request->room_num,
                'location' => $request->location,
                'region_id' => $request->region_id,
                'branch_id' => $request->branch_id,
                'user_id' => auth()->user()->id,
                'price' => $request->price,
                'status' => $status
            ]);
            if ($request->hasFile('photos')) {
                $i = 0;
                $files = $request->file('photos');
                //delete from public
                Storage::disk('mypublic')->deleteDirectory($post->id);
                //delete from database
                picture::where('post_id',$post->id)->delete();
                foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    $filename = $file->storeAs($post->id, $filename, 'mypublic');
                    picture::create([
                        'picture_path' => $filename,
                        'post_id' => $post->id,
                    ]);
                }
            }

            toastr()->success('تم تحديث البيانات بنجاح');
            if ($request->B) {
                return redirect()->route('branches.show', $request->branch_id);
            }
            return back();
        } catch (\Exception $e) {

            toastr()->error('لم يتم تحديث البيانات ');
            if ($request->B) {
                return redirect()->route('branches.show', $request->branch_id)->withErrors(['error' => $e->getMessage()]);
            }
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request)
    {
        $post = post::find($id);
        Storage::disk('mypublic')->deleteDirectory($post->id);
        $post->delete();
        toastr()->success('تم حذف البيانات بنجاح');
        if ($request->B) {
            return redirect()->route('branches.show', $request->branch_id);
        }
        return back();
    }

    public function getRegion($id)
    {
        $regions = region::where('branch_id', $id)->pluck('name', 'id');
        return json_encode($regions);
    }

    public function filter_by_region(Request $request)
    {

        $posts = post::where('region_id', $request->region_id)->orderBy('created_at', 'desc')->get();
        if (strlen($posts) == 2) {
            $posts = post::where('branch_id', $request->branch_id)->orderBy('created_at', 'desc')->get();
        }
        $Branch = branch::where('id', $request->branch_id)->first();
        $regions = region::where('branch_id', $request->branch_id)->get();
        $picture = picture::all();
        $branches = branch::all();

        return view('branches.branch', compact('Branch', 'regions', 'posts', 'picture', 'branches'));
    }

    public function filter_by_Type(Request $request)
    {
        // //select by type
        $posts = post::where('branch_id',  $request->branch_id)->where('type', $request->type)->get();
        if (strlen($posts) == 2) {
            //select all posts of branch
            $posts = post::where('branch_id',  $request->branch_id)->orderBy('created_at', 'desc')->get();
        }
        $Branch = branch::where('id', $request->branch_id)->first();
        $regions = region::where('branch_id', $request->branch_id)->get();
        $picture = picture::all();
        $branches = branch::all();
        return view('branches.branch', compact('Branch', 'regions', 'posts', 'picture', 'branches'));
    }
}
