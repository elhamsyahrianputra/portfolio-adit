<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use App\Models\Carousel;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandingPageController extends Controller
{
    public function index() {

        return view('landing-page.index', [
            'title' => '',
            'carousels' => Carousel::all(),
            'profile' => Profile::first(),
            'portfolios' => Portfolio::all(),
            'articles' => Article::all(),
            'videos' => Video::all(),
        ]);
    }

    public function portfolio(Portfolio $portfolio) {
        return view('landing-page.portfolio', [
            'portfolio' => $portfolio,
        ]);
    }

    public function article(Article $article) {
        return view('landing-page.article', [
            'article' => $article,
        ]);
    }

    public function video(Video $video) {
        return view('landing-page.video', [
            'video' => $video,
        ]);
    }

    public function messageStore(Request $request) {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email:dns|required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validatedData->passes()) {
            Message::create($request->all());
            return redirect('/#contact')->with('success', 'Message has been sent successfully');
        } else {
            return redirect('/#contact')->with('error', 'Message failed to send');
        }
    }
}
