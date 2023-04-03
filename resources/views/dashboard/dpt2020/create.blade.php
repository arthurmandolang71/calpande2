@extends('dashboard.part.layout')

@section('content')


<link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/dropzone/dropzone.css" />

 
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DPT /</span> Data Pemilih Tetap 2020</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Upload Data Pemilih Tetap 2020</h5> <!-- title -->

      <div class="d-grid gap-2">
          <a href="/dpt2020" class="btn btn-label-danger">
              <span class="ti-xs ti ti-arrow-bar-to-left me-1"></span>Batal
          </a>
      </div>


      <!-- start content -->
      <div class="row">

        <div class="col-12">
            <div class="card mb-4">
              <h5 class="card-header">Upload</h5>
              <div class="card-body">
                <form action="/dpt2020" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Periksa data sebelum di upload</label>
                        <input name="file_csv" class="form-control" type="file" id="formFile" />
                    </div>
                    <div class="form-check mt-3">
                      <input class="form-check-input" type="checkbox" value="1" name="sario" id="defaultCheck1" />
                      <label class="form-check-label" for="defaultCheck1"> Kecamatan Sario  ? </label>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlSelect1" class="form-label">Kecamatan</label>
                      <select class="form-select" id="kecamatan" aria-label="Default select example">
                        <option selected>Pilih Kecamatan</option>
                        @foreach ($kecamatan as $item)
                            <option value="{{ $item->kode_kec }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlSelect2" class="form-label">Kelurahan</label>
                      <select name="wilayah_id" class="form-select" id="kelurahan" aria-label="Default select example">
                        <option selected>Pilih Kelurahan</option>
                        @foreach ($kelurahan as $item)
                            <option value="{{ $item->id }}" class="{{ $item->kode_kec }}">{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Kirim</button>
                </form>
              </div>
            </div>
          </div>
    
      </div>
      <!--/ end content -->




    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />

  </div>
  <!-- / Content -->
  {{-- <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script> --}}
  <script src="{{ asset('assets/js/jquery.chained.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.chained.remote.js') }}"></script>


<script type='text/javascript'>
  $(document).ready(function(){
    $("#kelurahan").chainedTo("#kecamatan");
  });
</script>


@endSection

