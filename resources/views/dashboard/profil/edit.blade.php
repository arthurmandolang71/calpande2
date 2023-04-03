@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">profil /</span> Ubah Password</h4>
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
                  @isset(auth()->user()->anggota_tim->jenis_kelamin)
                    @if ($profil->anggota_tim->jenis_kelamin == 'L')
                      src="{{ asset('') }}assets/img/avatars/1.png"
                    @else
                      src="{{ asset('') }}assets/img/avatars/2.png"
                    @endif
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

        <form action="/profil/{{ $profil->id }}" method="post" >
            @csrf
            @method('PUT')
      
            <ul class="list-unstyled mb-4 mt-3">
              <li class="d-flex align-items-center mb-3">
                <i class="ti ti-login"></i><span class="fw-bold mx-2">Username:</span> <span>{{ $profil->username }}</span>
              </li>
            </ul>
            <small class="card-text text-uppercase">Password</small>
            <div class="form-floating">
                <input
                  type="text"
                  name="password"
                  class="form-control @error('password') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="Masukan password"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('password') }}"
                  required
                />
                <label for="floatingInput">Password</label>
                <div id="floatingInputHelp" class="form-text">
                    Masukan password minimal 6 karakter
                </div>
                @error('password')
                <div id="floatingInputHelp" class="form-text invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          
            <br>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-label-success" id="auto-close">
                    <span class="ti-xs ti ti-key me-1"></span>Ganti Password
                </button>
            </div>

        </form>     
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