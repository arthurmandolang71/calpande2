 <!-- Navbar -->

 <nav
 class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
 id="layout-navbar"
>
 <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
   <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
     <i class="ti ti-menu-2 ti-sm"></i>
   </a>
 </div>

 <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
   <!-- Search -->
   <div class="navbar-nav align-items-center">
     <div class="nav-item navbar-search-wrapper mb-0">
       <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
         <i class="ti ti-search ti-md me-2"></i>
         <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
       </a>
     </div>
   </div>
   <!-- /Search -->

   <ul class="navbar-nav flex-row align-items-center ms-auto">

     <!-- Language -->
      {{-- @include('dashboard.part.navbar.language') --}}
     <!-- /Language -->

     <!-- Style Switcher -->
     <li class="nav-item me-2 me-xl-0">
       <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
         <i class="ti ti-md"></i>
       </a>
     </li>
     <!--/ Style Switcher -->

    <!-- Quick links  -->
      {{-- @include('dashboard.part.navbar.qiuckLinks') --}}
    <!-- /Quick links  -->

    <!-- Notification -->
      {{-- @include('dashboard.part.navbar.notification') --}}
    <!-- /Notification -->

     <!-- User -->
     <li class="nav-item navbar-dropdown dropdown-user dropdown">
       <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
         <div class="avatar avatar-online">
           <img 
              @if (auth()->user()->foto)
                  src="{{ auth()->user()->foto }}"
                @else
                  @isset(auth()->user()->anggota_tim->jenis_kelamin)
                  @if (auth()->user()->anggota_tim->jenis_kelamin == 'L')
                      src="{{ asset('') }}assets/img/avatars/1.png"
                    @else
                      src="{{ asset('') }}assets/img/avatars/2.png"
                    @endif
                   @endisset
                @endif
              alt class="h-auto rounded-circle" />
         </div>
       </a>
       <ul class="dropdown-menu dropdown-menu-end">
         <li>
           <a class="dropdown-item" href="pages-account-settings-account.html">
             <div class="d-flex">
               <div class="flex-shrink-0 me-3">
                 <div class="avatar avatar-online">
                   <img 
              
                     @if (auth()->user()->foto)
                          src="{{ auth()->user()->foto }}"
                        @else
                        @isset(auth()->user()->anggota_tim->jenis_kelamin)
                          @if (auth()->user()->anggota_tim->jenis_kelamin == 'L')
                            src="{{ asset('') }}assets/img/avatars/1.png"
                          @else
                            src="{{ asset('') }}assets/img/avatars/2.png"
                          @endif
                        @endisset
                          
                      @endif   
                  
                    alt class="h-auto rounded-circle" />
                 </div>
               </div>
               <div class="flex-grow-1">
                 <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                 <small class="text-muted">{{ auth()->user()->username }}</small>
               </div>
             </div>
           </a>
         </li>
         <li>
           <div class="dropdown-divider"></div>
         </li>
         <li>
           <a class="dropdown-item" href="/profil/{{ auth()->user()->id }}">
             <i class="ti ti-user-check me-2 ti-sm"></i>
             <span class="align-middle">Profil Saya</span>
           </a>
         </li>
         <li>
           <a class="dropdown-item" href="/profil/{{ auth()->user()->id }}/edit">
             <i class="ti ti-settings me-2 ti-sm"></i>
             <span class="align-middle">Ubah Password</span>
           </a>
         </li>
       
         <li>
           <div class="dropdown-divider"></div>
         </li>
    
         <li>
           <div class="dropdown-divider"></div>
         </li>
         <li>
          <form action="/logout" method="post">
            @csrf
            <button class="dropdown-item" type="submit">
              <i class="ti ti-logout me-2 ti-sm"></i>
              <span class="align-middle">Log Out</span>
            </button>
          </form>
         </li>
       </ul>
     </li>
     <!--/ User -->
   </ul>
 </div>

 <!-- Search Small Screens -->
 <div class="navbar-search-wrapper search-input-wrapper d-none">
   <input
     type="text"
     class="form-control search-input container-xxl border-0"
     placeholder="Search..."
     aria-label="Search..."
   />
   <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
 </div>
  <!-- /Search Small Screens -->


</nav>

<!-- / Navbar -->