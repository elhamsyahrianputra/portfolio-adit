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

      <!-- Landing Page -->
      <li class="nav-heading">Landing Page</li>

      <li class="nav-item  {{ Request::is('admin/carousels*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/carousels*') ? '' : ' collapsed' }}" href="/admin/carousels">
            <i class="bi bi-images"></i>
            <span>Carousels</span>
         </a>
      </li>

      <li class="nav-item  {{ Request::is('admin/collaborations*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/collaborations*') ? '' : ' collapsed' }}" href="/admin/collaborations">
            <i class="bi bi-people"></i>
            <span>Collaboration</span>
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

      <li class="nav-item  {{ Request::is('admin/skills*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/skills*') ? '' : ' collapsed' }}" href="/admin/skills">
            <i class="bi bi-lightbulb"></i>
            <span>Skill</span>
         </a>
      </li>

      <!-- Content -->
      <li class="nav-heading">Content</li>

         <!-- Portfolio -->
      <li class="nav-item  {{ Request::is('admin/portfolios*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/portfolios*') ? '' : ' collapsed' }}" href="/admin/portfolios">
            <i class="bi bi-clipboard"></i>
            <span>Portfolio</span>
         </a>
      </li>

         <!-- Article -->
      <li class="nav-item  {{ Request::is('admin/articles*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/articles*') ? '' : ' collapsed' }}" href="/admin/articles">
            <i class="bi bi-articles"></i>
            <span>Article</span>
         </a>
      </li>

      <!-- Video -->
      <li class="nav-item {{ Request::is('admin/videos*') ? '' : ' collapsed' }}">
         <a class="nav-link {{ Request::is('admin/videos*') ? '' : ' collapsed' }}" href="/admin/videos  ">
            <i class="bi bi-camera-video"></i>
            <span>Video</span>
         </a>
      </li>

         <!-- Content -->
         <li class="nav-heading">Message</li>

         <!-- Portfolio -->
         <li class="nav-item  {{ Request::is('admin/messages*') ? '' : ' collapsed' }}">
            <a class="nav-link {{ Request::is('admin/messages*') ? '' : ' collapsed' }}" href="/admin/messages">
               <i class="bi bi-envelope"></i>
               <span>Message</span>
            </a>
         </li>

   </ul>

</aside><!-- End Sidebar-->
