@extends('layouts.landing-page')

@section('navbar')
    {{ 'header-inner-pages' }}
@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold">{{ $portfolio->name }}</h2>
                <ol>
                    <li><a href="/">Home</a></li>
                    <li>Portfolio</li>
                    <li>{{ $portfolio->name }}</li>
                </ol>
            </div>

        </div>
    </section>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            {{-- <div class="swiper-slide">
                                <img src="{{ asset('storage/'.$portfolio->portfolio_image) }}" alt="">
                            </div> --}}

                            <div>
                                <img src="{{ asset('storage/'.$portfolio->portfolio_image) }}" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: {{ $portfolio->category }}</li>
                            <li><strong>Project date</strong>: {{ $portfolio->project_date }}</li>

                            @if ($portfolio->client_project !== null)
                            <li><strong>Client</strong>: {{ $portfolio->client_project }}</li>
                            @endif

                            @if ($portfolio->project_url !== null)
                            <li><strong>Project URL</strong>: <a href="{{ $portfolio->project_url }}">{{ $portfolio->project_url }}</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Project Description</h2>
                        <p>{{ $portfolio->description }}</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection