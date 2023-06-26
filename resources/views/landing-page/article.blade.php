@extends('layouts.landing-page')

@section('navbar')
{{ 'header-inner-pages' }}
@endsection

@section('content')
<main id="main">

    <!-- ======= Blog Single ======= -->
    <div class="main-content paddsection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="container-main single-main">
                            <div class="col-md-12">
                                <div class="block-main mb-30">
                                    <img src="assets/img/blog-post-big.jpg" class="img-responsive" alt="reviews2">
                                    <div class="content-main single-post padDiv">
                                        <div class="article-txt">
                                            <h4><a href="#">{{ $article->title }}</a></h4>
                                        </div>
                                        <div class="post-meta">
                                            <ul class="list-unstyled mb-0">
                                                <li class="author">by:<a href="#">{{ $article->author }}</a></li>
                                                <li class="date">date:<a href="#">{{ $article->created_at }}</a></li>
                                            </ul>
                                        </div>
                                        <p class="mb-30">{!! $article->text !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Blog Single -->
</main><!-- End #main -->
@endsection