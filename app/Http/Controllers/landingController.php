<?php

namespace App\Http\Controllers;

use App\Models\Owner_Feedback;
use App\Models\picture;
use App\Models\post;
 use App\Models\ReviewRating;
 use Illuminate\Database\Eloquent\Builder ;


class landingController extends Controller
{
    public function index(){
        $posts = Post::whereHas('Appartment', function (Builder $query) {
            $query->where('room_num', '>', 0);
        })
        ->orderBy('updated_at', 'desc')
        ->limit(9)
        ->get();
        $picture=picture::all();
        $comments =ReviewRating::limit(3)->get();
        $owner_rate=Owner_Feedback::orderby('star_rating','desc')->get();

        return view('landing', compact('comments','posts','picture','owner_rate'));
    }
}
