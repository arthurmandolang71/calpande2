@extends('dashboard.part.layout')

@section('content')

<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/animate-css/animate.css" />
<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/sweetalert2/sweetalert2.css" />

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<script src="{{ asset('') }}assets/js/locationpicker.jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBk7maZZbWS4I3odR82HiAUoJDuGbzi-iw&callback=myMap"></script>

 <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penyaringan /</span> Form Penyaringan</h4> <!-- title -->


       <!-- Sticky Actions -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div
                      class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row"
                    >
                      <h5 class="card-title mb-sm-0 me-2">Form Penyaringan</h5>
                      <div class="action-btns">
                        <a href="/penjaringan"><button class="btn btn-label-primary me-3">
                          <span class="align-middle"> Kembali</span>
                        </button></a>

                        <button class="btn btn-primary">Lakukan Panyaringan</button>
                      
                      </div>
                    </div>
                     
                    <form action="/penyaringan/{{ $pemilih->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                      
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="nama"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ $pemilih->pemilih->nama }}"
                                        disabled
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
                                        value="{{ $pemilih->pemilih->tempat_lahir }}"
                                        disabled
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
                                        value="{{ $pemilih->pemilih->tanggal_lahir }}"
                                        disabled
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
                                value="{{ $pemilih->pemilih->alamat }}"
                                disabled
                              >{{ $pemilih->pemilih->alamat }}</textarea>
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
                                        value="{{ $pemilih->pemilih->rt }}"
                                        disabled
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
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        readonly
                                        value="0{{ $pemilih->pemilih->rw }}"
                                        disabled
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
                                        value="{{ $pemilih->pemilih->jenis_kelamin }}"
                                        disabled
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
                                        value="{{ $pemilih->pemilih->kawin }}"
                                        disabled
                                    />
                                    <label for="floatingInput">Status Kawin (Belum / Sudah)</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Status Kawin
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="nik"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ old('nik', $pemilih->pemilih->nik) }}"
                                        disabled
                                    />
                                    <label for="floatingInput">NIK</label>
                                    <div id="floatingInputHelp" class="form-text">
                                        Masukan NIK 16 Digit
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input
                                        type="text"
                                        name="nkk"
                                        class="form-control is-valid"
                                        id="floatingInput"
                                        placeholder="Masukan nama lengkap"
                                        aria-describedby="floatingInputHelp"
                                        value="{{ old('nkk', $pemilih->pemilih->nkk) }}"
                                        disabled
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

                            <div class="mt-2 mb-3">
                                    <label for="largeSelect" class="form-label">Agama</label>
                                    <select name="agama_id" id="largeSelect" class="form-select form-select-lg" disabled >
                                    <option value="">Pilih Agama</option>
                                        @foreach ($agama as $item)
                                            @if(old('agama_id',$pemilih->pemilih->agama_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                          
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
                                 
                                >{{ old('alamat',$pemilih->alamat) }}
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
                                    value="{{ old('no_hp',$pemilih->no_hp) }}"
                                   
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
                                    value="{{ old('no_wa',$pemilih->no_wa) }}"
                                    
                                />
                                <label for="floatingInput">No. WA</label>
                                <div id="floatingInputHelp" class="form-text">
                                    No. WA Pemilih
                                </div>
                            </div>
                          </div>

                           <div class="col-md-12">
                                  <div class="col-12">
                                      <label class="form-label" for="address">Catatan Tim</label>
                                      <textarea
                                          name="catatan_koordinator"
                                          class="form-control"
                                          id="catatan"
                                          rows="2"
                                          placeholder="Masukan alamat atau patokan rumah"
                                          disabled
                                      >{{ old('catatan_tim',$pemilih->catatan_tim) }}
                                      </textarea>
                                  </div>
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
                                    >{{ old('catatan_koordinator',$pemilih->catatan_koordinator) }}
                                    </textarea>
                                </div>
                           </div>

                          <h5 class="my-4">3. Update Penyaringan</h5>

                          <div class="alert alert-primary alert-dismissible d-flex align-items-baseline" role="alert">
                            <span class="alert-icon alert-icon-lg text-success me-2">
                            <i class="ti ti-user ti-sm"></i>
                            </span>
                            <div class="d-flex flex-column ps-1">
                            <p class="mb-0">
                                telah di jaring oleh <b>{{ $pemilih->user->name }}</b> pada {{ $pemilih->created_at->diffForHumans() }}.
                                untuk informasi terkait silakan hubungi nomor <b>{{ $pemilih->user->anggota_tim->no_wa }}</b>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                          </div>

                          <div class="row gy-3">

                            <div class="col-md">
                              <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon1">
                                  <span class="custom-option-body">
                                    <i class="ti ti-brackets"></i>
                                    <span class="custom-option-title"> Penjaringan </span>
                                    <small> Tahap awal penjangkuan potensial pendukung. </small>
                                  </span>
                                  <input
                                    name="level_status_id"
                                    class="form-check-input"
                                    type="radio"
                                    value="1"
                                    id="customRadioIcon1"
                                    @if($pemilih->level_status_id == 1)
                                      checked
                                    @endif
                                  />
                                </label>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon2">
                                  <span class="custom-option-body">
                                    <i class="ti ti-send"></i>
                                    <span class="custom-option-title"> Pengembira </span>
                                    <small> Acuh tak acuh atau hanya ikut ikutan.</small>
                                  </span>
                                  <input
                                    name="level_status_id"
                                    class="form-check-input"
                                    type="radio"
                                    value="2"
                                    id="customRadioIcon2"
                                    @if($pemilih->level_status_id == 2)
                                      checked
                                    @endif
                                  />
                                </label>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon3">
                                  <span class="custom-option-body">
                                    <i class="ti ti-currency-dollar"></i>
                                    <span class="custom-option-title"> Pragmatis </span>
                                    <small> Memilih berdasarkan pemberian uang. </small>
                                  </span>
                                  <input
                                    name="level_status_id"
                                    class="form-check-input"
                                    type="radio"
                                    value="3"
                                    id="customRadioIcon3"
                                    @if($pemilih->level_status_id == 3)
                                      checked
                                    @endif
                                  />
                                </label>
                              </div>
                            </div>

                         
                            
                            
                          </div>
                          <hr />
                          
                          <div class="row g-3">
                            <div class="col-md">
                              <div class="form-check custom-option custom-option-icon">
                                <label class="form-check-label custom-option-content" for="customRadioIcon4">
                                  <span class="custom-option-body">
                                    <i class="ti ti-heart-plus"></i>
                                    <span class="custom-option-title"> Loyalis </span>
                                    <small> Pemilih yang memiliki potensi untuk mendukung. </small>
                                  </span>
                                  <input
                                    name="level_status_id"
                                    class="form-check-input"
                                    type="radio"
                                    value="4"
                                    id="customRadioIcon4"
                                    @if($pemilih->level_status_id == 4)
                                      checked
                                    @endif
                                  />
                                </label>
                              </div>
                            </div>
                            <div class="col-md">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon5">
                                    <span class="custom-option-body">
                                      <i class="ti ti-karate"></i>
                                      <span class="custom-option-title"> Militansi </span>
                                      <small> Pemilih yang berpotensi mendukung dan berjuang memenangkan Pesta Demokrasi. </small>
                                    </span>
                                    <input
                                      name="level_status_id"
                                      class="form-check-input"
                                      type="radio"
                                      value="5"
                                      id="customRadioIcon5"
                                      @if($pemilih->level_status_id == 5)
                                        checked
                                      @endif
                                    />
                                  </label>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-check custom-option custom-option-icon">
                                  <label class="form-check-label custom-option-content" for="customRadioIcon6">
                                    <span class="custom-option-body">
                                      <i class="ti ti-file-scissors"></i>
                                      <span class="custom-option-title"> Pindah Arus </span>
                                      <small> Pemilih yang terindikasi telah berpindah ke calon lain. </small>
                                    </span>
                                    <input
                                      name="level_status_id"
                                      class="form-check-input"
                                      type="radio"
                                      value="10"
                                      id="customRadioIcon6"
                                      @if($pemilih->level_status_id == 10)
                                        checked
                                      @endif
                                    />
                                  </label>
                                </div>
                              </div>
                            
                          </div>

                          {{-- mapp --}}

                          <div class="form-horizontal" style="width: 550px">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Location:</label>
                  
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="us3-address" value="manado"/>
                              </div>
                            </div>
                            {{-- mao --}}
                            <div id="us3" style="width: 550px; height: 400px;"></div>

                            <div class="clearfix">&nbsp;</div>
                           
                            <input type="hidden" class="form-control" style="width: 110px" id="us3-lat" />
                            <input type="hidden" class="form-control" style="width: 110px" id="us3-lon" />
                                   
                          </div>

                          <div class="clearfix"></div>
                         
                        </div>

                          {{-- mapp --}}


                         
                          <div class="row g-3">

                         
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-label-primary" 
                                id="auto-close"
                                >
                                    <span class="ti-xs ti ti-device-floppy me-1"></span>Update Penyaringan
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
 
<script>
// let lat = 0;
// let lng = 0;

if ("geolocation" in navigator) {

  navigator.geolocation.getCurrentPosition(

    (position) => {

      $('#us3').locationpicker({
          location: {
              latitude: position.coords.latitude,
              longitude: position.coords.longitude
          },
          radius: 10,
          inputBinding: {
              latitudeInput: $('#us3-lat'),
              longitudeInput: $('#us3-lon'),
              radiusInput: $('#us3-radius'),
              locationNameInput: $('#us3-address'),
          },
          onchanged: function (currentLocation, radius, isMarkerDropped) {
              var addressComponents = $(this).locationpicker('map').location.addressComponents;
              addressUpdated(addressComponents);
          },
          oninitialized: function(component) {
              var addressComponents = $(component).locationpicker('map').location.addressComponents;
              addressUpdated(addressComponents);
          }
      });

    

    },
   
    (error) => {
      console.error("Error getting user location:", error);
    }
  );
} else {
  // Geolocation is not supported by the browser
  console.error("Geolocation is not supported by this browser.");
}





</script>





@endSection

