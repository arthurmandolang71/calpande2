@extends('dashboard.part.layout')

@section('content')

<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.css" />
 
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Tambah Client</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Tambah Client</h5> <!-- title -->

      @if (session()->has('pesan'))
        <div class="container">
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif


      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <!-- start content -->
      <form action="/clients" method="post" enctype="multipart/form-data">
        @csrf
      <div class="col-md-12">
        <div class="card mb-12">
          <div class="card-body">

            <div class="d-grid gap-2">
                <a href="/clients" class="btn btn-label-danger">
                    <span class="ti-xs ti ti-arrow-bar-to-left me-1"></span>Batal
                </a>
            </div>
            <hr>
            
            @error('name')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
              <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="floatingInput"
                placeholder="Masukan nama lengkap"
                aria-describedby="floatingInputHelp"
                value="{{ old('name') }}"
                
              />
              <label for="floatingInput">Nama</label>
              <div id="floatingInputHelp" class="form-text">
                Masukan nama lengkap
              </div>
            </div>
           
            @error('username')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
                <input
                  type="text"
                  name="username"
                  class="form-control @error('username') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="Masukan username"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('username') }}"
                  
                />
                <label for="floatingInput">Username</label>
                <div id="floatingInputHelp" class="form-text">
                    Masukan username minimal 6 karakter
                </div>
            </div>

            @error('password')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
                <input
                  type="text"
                  name="password"
                  class="form-control @error('password') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="Masukan password"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('password') }}"
                  
                />
                <label for="floatingInput">Password</label>
                <div id="floatingInputHelp" class="form-text">
                    Masukan password minimal 6 karakter
                </div>
            </div>

            @error('domain')
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <span class="alert-icon text-danger me-2">
                    <i class="ti ti-ban ti-xs"></i>
                    </span>
                    {{ $message }}
                </div>   
              @enderror
              <div class="form-floating">
                  <input
                    type="text"
                    name="domain"
                    class="form-control @error('username') is-invalid @enderror"
                    id="floatingInput"
                    placeholder="Masukan domain"
                    aria-describedby="floatingInputHelp"
                    value="{{ old('domain') }}"
                    
                  />
                  <label for="floatingInput">domain</label>
                  <div id="floatingInputHelp" class="form-text">
                      Masukan domain 
                  </div>
              </div>

            @error('no_wa')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
                <input
                  type="text"
                  name="no_wa"
                  class="form-control @error('no_wa') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="Masukan no_wa"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('no_wa') }}"
                  
                />
                <label for="floatingInput">No. Whatsapp</label>
                <div id="floatingInputHelp" class="form-text">
                    Masukan nomor whatsapp aktif
                </div>
            </div>

            @error('alamat')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
                <input
                  type="text"
                  name="alamat"
                  class="form-control @error('alamat') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="Masukan alamat"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('alamat') }}"
                  
                />
                <label for="floatingInput">Alamat</label>
                <div id="floatingInputHelp" class="form-text">
                    Masukan alamat lengkap!
                </div>
            </div>

            @error('dapil_ref')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="mt-2 mb-3">
                <label for="largeSelect" class="form-label">Dapil</label>
                <select name="dapil_ref" id="largeSelect" class="form-select form-select-lg @error('dapil_ref') is-invalid @enderror" >
                <option value="">Pilih Dapil</option>
                @foreach ($dapil as $item)
                     @if(old('dapil_ref') == $item->dapil)
                        <option value="{{ $item->dapil }}" selected>{{ $item->nama }}</option>
                     @else
                     <option value="{{ $item->dapil }}">{{ $item->nama }}</option>
                     @endif
                @endforeach
                </select>
            </div>

            @error('kendaraan_id')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="mt-2 mb-3">
                <label for="largeSelect" class="form-label">Kendaraan</label>
                <select name="kendaraan_id" id="largeSelect" class="form-select form-select-lg @error('dapil_ref') is-invalid @enderror" >
                <option value="">Pilih Kendaraan</option>
                @foreach ($kendaraan as $item)
                    @if(old('kendaraan_id') == $item->id)
                        <option value="{{ $item->id }}" selected>{{ $item->nama_singkat }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama_singkat }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            @error('no_urut')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="mt-2 mb-3">
                <label for="largeSelect" class="form-label">Nomor Urut</label>
                <select name="no_urut" id="largeSelect" class="form-select form-select-lg @error('no_urut') is-invalid @enderror" >
                <option value="">Pilih Nomor Urut</option>
                @for ($i = 1; $i <= 8; $i++)
                    @if(old('no_urut') == $i)
                        <option value="{{ $i }}" selected>{{ $i }}</option>
                    @else
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endif
                @endfor
                </select>
            </div>

            @error('agama_id')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="mt-2 mb-3">
                <label for="largeSelect" class="form-label">Agama</label>
                <select name="agama_id" id="largeSelect" class="form-select form-select-lg @error('agama_id') is-invalid @enderror" >
                <option value="">Pilih Agama</option>
                @foreach ($agama as $item)
                    @if(old('agama_id') == $item->id)
                        <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            @error('jenis_kelamin')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="mt-2 mb-3">
                <label for="largeSelect" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="largeSelect" class="form-select form-select-lg @error('jenis_kelamin') is-invalid @enderror" >
                <option value="">Pilih Jenis Kelamin</option>
                @foreach ($jenis_kelamin as $item)
                    @if(old('jenis_kelamin') == $item)
                        <option value="{{ $item }}" selected>{{ $item }}</option>
                    @else
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endif
                @endforeach
                </select>
            </div>

            @error('keterangan')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="form-floating">
                <input
                  type="text"
                  name="keterangan"
                  class="form-control @error('keterangan') is-invalid @enderror"
                  id="floatingInput"
                  placeholder="masukan catatan khusus"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('keterangan') }}"
                  
                />
                <label for="floatingInput">Ketarangan</label>
                <div id="floatingInputHelp" class="form-text">
                  Masukan catatan khusus
                </div>
            </div>

            <hr>

            @error('foto')
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                  <span class="alert-icon text-danger me-2">
                  <i class="ti ti-ban ti-xs"></i>
                  </span>
                  {{ $message }}
              </div>   
            @enderror
            <div class="row">
                <div class="col-md-6">
                  <label for="formFile" class="form-label">Masukan Foto Caleg</label>
                  <div id="floatingInputHelp" class="form-text">
                    foto dengan benar
                  </div>
                  <input name="foto" class="form-control @error('foto') is-invalid @enderror" type="file" id="image" onchange="priviewImage()"/>
                </div>
                <div class="col-md-6">
                    <br>
                    <img  class="img-preview img-fluid">
                </div>
            </div>

            @error('banner_login')
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <span class="alert-icon text-danger me-2">
                <i class="ti ti-ban ti-xs"></i>
                </span>
                {{ $message }}
            </div>   
            @enderror
            <div class="row">
                <div class="col-md-6">
                  <label for="formFile" class="form-label">Masukan banner login</label>
                  <div id="floatingInputHelp" class="form-text">
                    banner login dengan benar
                  </div>
                  <input name="banner_login" class="form-control @error('banner_login') is-invalid @enderror" type="file" />
                </div>
                <div class="col-md-6">
                    <br>
                    {{-- <img  class="img-preview img-fluid"> --}}
                </div>
            </div>

          @error('banner_welcome')
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <span class="alert-icon text-danger me-2">
              <i class="ti ti-ban ti-xs"></i>
              </span>
              {{ $message }}
          </div>   
          @enderror
          <div class="row">
              <div class="col-md-6">
                <label for="formFile" class="form-label">Masukan Banner Welcome</label>
                <div id="floatingInputHelp" class="form-text">
                  masukan banner welcome dengan benar
                </div>
                <input name="banner_welcome" class="form-control @error('banner_welcome') is-invalid @enderror" type="file" />
              </div>
              <div class="col-md-6">
                  <br>
                  {{-- <img  class="img-preview img-fluid"> --}}
              </div>
          </div>
            <hr>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-label-success" 
                id="auto-close"
                >
                    <span class="ti-xs ti ti-device-floppy me-1"></span>Simpan
                </button>
            </div>

          </div>
        </div>
      </div>
     
      </form>

      <!--/ end content -->




    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />

  </div>
  <!-- / Content -->
   <!-- Vendors JS -->
   <script src="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

   <!-- Main JS -->
   <script src="{{ asset('') }}assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="{{ asset('') }}assets/js/extended-ui-sweetalert2.js"></script>

<script>
    
    function priviewImage(){
        const image = document.querySelector('#image');
        const view = document.querySelector('.img-preview');

        view.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            view.src = oFREvent.target.result;
        }
    }

</script>

@endSection

