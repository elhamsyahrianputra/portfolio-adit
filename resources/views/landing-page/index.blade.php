<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Muhammad Aditya Wisnu Wardana | My Portfolio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{--
    <link href="{{ asset('/assets') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/assets') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">

            {{-- <a href="index.html" class="logo"><img src="{{ asset('/assets') }}/img/logo.png" alt=""
                    class="img-fluid"></a> --}}
            <!-- Uncomment below if you prefer to use an text logo -->
            <h1 class="logo"><a href="/">My Portfolio</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#resume">Resume</a></li>
                    <li><a class="nav-link scrollto" href="#bipa">BIPA</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#journal">Blog</a></li>
                    <li><a class="nav-link scrollto" href="#video">Video</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

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

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-1.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-2.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Web 3"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-3.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 2"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-4.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Card 2"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-5.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="Web 2"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <img src="{{ asset('/assets') }}/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <a href="{{ asset('/assets') }}/img/portfolio/portfolio-6.jpg"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="App 3"><i class="bx bx-plus"></i></a>
                                <a href="/portfolio-details" class="details-link" title="More Details"
                                    target="_blank"><i class="bx bx-link"></i></a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- End Portfolio Section -->

            <!-- ======= Journal Section ======= -->
            <div id="journal" class="text-left paddsection">

                <div class="container">
                    <div class="section-title text-center">
                        <h2>journal | Tulisanku</h2>
                    </div>
                </div>

                <div class="container">
                    <div class="journal-block">
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="journal-info">

                                    <a href="/journal"><img src="{{ asset('/assets') }}/img/blog-post-1.jpg"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/journal">SO LETS MAKE THE MOST IS BEAUTIFUL</a></h4>
                                        <p class="separator">To an English person, it will seem like simplified English
                                        </p>

                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="journal-info">

                                    <a href="/journal"><img src="{{ asset('/assets') }}/img/blog-post-2.jpg"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/journal">WE'RE GONA MAKE DREAMS COMES</a></h4>
                                        <p class="separator">To an English person, it will seem like simplified English
                                        </p>

                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="journal-info">

                                    <a href="/journal"><img src="{{ asset('/assets') }}/img/blog-post-3.jpg"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/journal">NEW LIFE CIVILIZATIONS TO BOLDLY</a></h4>
                                        <p class="separator">To an English person, it will seem like simplified English
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End Journal Section -->

            <!-- ======= Video Section ======= -->
            <div id="video" class="text-left paddsection">

                <div class="container">
                    <div class="section-title text-center">
                        <h2>Video</h2>
                    </div>
                </div>

                <div class="container">
                    <div class="journal-block">
                        <div class="row">

                            <div class="col-lg-3 col-md-4">
                                <div class="journal-info">

                                    <a href="/video"><img src="https://source.unsplash.com/random/416x312/?creative"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/video">Video 1</a></h4>

                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="journal-info">

                                    <a href="/video"><img src="https://source.unsplash.com/random/416x312/?read,book"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/video">Video 2</a></h4>

                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="journal-info">

                                    <a href="/video"><img src="https://source.unsplash.com/random/416x312/?book"
                                            class="img-responsive" alt="img"></a>

                                    <div class="journal-txt">

                                        <h4><a href="/video">Video 3</a></h4>
                                    </div>

                                </div>
                            </div>

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

        <!-- ======= Footer ======= -->
        <div id="footer" class="text-center">
            <div class="container">
                <div class="socials-media text-center">

                    <ul class="list-unstyled">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>

                </div>

                <p>&copy; Copyrights Folio. All rights reserved.</p>

                <div class="credits">
                    <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Folio
      -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>

            </div>
        </div>
        <!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="{{ asset('/assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{ asset('/assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('/assets') }}/vendor/typed.js/typed.umd.js"></script>
        <script src="{{ asset('/assets') }}/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('/assets') }}/js/main.js"></script>

</body>

</html>