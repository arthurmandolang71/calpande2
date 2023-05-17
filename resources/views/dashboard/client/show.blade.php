@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Detail Client</h4>
    <div class="d-grid gap-2">
        <a href="/clients" class="btn btn-label-primary">
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
                @if ($client->foto)
                  src="{{ $client->foto }}" width="100" heignt="100"
                @else
                  @if ($client->anggota_tim->jenis_kelamin == 'L')
                    src="{{ asset('') }}assets/img/avatars/1.png"
                  @else
                    src="{{ asset('') }}assets/img/avatars/2.png"
                  @endif
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
                  <h4>{{ $client->name }}</h4>
                  <ul
                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2"
                  >
                    <li class="list-inline-item"><i class="ti ti-color-swatch"></i> Partai {{ $client->anggota_tim->client->kendaraan->nama_singkat }}</li>
                    <li class="list-inline-item"><i class="ti ti-calendar"></i> Bergabung {{ $client->created_at->diffForHumans() }}</li>
                  </ul>
                </div>
               
                @if ($client->active == 1)
                <a href="javascript:void(0)" class="btn btn-primary">
                  <i class="ti ti-user-check me-1"></i>Aktif
                </a>
                @else
                <a href="javascript:void(0)" class="btn btn-danger">
                  <i class="ti ti-user-check me-1"></i>Block
                </a>
                @endif
                  
               
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
                <i class="ti ti-user"></i><span class="fw-bold mx-2">Nama:</span> <span>{{ $client->name }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-login"></i><span class="fw-bold mx-2">User Login:</span> <span>{{ $client->username }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-gender-femme"></i><span class="fw-bold mx-2">Jenis Kelamin:</span> <span>{{ $client->anggota_tim->jenis_kelamin }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-church"></i><span class="fw-bold mx-2">Agama:</span> <span>{{ $client->anggota_tim->agama->nama }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-home"></i><span class="fw-bold mx-2">Alamat:</span> <span>{{ $client->anggota_tim->alamat }}</span>
              </li>
            </ul>
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-plus"></i><span class="fw-bold mx-2">No. Whatsapp:</span> <span>{{ $client->anggota_tim->no_wa }}</span>
              </li>
            </ul>
         
            <small class="card-text text-uppercase">Client</small> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-flag"></i><span class="fw-bold mx-2">Partai:</span> <span>{{ $client->anggota_tim->client->kendaraan->nama_singkat }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-box-multiple-1"></i><span class="fw-bold mx-2">Nomor Urut:</span> <span>{{ $client->anggota_tim->client->no_urut }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-skyscraper"></i><span class="fw-bold mx-2">Dapil:</span> <span>{{ $client->anggota_tim->client->dapil->nama }}</span>
              </li>
            </ul> 
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-building-bridge-2"></i><span class="fw-bold mx-2">Kecamatan:</span> <span>
                  @foreach ($kecamatan as $item)
                        KECAMATAN {{ $item->kecamatan }},  
                  @endforeach
                </span>
              </li>
            </ul>  
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-ad-2"></i><span class="fw-bold mx-2">Keterangan:</span> <span>{{ $client->anggota_tim->keterangan }}</span>
              </li>
            </ul>          
          </div>
        </div>
        <!--/ About User -->

        <img src='{{ $client->anggota_tim->client->banner_login }}' class="img-preview img-fluid d-block">   
        <hr>     
        <img src='{{ $client->anggota_tim->client->banner_welcome }}' class="img-preview img-fluid d-block">      
        <br><br>
      </div>

      
    </div>

    <div class="d-grid gap-2">
      <a href="/clients/{{ $client->id }}/edit" class="btn btn-warning">
        <i class="ti ti-user-check me-1"></i>Ubah Data
      </a>
    </div>
    <br>

    <form action="/clients/update_status/{{ $client->id }}" method="post">
      @method('put')
      
      @csrf
        @if ($client->active == 1)
          <input type="hidden" name="acitve" value="0">
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-danger">
              <i class="ti ti-user-cloud-off me-1"></i>Non Aktifkan
            </button>
          </div>
        @else
          <input type="hidden" name="acitve" value="1">
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">
              <i class="ti ti-user-cloud me-1"></i>Aktifkan
            </button>
          </div>
        @endif
    </form>
   
    <!--/ User Profile Content -->
  </div>
  <!-- / Content -->

  <!-- / Content -->

@endSection