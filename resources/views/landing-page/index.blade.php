@extends('layouts.landing-page')

@section('content')
<!-- ======= Hero Section ======= -->
<div id="hero" class="position-absolute z-3">
    <div class="container">
        <div class="hero-content">
            <h1><span class="typed" data-typed-items="Halo Selamat Datang di Selasar Belajarku, yang dikelola oleh Muhammad Aditya Wisnu Wardana"></span>
            </h1>
            <p>Universitas Sebelas Maret</p>

            <ul class="list-unstyled list-social">
                <li><a href="https://instagram.com/cerdazid?igshid=MzRlODBiNWFlZA=="><i class="bi bi-instagram"></i></a></li>
                <li><a href="https://www.tiktok.com/@cerdazid"><i class="bi bi-tiktok"></i></a></li>
                <li><a href="https://twitter.com/adityawisnu246"><i class="bi bi-twitter"></i></a></li>
                <li><a href="https://www.linkedin.com/in/muhammad-aditya-wisnu-wisnu-675775170/"><i class="bi bi-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div id="carousel-image" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($carousels as $carousel)
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('storage/'.$carousel->image_url) }}" class="d-block w-100" alt="carousel image" style="height: 100vh; object-fit: cover;">
        </div>
        @endforeach
    </div>
</div>
<!-- End Hero -->

<main id="main">
    <!-- ======= Profile Section ======= -->
    <div id="profile">
        <!-- ======= About Section ======= -->
        <div id="about" class="paddsection">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-4 ">
                        <div class="div-img-bg">
                            <div class="about-img">
                                <img src="{{ asset('storage/'.$profile->profile_image) }}" class="img-responsive" alt="me">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="about-descr">
                            <p class="p-heading">{{ $profile->description }}</p>

                            <p class="separator">{{ $profile->detail }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <div id="services">
            <div class="container">
                <div class="services-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @foreach ($skills as $skill)
                        <div class="swiper-slide">
                            <div class="services-block">
                                <i class="{{ $skill->icon }}"></i>
                                <span class="text-uppercase">{{ $skill->name }}</span>
                                <p class="separator">
                                    {{ $skill->description }}
                                </p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
        <!-- End Services Section -->
    </div>
    
    <!-- ======= Resume Section ======= -->
    <div id="resume" class="resume paddsection">
        <div class="container" data-aos="fade-up">

            <div class="section-title text-center">
                <h2>Tentangku</h2>
                <p>Berikut merupakan Resume atau riwayat penglaman saya </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="resume-title">Sumary | Ringkasan</h3>
                    <div class="resume-item pb-0">
                        <h4>{{ $profile->name }}</h4>
                        <ul>
                            <li>{{ $profile->birthplace }}, {{ $profile->birthdate->format('d M Y') }}</li> <!-- Tempat Lahir -->
                            <li>{{ $profile->phone }}</li> <!-- No. Handphone -->
                            <li>{{ $profile->email }}</li> <!-- email -->
                        </ul>
                    </div>

                    <h3 class="resume-title">Education | Pendidikan</h3>

                    @foreach ($profile->educations as $education)
                    <div class="resume-item">
                        <h4>{{ $education->title }}</h4>
                        <h5>{{ $education->start_at }} - {{ $education->end_at }}</h5>
                        <p><em>{{ $education->place }}</em></p>
                        <p>{{ $education->description }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-6">
                    <h3 class="resume-title">Professional Experience</h3>
                    @foreach ($profile->experiences as $experience)
                    <div class="resume-item">
                        <h4>{{ $experience->title }}</h4>
                        <h5>
                            @if ( $experience->start_at === $experience->end_at )
                            {{ $experience->start_at }}
                            @else
                            {{ $experience->start_at }} - {{ $experience->end_at }}
                            @endif
                        </h5>
                        <p><em>{{ $experience->place }}</em></p>
                        <p>{{ $experience->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Resume Section -->

    <!-- ======= BIPA Section ======= -->
    <div id="bipa" class="paddsection">

        <div class="container">
            <div class="section-title text-center">
                <h2>Kunjungi Rekan Teras Belajarku</h2>
            </div>
        </div>

        <div class="container">
            <div class="row text-center align-items-center justify-content-center">
                @foreach ($collaborations as $collaboration)
                <div class="col-8 gy-5 col-sm-6 g-sm-1 col-lg-5">
                    <a href="{{ $collaboration->url }}" target="_blank">
                        <img src="{{ asset('storage/'. $collaboration->image_url ) }}" style="width: 80%" alt="{{ $collaboration->name }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- End BIPA Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="paddsection">

        <div class="container">
            <div class="section-title text-center">
                <h2>Hasil Karyaku</h2>
            </div>
        </div>

        <div class="container">

            {{-- <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div> --}}

            <div class="row portfolio-container">

                @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <img src="{{ asset('storage/'.$portfolio->portfolio_image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $portfolio->name }}</h4>
                        <a href="{{ asset('storage/'.$portfolio->portfolio_image) }}" data-gallery="portfolioGallery"
                            class="portfolio-lightbox preview-link" title="{{ $portfolio->name }}"><i
                                class="bx bx-zoom-in"></i></a>
                        <a href="/portfolio/{{ $portfolio->id }}" class="details-link" title="More Details"
                            target="_blank"><i class="bx bx-link-external"></i></a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </div>
    <!-- End Portfolio Section -->

    <!-- ======= Article Section ======= -->
    <div id="article" class="text-left paddsection">

        <div class="container">
            <div class="section-title text-center">
                <h2>Tulisanku</h2>
            </div>
        </div>

        <div class="container">
            <div class="article-block">
                <div class="row">

                    @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="article-info">

                            <a href="/article/{{ $article->slug }}" target="_blank"><img
                                    src="{{ asset('storage/'.$article->article_image) }}"
                                    alt="img" style="width: 100%; height: 290px; object-fit: cover"></a>

                            <div class="article-txt">

                                <h4><a href="/article/{{ $article->slug }}" target="_blank">{{ $article->title }}</a>
                                </h4>
                                {{-- <p class="separator">To an English person, it will seem like simplified English
                                </p> --}}

                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Article Section -->

    <!-- ======= Video Section ======= -->
    <div id="video" class="text-left paddsection">

        <div class="container">
            <div class="section-title text-center">
                <h2>Siniar</h2>
            </div>
        </div>

        <div class="container">
            <div class="article-block">
                <div class="row">

                    @foreach ($videos as $video)
                    <div class="col-lg-3 col-md-6">
                        <div class="article-info">

                            <a href="/video/{{ $video->slug }}"><img src="{{ asset('storage/'.$video->cover_url) }}" alt="img"  style="width:100%; height:220px; object-fit: cover"></a>

                            <div class="article-txt">

                                <h4><a href="/video/{{ $video->slug }}">{{ $video->title }}</a></h4>

                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Video Section -->

    <!-- ======= Contact Section ======= -->
    <div id="contact" class="paddsection">
        <div class="container">
            <div class="contact-block1">
                <div class="row">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="col-lg-6">
                        <div class="contact-contact">

                            <h2 class="mb-30">Narahubung</h2>

                            <ul class="contact-details">
                                <li><span>{{ $profile->address }}</span></li>
                                <li><span>{{ $profile->phone }}</span></li>
                                <li><span>{{ $profile->email }}</span></li>
                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form action="/message" method="POST">
                            @csrf
                            <div class="row gy-3">

                                <div class="col-lg-6">
                                    <div class="form-group contact-block1">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Nama Lengkap" value="{{ old('name') }}">

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Alamat Email" value="{{ old('email') }}">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            name="subject" id="subject" placeholder="Subjek"
                                            value="{{ old('subject') }}">

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control @error('message') is-invalid @enderror"
                                            name="message" placeholder="Pesan">{{ old('message') }}</textarea>

                                    </div>
                                </div>

                                <div class="mt-0">
                                    <button type="submit" class="btn btn-defeault btn-send" style="width: 100%">Send
                                        Message</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Section -->

</main>
<!-- End #main -->
@endsection