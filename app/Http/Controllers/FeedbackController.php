<?php

namespace App\Http\Controllers;

use App\Models\ReviewRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:الاراء', ['only' => ['index']]);
       
    }

    public function index()
    {
        $comments=ReviewRating::orderBy('created_at', 'desc')->limit(10)->get();
            return view('feedback.feedback_list',compact('comments'));
    }
   
       
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feedback.feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ],
        [
            'comment.required'=>'!!!هذا الحقل مطلوب',
            
        ]);
        $review = new ReviewRating();
            $review->comments= $request->comment;
            $review->star_rating = $request->rating;
            $review->user_id = Auth::user()->id;
            $review->save();
            if($review){
            toastr()->success('تم إضافة البيانات بنجاح');
            }
            return redirect()->route('home');
    }
    

   
}
