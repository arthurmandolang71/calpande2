@extends('dashboard.part.layout')

@section('content')

<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.css" />
 
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Edit Client</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Edit Client</h5> <!-- title -->

      {{-- @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
      @endforeach --}}

      @if (session()->has('pesan'))
        <div class="container">
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif
      <!-- start content -->
      <form action="/clients/{{ $client->id }}" method="post" enctype="multipart/form-data">
        @method('PUT')
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
                value="{{ old('name', $client->name) }}"
                required
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
                  value="{{ old('username', $client->username) }}"
                  required
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
                  value="{{ old('no_wa', $client->anggota_tim->no_wa) }}"
                  required
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
                  value="{{ old('alamat', $client->anggota_tim->alamat) }}"
                  required
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
                <select name="dapil_ref" id="largeSelect" class="form-select form-select-lg" required>
                <option value="">Pilih Dapil</option>
                @foreach ($dapil as $item)
                     @if(old('dapil_ref', $client->anggota_tim->client->dapil_ref) == $item->dapil)
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
                <select name="kendaraan_id" id="largeSelect" class="form-select form-select-lg" required>
                <option value="">Pilih Kendaraan</option>
                @foreach ($kendaraan as $item)
                    @if(old('kendaraan_id',  $client->anggota_tim->client->kendaraan_id) == $item->id)
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
                <select name="no_urut" id="largeSelect" class="form-select form-select-lg" required>
                <option value="">Pilih Nomor Urut</option>
                @for ($i = 1; $i <= 8; $i++)
                    @if(old('no_urut', $client->anggota_tim->client->no_urut) == $i)
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
                <select name="agama_id" id="largeSelect" class="form-select form-select-lg" required>
                <option value="">Pilih Agama</option>
                @foreach ($agama as $item)
                    @if(old('agama', $client->anggota_tim->agama_id) == $item->id)
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
                <select name="jenis_kelamin" id="largeSelect" class="form-select form-select-lg" required>
                <option value="">Pilih Jenis Kelamin</option>
                @foreach ($jenis_kelamin as $item)
                    @if(old('jenis_kelamin', $client->anggota_tim->jenis_kelamin) == $item)
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
                  class="form-control"
                  id="floatingInput"
                  placeholder="masukan catatan khusus"
                  aria-describedby="floatingInputHelp"
                  value="{{ old('keterangan', $client->anggota_tim->client->keterangan) }}"
                  required
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
                  <input name="foto" class="form-control" type="file" id="image" onchange="priviewImage()"/>
                </div>
                <div class="col-md-6">
                    <br>
                    @if($client->foto)
                        <img src='{{  $client->foto  }}' class="img-preview img-fluid d-block">
                    @else
                        <img  class="img-preview img-fluid">
                    @endif
                    
                </div>
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <hr>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-label-success" id="auto-close">
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