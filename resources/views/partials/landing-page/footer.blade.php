@php
   $socialMedias = App\Models\SocialMedia::all();
@endphp

<!-- ======= Footer ======= -->
<div id="footer" class="text-center">
    <div class="container">
        <div class="socials-media text-center">

            <ul class="list-unstyled">
                @foreach ($socialMedias as $socialMedia)
                    <li><a href="{{ $socialMedia->url }}"><i class="{{ $socialMedia->icon }}"></i></a></li>
                @endforeach
            </ul>

        </div>

        <p>&copy; Copyrights Folio. All rights reserved.</p>

        <div class="credits">
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

<!-- Template Main JS File -->
<script src="{{ asset('/assets') }}/js/main.js"></script>