<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<!-- Logo -->
<div class="d-flex align-items-center justify-content-between">
    <a href="/" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Admin</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div>

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <!-- Profile Nav -->
        <li class="nav-item dropdown pe-3">

            <!-- Profile Image Icon -->
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img class="rounded-circle" src="{{ asset('storage/'.auth()->user()->profile->profile_image) }}" alt="Profile Image" style="object-fit: cover; height: 36px; width: 36px;">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->profile->name }}</span>
            </a>

            <!-- Profile Dropdown Items -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="/admin/profiles/{{ auth()->user()->profile->id }}">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item d-flex align-items-center">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </button>
                    </form>
                </li>

            </ul>
        </li>

    </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->