@extends('dashboard.part.layout')

@section('content')

<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.css" />
 
 <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penjaringan /</span> Form Penjaringan</h4> <!-- title -->


       <!-- Sticky Actions -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                    >
                      <h5 class="card-title mb-sm-0 me-2">Form Penjaringan</h5>
                      <div class="action-btns">
                        <a href="/penjaringan"><button class="btn btn-label-primary me-3">
                          <span class="align-middle"> Kembali</span>
                        </button></a>

                        <button class="btn btn-warning">Belum terjaring</button>
                      
                      </div>
                    </div>
                     
                    <form action="/penjaringan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <br>

                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                          <!-- 1. Delivery Address -->
                          <h5 class="mb-4">1. Data Kependudukan</h5>
                          <div class="row g-3">
                           

                            <input type="hidden" name="id" value="{{ $dpt->id }}">

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->nama }}"
                                        readonly
                                    />
                                    <label for="floatingInput">Nama Lengkap</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Nama Lengkap Pemilih
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="tempat_lahir"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->tempat_lahir }}"
                                        readonly
                                    />
                                    <label for="floatingInput">Tempat Lahir</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Tempat Lahir Pemilih
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="tanggal_lahir"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->tanggal_lahir }}"
                                        readonly
                                    />
                                    <label for="floatingInput">Tanggal Lahir</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Tanggal Lahir Pemilih
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-12">
                              <label class="form-label" for="address">Alamat KTP</label>
                              <textarea
                                name="alamat_ktp"
                                class="form-control is-valid"
                                id="address"
                                rows="2"
                                placeholder="1456, Mall Road"
                                value="{{ $dpt->alamat }}"
                                readonly
                              >{{ $dpt->alamat }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="rt"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->rt }}"
                                        readonly
                                    />
                                    <label for="floatingInput">RT</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        RT
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="rw"
                                        class="form-control"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="0{{ $dpt->rw }}"
                                        
                                    />
                                    <label for="floatingInput">RW / Lingkugan</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        RW / Lingkugan
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="jenis_kelamin"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->jenis_kelamin }}"
                                        readonly
                                    />
                                    <label for="floatingInput">Jenis Kelamin (Laki-laki/Perempuan)</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Jenis Kelamin Pemilih
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="status_kawin"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $dpt->kawin }}"
                                        readonly
                                    />
                                    <label for="floatingInput">Status Kawin (Belum / Sudah)</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Status Kawin
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                @error('nik')
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
                                        name="nik"
                                        class="form-control @error('nik') is-invalid @enderror"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ old('nik', $dpt->nik) }}"
                                    />
                                    <label for="floatingInput">NIK</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Masukan NIK 16 Digit
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                @error('nkk')
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
                                        name="nkk"
                                        class="form-control @error('nkk') is-invalid @enderror"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ old('nkk', $dpt->nkk) }}"
                                    />
                                    <label for="floatingInput">KK</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Masukan No.KK 16 Digit
                                    </div>
                                </div>
                            </div>

                          <hr />
                    
                          <!-- 3. Apply Promo code -->
                          <h5 class="my-4">2. Informasi Lanjutan</h5>
                          
                          <div class="col-md-12">
                            @error('alamat')
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <span class="alert-icon text-danger me-2">
                                <i class="ti ti-ban ti-xs"></i>
                                </span>
                                {{ $message }}
                            </div>   
                            @enderror
                            <div class="col-12">
                                <label class="form-label" for="address">Alamat Detail</label>
                                <textarea
                                  name="alamat"
                                  class="form-control @error('alamat') is-invalid @enderror"
                                  rows="2"
                                  placeholder="Masukan alamat atau patokan rumah"
                                >{{ old('alamat') }}
                                </textarea>
                            </div>
                          </div>

                          <div class="col-md-6">
                            @error('no_hp')
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
                                    name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    id="floatingInput"
                                    placeholder="jika tidak ada isikan no hp keluarga"
                                    aria-describedby="floatingInputHelp"
                                    value="{{ old('no_hp') }}"
                                />
                                <label for="floatingInput">No. Hp</label>
                                <div id="floatingInputHelp" class="form-text">
                                    No. Hp Pemilih
                                </div>
                            </div>
                          </div>

                          <div class="col-md-6">
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
                                    placeholder="jika no hp sama dengan nomor wa silakan isikan kembali"
                                    aria-describedby="floatingInputHelp"
                                    value="{{ old('no_wa') }}"
                                />
                                <label for="floatingInput">No. WA</label>
                                <div id="floatingInputHelp" class="form-text">
                                    No. WA Pemilih
                                </div>
                            </div>
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

                           <div class="col-md-12">
                                @error('catatan_koordinator')
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <span class="alert-icon text-danger me-2">
                                    <i class="ti ti-ban ti-xs"></i>
                                    </span>
                                    {{ $message }}
                                </div>   
                                @enderror
                                <div class="col-12">
                                    <label class="form-label" for="address">Catatan Saya</label>
                                    <textarea
                                        name="catatan_koordinator"
                                        class="form-control @error('catatan_koordinator') is-invalid @enderror"
                                        id="catatan"
                                        rows="2"
                                        placeholder="Masukan alamat atau patokan rumah"
                                    >{{ old('catatan_koordinator') }}
                                    </textarea>
                                </div>
                          </div>

                          

                          <hr />
                          <!-- 4. Payment Method -->
                         
                          <div class="row g-3">
                           
                            <div class="col-12 col-md-12 col-xxl-12">
                                <div class="row">
                                    <h5 class="my-4">4. Upload KTP</h5>
                                    @error('ktp')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <span class="alert-icon text-danger me-2">
                                        <i class="ti ti-ban ti-xs"></i>
                                        </span>
                                        {{ $message }}
                                    </div>   
                                    @enderror
                                    <div class="col-md-6">
                                      <label for="formFile" class="form-label">Masukan foto KTP</label>
                                      <div id="floatingInputHelp" class="form-text">
                                        foto dengan benar
                                      </div>
                                      <input name="ktp" class="form-control ktp @error('foto') is-invalid @enderror" type="file" id="image" onchange="priviewImage()"/>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <img class="img-preview img-fluid">
                                        <img id="preview"></img>
                                    </div>
                                </div>
                              
                            <hr>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-label-primary" 
                                id="auto-close"
                                >
                                    <span class="ti-xs ti ti-device-floppy me-1"></span>Lakukan Penjaringan
                                </button>
                            </div>

                        </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <!-- /Sticky Actions -->







    <!--/ end content -->
    </div>
    <!--/ Basic Bootstrap Table -->
    <hr class="my-5" />
  <!-- / Content -->
   <!-- Vendors JS -->
   <script src="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

   <!-- Main JS -->
   {{-- <script src="{{ asset('') }}assets/js/main.js"></script> --}}

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

