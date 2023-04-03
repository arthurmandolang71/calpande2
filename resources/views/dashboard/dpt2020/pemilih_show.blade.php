@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pemilih DPT 2020 /</span> Detail</h4>
    <div class="d-grid gap-2">
        <a href="/pemilih/dpt2020/" class="btn btn-label-primary">
            <span class="ti-xs ti ti-arrow-bar-to-left me-1"></span>Kembali
        </a>
    </div>
   
    <!-- Header -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
    
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
              <img
                @if ($pemilih->jenis_kelamin == 'L')
                    src="{{ asset('') }}assets/img/avatars/1.png"
                @else
                    src="{{ asset('') }}assets/img/avatars/2.png"
                @endif
                alt="user image"
                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img img img-thumbnail"
              />
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
              <div
                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4"
              >
                <div class="user-profile-info">
                  <h4>{{ $pemilih->nama }}</h4>
                  <ul
                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                  >
                    <li class="list-inline-item"><i class="ti ti-color-swatch"></i> KELURAHAN {{ $pemilih->wilayah->nama }}</li>
                    <li class="list-inline-item"><i class="ti ti-calendar"></i> LING. {{ $pemilih->rw }}</li>
                    <li class="list-inline-item"><i class="ti ti-calendar"></i> TPS {{ $pemilih->tps }}</li>
                  </ul>
                </div>
               
                <a href="javascript:void(0)" class="btn btn-primary">
                  <i class="ti ti-user-check me-1"></i>DPT 2020
                </a>
                
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
            <small class="card-text text-uppercase">Detail</small>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama:</span> <span>{{ $pemilih->nama }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-gender-femme"></i><span class="fw-bold mx-2">NIK:</span> <span>{{ $pemilih->nik}}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-church"></i><span class="fw-bold mx-2">KK:</span> <span>{{ $pemilih->nkk }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-home"></i><span class="fw-bold mx-2">Tempat Tanggal Lahir:</span> <span>{{ $pemilih->tempat_lahir }}, {{ $pemilih->tanggal_lahir }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-plus"></i><span class="fw-bold mx-2">Status:</span> <span>{{ $pemilih->kawin }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-flag"></i><span class="fw-bold mx-2">Jenis Kelamin:</span> <span>{{ $pemilih->jenis_kelamin }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-box-multiple-1"></i><span class="fw-bold mx-2">Alamat:</span> <span>{{ $pemilih->alamat }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
                <li class="d-flex align-items-center mb-3">
                  <i class="ti ti-building-skyscraper"></i><span class="fw-bold mx-2">Kecamatan:</span> <span></span>
                </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-skyscraper"></i><span class="fw-bold mx-2">Kelurahan:</span> <span>{{ $pemilih->wilayah->nama }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
                <li class="d-flex align-items-center mb-3">
                  <i class="ti ti-building-skyscraper"></i><span class="fw-bold mx-2">Lingkungan:</span> <span>{{ $pemilih->rw }}</span>
                </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-ad-2"></i><span class="fw-bold mx-2">RT/RW:</span> <span>{{ $pemilih->rt }} / 0{{ $pemilih->rw }}</span>
              </li>
            </ul>          
          </div>
        </div>
        <!--/ About User -->
       
      </div>
    </div>
   
    <!--/ User Profile Content -->
  </div>
  <!-- / Content -->

  <!-- / Content -->

@endSection