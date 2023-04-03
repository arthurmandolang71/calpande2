@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">profil /</span> Detail profil</h4>
    <div class="d-grid gap-2">
        <a href="/profils" class="btn btn-label-primary">
            <span class="ti-xs ti ti-arrow-bar-to-left me-1"></span>Kembali
        </a>
    </div>
    @if (session()->has('pesan'))
      <div class="text-center">
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('pesan') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
    @endif
    <!-- Header -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
    
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
              <img
                @if ($profil->foto)
                  src="{{ asset('storage') }}/{{ $profil->foto }}" width="100"
                @else
                  @isset($profil->anggota_tim->jenis_kelamin)
                    @if ($profil->anggota_tim->jenis_kelamin == 'L')
                      src="{{ asset('') }}assets/img/avatars/1.png"
                    @else
                      src="{{ asset('') }}assets/img/avatars/2.png"
                    @endif
                    @else
                      src="{{ asset('') }}assets/img/avatars/1.png"
                  @endisset
                  
                @endif
                alt="user image"
                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"
              />
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
              <div
                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
              >
                <div class="user-profile-info">
                  <h4>{{ $profil->name }}</h4>
                  <ul
                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                  >
                    <li class="list-inline-item"><i class="ti ti-color-swatch"></i> Partai {{ $profil->anggota_tim->client->kendaraan->nama_singkat ?? ''}}</li>
                    <li class="list-inline-item"><i class="ti ti-calendar"></i> Bergabung {{ $profil->created_at->diffForHumans() }}</li>
                  </ul>
                </div>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Header -->

    <!-- User Profile Content -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <!-- About User -->
        <div class="card mb-4">
          <div class="card-body">
            <small class="card-text text-uppercase">Kontak</small>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama:</span> <span>{{ $profil->name ?? ''}}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-login"></i><span class="fw-bold mx-2">User Login:</span> <span>{{ $profil->username ?? ''}}</span>
              </li>
            </ul>
            <small class="card-text text-uppercase">Caleg Saya</small> 
            <ul class="list-unstyled mb-4 mt-3">
                <li class="d-flex align-items-center mb-3">
                  <i class="ti ti-flag"></i><span class="fw-bold mx-2">Nama:</span> <span>{{ $profil->anggota_tim->client->nama  ?? ''}}</span>
                </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-flag"></i><span class="fw-bold mx-2">Partai:</span> <span>{{ $profil->anggota_tim->client->kendaraan->nama_singkat ?? ''}}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-box-multiple-1"></i><span class="fw-bold mx-2">Nomor Urut:</span> <span>{{ $profil->anggota_tim->client->no_urut ?? ''}}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-skyscraper"></i><span class="fw-bold mx-2">Dapil:</span> <span>{{ $profil->anggota_tim->client->dapil->nama ?? ''}}</span>
              </li>
            </ul>   
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-bridge-2"></i><span class="fw-bold mx-2">Kecamatan:</span> <span>
                  @if($kecamatan)
                    @foreach ($kecamatan as $item)
                          KECAMATAN {{ $item->wilayah->nama }},  
                    @endforeach
                  @endif
                </span>
              </li>
            </ul>          
          </div>
        </div>
        <!--/ About User -->
       
      </div>

    </div>

    <div class="d-grid gap-2">
      <a href="/profil/{{ $profil->id }}/edit" class="btn btn-warning">
        <i class="ti ti-user-check me-1"></i>Ubah Password
      </a>
    </div>
  
    <!--/ User Profile Content -->
  </div>
  <!-- / Content -->

  <!-- / Content -->

@endSection