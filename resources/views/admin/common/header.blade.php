 <!-- Navbar -->
 <header class="navbar navbar-expand-md navbar-light d-print-none">
     <div class="container-xl">
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-nav flex-row order-md-last">

             <div class="nav-item dropdown">
                 <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                     <span class="avatar avatar-sm rounded-circle" style="background-image: url({{ URL::to('/') }}/public/backend_assets/static/profile_null.png)"><span class="badge bg-success"></span></span>
                     <div class="d-none d-xl-block ps-2">
                         <div>Admin</div>
                     </div>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                     <a href="{{ URL::to('/') }}/sign-out" class="dropdown-item">
                         Signout
                     </a>
                 </div>
             </div>
         </div>
         <div class="collapse navbar-collapse" id="navbar-menu">
             <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                 <ul class="navbar-nav">
                    <li class="nav-item <?= request()->is('admin/events-report') ? 'active' : '' ?>">
                         <a class="nav-link" href="{{ URL::to('/') }}/admin/events-report">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-timeline-event-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                     <path d="M12 20m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                     <path d="M10 20h-6"></path>
                                     <path d="M14 20h6"></path>
                                     <path d="M12 15l-2 -2h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-3l-2 2z"></path>
                                     <path d="M9 6h6"></path>
                                     <path d="M9 9h3"></path>
                                 </svg>
                             </span>&nbsp;
                             <span class="nav-link-title">
                                 Events
                             </span>
                         </a>
                     </li>
                     <li class="nav-item <?= request()->is('admin/club-report') ? 'active' : '' ?>">
                         <a class="nav-link" href="{{ URL::to('/') }}/admin/club-report">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clubs" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                     <path d="M12 3a4 4 0 0 1 3.164 6.447a4 4 0 1 1 -1.164 6.198v1.355l1 4h-6l1 -4l0 -1.355a4 4 0 1 1 -1.164 -6.199a4 4 0 0 1 3.163 -6.446z"></path>
                                 </svg>
                             </span>&nbsp;
                             <span class="nav-link-title">
                                 Club
                             </span>
                         </a>
                     </li>
                     <li class="nav-item <?= request()->is('admin/event-register-report') ? 'active' : '' ?>">
                         <a class="nav-link" href="{{ URL::to('/') }}/admin/event-register-report">
                             <span class="nav-link-icon d-md-none d-lg-inline-block">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                     <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                     <path d="M18 14v4h4"></path>
                                     <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                     <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                     <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                     <path d="M8 11h4"></path>
                                     <path d="M8 15h3"></path>
                                 </svg>
                             </span>&nbsp;
                             <span class="nav-link-title">
                                 Report
                             </span>
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </header>