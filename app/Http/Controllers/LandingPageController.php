<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {

        return view('landing-page.index', [
            'title' => '',
            'profiles' => Profile::all(),
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
}
