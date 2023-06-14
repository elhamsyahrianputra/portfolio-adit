@extends('layouts.landing-page')

@section('content')
    <!-- ======= Hero Section ======= -->
<div id="hero" class="home" style="background-color: rgba(0, 0, 0, 0.8)">
    {{-- <div id="hero" class="home"
        style="background: url('{{ asset('/assets/img/home-bg.jpg') }}') repeat scroll center center/cover;"> --}}
    
        <div class="container">
            <div class="hero-content">
                <h1>I'm <span class="typed"
                        data-typed-items="Muhammad Aditya Wisnu Wardana, Collage Student"></span>
                </h1>
                <p>Universitas Sebelas Maret</p>
    
                <ul class="list-unstyled list-social">
                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Hero -->
    
    <main id="main">
    
        <!-- ======= Profile Section ====== -->
        <div id="profile" class="paddsection">
            <div class="container">
                <ul class="nav nav-pills d-flex justify-content-evenly mb-3" id="pills-tab" role="tablist">
                    @foreach ($profiles as $profile)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}"
                            id="pills-{{ $profile->id }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ $profile->id }}" type="button" role="tab"
                            aria-controls="pills-{{ $profile->id }}" aria-selected="false">{{ $profile->name
                            }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    
        <div class="tab-content" id="pills-tabContent">
            @foreach ($profiles as $profile)
            <div class="tab-pane fade  {{ $loop->iteration == 1 ? 'show active' : '' }}"
                id="pills-{{ $profile->id }}" role="tabpanel" aria-labelledby="pills-{{ $profile->id }}-tab"
                tabindex="0">
    
                <!-- ======= About Section ======= -->
                <div id="about" class="paddsection">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-lg-4 ">
                                <div class="div-img-bg">
                                    <div class="about-img">
                                        <img src="{{ asset('storage/'.$profile->profile_image) }}" class="img-responsive"
                                            alt="me">
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
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-briefcase"></i>
                                        <span>UI/UX DESIGN</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-card-checklist"></i>
                                        <span>BRAND IDENTITY</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-bar-chart"></i>
                                        <span>WEB DESIGN</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-binoculars"></i>
                                        <span>MOBILE APPS</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-brightness-high"></i>
                                        <span>Analytics</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                                <div class="swiper-slide">
                                    <div class="services-block">
                                        <i class="bi bi-calendar4-week"></i>
                                        <span>PHOTOGRAPHY</span>
                                        <p class="separator">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                    </div>
                                </div><!-- End testimonial item -->
    
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
    
                </div>
                <!-- End Services Section -->
    
                <!-- ======= Resume Section ======= -->
                <div id="resume" class="resume paddsection">
                    <div class="container" data-aos="fade-up">
    
                        <div class="section-title text-center">
                            <h2>Resume / Riwayat Pengalaman</h2>
                            <p>Berikut merupakan Resume atau riwayat penglaman saya </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="resume-title">Sumary | Ringkasan</h3>
                                <div class="resume-item pb-0">
                                    <h4>{{ $profile->name }}</h4>
                                    <ul>
                                        <li>{{ $profile->birthplace }}</li> <!-- Tempat Lahir -->
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
                                    <ul>
                                        <li>Membuat RPP</li>
                                        <li>Membuat Modul Ajar</li>
                                        <li>Membuat PPT</li>
                                        <li>Membuat DLL</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Resume Section -->
            </div>
            @endforeach
        </div>
    
        <!-- ======= BIPA Section ======= -->
        <div id="bipa" class="paddsection">
    
            <div class="container">
                <div class="section-title text-center">
                    <h2>BIPA</h2>
                </div>
            </div>
    
            <div class="container">
                <div class="row text-center align-items-center">
                    <div class="col">
                        <a href="https://baswara-uns.com" target="_blank">
                            <img src="{{ asset('/assets/img/baswara.png') }}" style="width: 80%" alt="oajjawf">
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://narasibudaya.com" target="_blank">
                            <img src="{{ asset('/assets/img/narasibudaya.png') }}" style="width: 80%" alt="oajjawf">
                        </a>
                    </div>
                </div>
            </div>
    
        </div>
        <!-- End BIPA Section -->
    
        <!-- ======= Portfolio Section ======= -->
        <div id="portfolio" class="paddsection">
    
            <div class="container">
                <div class="section-title text-center">
                    <h2>My Portfolio | Hasil Karyaku</h2>
                </div>
            </div>
    
            <div class="container">
    
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>
    
                <div class="row portfolio-container">
    
                    @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <img src="{{ asset('storage/'.$portfolio->portfolio_image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $portfolio->name }}</h4>
                            <a href="{{ asset('storage/'.$portfolio->portfolio_image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $portfolio->name }}"><i class="bx bx-zoom-in"></i></a>
                            <a href="/portfolio/{{ $portfolio->id }}" class="details-link" title="More Details" target="_blank"><i class="bx bx-link-external"></i></a>
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
                    <h2>article | Tulisanku</h2>
                </div>
            </div>
    
            <div class="container">
                <div class="article-block">
                    <div class="row">
    
                        @foreach ($articles as $article)
                        <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                            <div class="article-info">

                                <a href="/article/{{ $article->slug }}" target="_blank"><img src="{{ asset('storage/'.$article->article_image) }}"
                                        class="img-responsive" alt="img" style="max-height: 311.99px; background: rgba(0, 0, 0, 0.5)"></a>

                                <div class="article-txt">

                                    <h4><a href="/article/{{ $article->slug }}" target="_blank">{{ $article->title }}</a></h4>
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
                    <h2>Video</h2>
                </div>
            </div>
    
            <div class="container">
                <div class="article-block">
                    <div class="row">
    
                        @foreach ($videos as $video)
                        <div class="col-lg-3 col-md-4">
                            <div class="article-info">
    
                                <a href="/video/{{ $video->slug }}"><img src="{{ asset('storage/'.$video->cover_url) }}" class="img-responsive" alt="img"></a>
    
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
    
                        <div class="col-lg-6">
                            <div class="contact-contact">
    
                                <h2 class="mb-30">GET IN TOUCH</h2>
    
                                <ul class="contact-details">
                                    <li><span>Jl. Ir. Soekarno No.1, Surakarta</span></li>
                                    <li><span>Jawa Tengah, Indonesia</span></li>
                                    <li><span>+62 08123456789</span></li>
                                    <li><span>adityawisnu@gmail.com</span></li>
                                </ul>
    
                            </div>
                        </div>
    
                        <div class="col-lg-6">
                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="row gy-3">
    
                                    <div class="col-lg-6">
                                        <div class="form-group contact-block1">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Your Name" required>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Your Email" required>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject" required>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" placeholder="Message"
                                                required></textarea>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-12">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                    </div>
    
                                    <div class="mt-0">
                                        <input type="submit" class="btn btn-defeault btn-send" value="Send message">
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