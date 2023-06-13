@php
   
   $profiles = App\Models\Profile::all('name', 'id');
@endphp

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
         <a class="nav-link {{ Request::is('admin') ? ' ' : ' collapsed' }}" href="/admin">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
         </a>
      </li>

      <!-- Profile -->
      <li class="nav-heading">Profile</li>

      <li class="nav-item">
         <a class="nav-link {{ Request::is('admin/profiles*')?'':' collapsed' }}" data-bs-target="#profiles-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
         </a>
         <ul id="profiles-nav" class="nav-content collapse {{ Request::is('admin/profiles*')?' show':'' }}" data-bs-parent="#sidebar-nav">
            @foreach ($profiles as $profile)
            <li>
               <a href="/admin/profiles/{{ $profile->id }}" class='{{ Request::is("admin/profiles/$profile->id")?'active':'' }}''>
                  <i class="bi bi-circle"></i><span>{{ $profile->name }}</span>
               </a>
            </li>
            @endforeach
         </ul>
      </li>

      <!-- Content -->
      <li class="nav-heading">Portfolio</li>

         <!-- Portfolio -->
      <li class="nav-item  {{ Request::is('admin/portfolios*')?' collapsed':'' }}">
         <a class="nav-link collapsed" href="/admin/portfolios">
            <i class="bi bi-clipboard"></i>
            <span>Portfolio</span>
         </a>
      </li>

         <!-- Article -->
      <li class="nav-item  {{ Request::is('admin/article*')?' collapsed':'' }}">
         <a class="nav-link collapsed" href="/admin/article">
            <i class="bi bi-journals"></i>
            <span>Article</span>
         </a>
      </li>

      <!-- Video -->
      <li class="nav-item  {{ Request::is('admin/video*')?' collapsed':'' }}">
         <a class="nav-link collapsed" href="/admin/video">
            <i class="bi bi-camera-video"></i>
            <span>Video</span>
         </a>
      </li>

   </ul>

</aside><!-- End Sidebar-->