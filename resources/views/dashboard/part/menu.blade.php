        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <!-- app-brand -->
              @include('dashboard.part.app-brand')
            <!-- / app-brand -->

            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1">

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">About</span>
            </li>
              <li class="menu-item {{ Request::is('welcome*') ? 'active' : '' }}">
                <a href="/welcome" class="menu-link  ">
                  <i class="menu-icon tf-icons ti ti-user"></i>
                  <div data-i18n="Welcome">Welcome</div>
                </a>
              </li>
              
            @can('isSuperAdmin')
              <!-- DPT -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Adminsitrator</span>
              </li>
                <li class="menu-item {{ Request::is('clients*') ? 'active' : '' }}">
                  <a href="/clients" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Data Users Client">Data Users Client</div>
                  </a>
                </li>
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">DPT 2020</span>
              </li>
                <li class="menu-item {{ Request::is('dpt2020*') ? 'active' : '' }}">
                  <a href="/dpt2020" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-list"></i>
                    <div data-i18n="TPS DPT 2020">TPS DPT 2020</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('pemilih/dpt2020*') ? 'active' : '' }}">
                  <a href="/pemilih/dpt2020" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-list"></i>
                    <div data-i18n="Pemlih DPT 2020">Pemlih DPT 2020</div>
                  </a>
                </li>
            @endcan

            @can('isAdminClient')
              <!-- DPT -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Master Data</span>
              </li>
                  <li class="menu-item {{ Request::is('client_dash/insight*') ? 'active' : '' }}">
                    <a href="/client_dash/insight" class="menu-link  ">
                      <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                      <div data-i18n="Insight">Insight</div>
                    </a>
                  </li>
                  {{-- <li class="menu-item {{ Request::is('client_dash/dashboard*') ? 'active' : '' }}">
                    <a href="/client_dash/dashboard" class="menu-link  ">
                      <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                      <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                  </li> --}}
            
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Tim Kemenangan</span>
              </li>
                <li class="menu-item {{ Request::is('tim*') ? 'active' : '' }}">
                  <a href="/tim" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="Anggota Tim">Anggota Tim</div>
                  </a>
                </li>
                {{-- <li class="menu-item {{ Request::is('plotting_ling/tim*') ? 'active' : '' }}">
                  <a href="/plotting_ling/tim" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-pennant"></i>
                    <div data-i18n="Plotting Tim / TPS.">Plotting Tim / Ling.</div>
                  </a>
                </li> --}}
                <li class="menu-item {{ Request::is('plotting_tps/tim*') ? 'active' : '' }}">
                  <a href="/plotting_tps/tim" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-pennant"></i>
                    <div data-i18n="Plotting Tim / TPS.">Plotting Tim / TPS.</div>
                  </a>
                </li>

              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Pendukung</span>
              </li>
                <li class="menu-item {{ Request::is('penjaringan*') ? 'active' : '' }}">
                  <a href="/penjaringan" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-map-search"></i>
                    <div data-i18n="Penjaringan">Penjaringan</div>
                  </a>
                </li>
                <li class="menu-item {{ Request::is('penyaringan*') ? 'active' : '' }}">
                  <a href="/penyaringan" class="menu-link  ">
                    <i class="menu-icon tf-icons ti ti-list-search"></i>
                    <div data-i18n="Penyaringan">Penyaringan</div>
                  </a>
                </li>

             
            @endcan

            @can('isTimClient')
            <!-- DPT -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Penyisiran Pendukung</span>
            </li>
              <li class="menu-item {{ Request::is('tim_dash/dashboard*') ? 'active' : '' }}">
                <a href="/tim_dash/dashboard" class="menu-link  ">
                  <i class="menu-icon tf-icons ti ti-chart-bar"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('penjaringantim*') ? 'active' : '' }}">
                <a href="/penjaringantim" class="menu-link  ">
                  <i class="menu-icon tf-icons ti ti-map-search"></i>
                  <div data-i18n="Penjaringan">Penjaringan</div>
                </a>
              </li>
              <li class="menu-item {{ Request::is('penyaringantim*') ? 'active' : '' }}">
                <a href="/penyaringantim" class="menu-link  ">
                  <i class="menu-icon tf-icons ti ti-list-search"></i>
                  <div data-i18n="Penyaringan">Penyaringan</div>
                </a>
              </li>

           
          @endcan



            </ul>
           


          </aside>

          <!-- / Menu -->