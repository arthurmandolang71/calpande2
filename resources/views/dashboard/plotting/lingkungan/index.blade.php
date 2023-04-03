@extends('dashboard.part.layout')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Plotting Tim / Ling. /</span> Data Plotting Tim</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Data Plotting Tim</h5> <!-- title -->

      <div class="card mb-12">
        <div class="card-body">
          <div class="d-grid gap-2">
            <button class="btn btn-label-primary" data-bs-toggle="modal"  data-bs-target="#plotting" >
                Plotting Tim <span class="ti-xs ti ti-arrow-bar-to-right me-1"></span>
            </button>
          </div>
        </div>
      </div>

      @if (session()->has('pesan'))
        <div class="container text-center">
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      @endif

      <!-- start content -->
      <br>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <label class="form-label" for="multicol-country">Kelurahan</label>
            <select id="kelurahan" class="select2 form-select" data-allow-clear="true">
                @if($select_kelurahan)
                    <option value="{{ $select_kelurahan['id'] }}" >{{ $select_kelurahan['nama'] }}</option>
                @else
                    <option selected value="">Pilih Kelurahan</option>
                @endif
                
                @foreach ($kelurahan as $item)
                    <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                @endforeach
            </select>
            <hr>
          </div>
          <div class="col-md-2">
            <label class="form-label" for="multicol-country">Lingkungan</label>
            <select id="lingkungan" class="select2 form-select" data-allow-clear="true">
                @if($select_lingkungan)
                    <option value="{{ $select_lingkungan }}" >{{ $select_lingkungan }}</option>
                @else
                    <option selected value="">Pilih Lingkungan</option>
                @endif
                
                @foreach ($list_lingkungan as $item)
                    <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
                @endforeach
            </select>
            </select>
            <hr>
          </div>
          <div class="col-md-4">
            <label class="form-label" for="multicol-country">Anggota Tim</label>
            <select id="anggota_tim_cari" class="select2 form-select" data-allow-clear="true">
                @if($select_anggota_tim)
                    <option value="{{ $select_anggota_tim['id'] }}" >{{ $select_anggota_tim['nama'] }}</option>
                @else
                    <option selected value="">Pilih Anggota Tim</option>
                @endif
                
                @foreach ($anggota_tim as $item)
                    <option value="{{ $item->id }}" >{{ $item->user->name }}</option>
                @endforeach
            </select>
          <hr>
          </div>
          <div class="col-md-2">
            <br>
            <a href="/plotting_ling/tim"><button type="button" class="btn btn-primary"><i class="tf-icons ti ti-arrow-back"></i> Refresh</button></a>
          </div>
        </div>
      </div>


        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <span class="alert-icon text-danger me-2">
                    <i class="ti ti-ban ti-xs"></i>
                    </span>
                    {{ $error }}
                </div>   
            @endforeach
        @endif

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Kelurahan</th>
              <th>Ling</th>
              <th>Juml Pemilih</th>
              <th>Anggota</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($plotting as $item)
            <tr>
              <td>{{ $item->wilayah->nama ?? ''}}</td>
              <td>{{ $item->lingkungan ?? ''}}</td>
              <td></td>
              <td>{{ $item->anggota_tim->user->name ?? ''}}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <form action="/plotting_ling/tim/{{ $item->id }}" method="post">
                      @method('delete')
                      @csrf
                        <input type="hidden" name="acitve" value="0">
                        <button type="submit" class="dropdown-item" onclick="archiveFunction()">
                        <i class="ti ti-cloud-off me-2"></i> Hapus Plotting</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach 
          </tbody>
        </table>
       
    
    <hr class="my-5" />
    </div>
    <!--/ Basic Bootstrap Table -->
    <div class="container">
      {{ $plotting->links(); }}
    </div>

  </div>
  <!-- / Content -->


    <!-- Plotting Card Modal -->
    <div class="modal fade" id="plotting" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="mb-2">Plotting Anggota Tim</h3>
                <p class="text-muted">Silakan cari nama anggota dan plotting berdasarkan kebutuhan anda!</p>
              </div>
              <form action="/plotting_ling/tim" method="post" class="row g-3">
                @csrf
                <div class="col-12">
                    <label class="form-label" for="multicol-country">Anggota Tim</label>
                    <select id="anggota_tim" name="anggota_tim_id" class="select2 form-select" data-allow-clear="true" required>
                        <option value="">Pilih</option>
                        @foreach ($anggota_tim as $item)
                            <option value="{{ $item->id }}" >{{ $item->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label" for="multicol-country">Kelurahan</label>
                    <select id="kelurahan_form" name="wilayah_id" class="select2 form-select" data-allow-clear="true" required>
                        <option value="">Pilih</option>
                        @foreach ($kelurahan as $item)
                            <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label" for="multicol-country">Lingkungan</label>
                    <select id="lingkungan_form" name="lingkungan" class="form-select" required>
                        <option value="">Pilih</option>
                    </select>
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button
                    type="reset"
                    class="btn btn-label-secondary btn-reset"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  >
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--/ Plotting Card Modal -->



  <!-- Vendors JS -->
  <script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
  <script src="{{ asset('') }}assets/js/form-layouts.js"></script>

  <script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
                swal({
                  title: "Apakah anda yakin menghapus plotting ?",
                  text: "jika benar silakan tekan Yes, Saya Yakin.",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, Saya Yakin!",
                  cancelButtonText: "Tidak, Saya tidak Yakin!",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },
          function(isConfirm){
              if (isConfirm) {
                form.submit();          // submitting the form when user press yes
              } else {
                swal("dibatalkan", "data anda dibatalkan :)", "error");
              }
            });
    }
</script>


<script>
    const kelurahan = document.getElementById('kelurahan');
    const lingkungan = document.getElementById('lingkungan');
    const anggota_tim_cari = document.getElementById('anggota_tim_cari');
    
    $("#kelurahan" ).change(function() {
      location.replace('/plotting_ling/tim?kelurahan=' + kelurahan.value + '&lingkungan=' + lingkungan.value + '&anggota_tim=' + anggota_tim_cari.value)
    });

    $("#lingkungan" ).change(function() {
      location.replace('/plotting_ling/tim?kelurahan=' + kelurahan.value + '&lingkungan=' + lingkungan.value + '&anggota_tim=' + anggota_tim_cari.value)
    });

    $("#anggota_tim_cari" ).change(function() {
      location.replace('/plotting_ling/tim?kelurahan=' + kelurahan.value + '&lingkungan=' + lingkungan.value + '&anggota_tim=' + anggota_tim_cari.value)
    });

  </script>

  <script>
$(document).ready(function(){

// Department Change
    $('#kelurahan_form').change(function(){

        // Department id
        var id = $(this).val();

        // Empty the dropdown
        $('#lingkungan_form').find('option').not(':first').remove();

        // AJAX request 
        $.ajax({
            url: '/get_lingkungan/tim/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                console.log(response['data']);

                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    // Read data and create <option >
                    for(var i=0; i<len; i++){

                        var id = response['data'][i].id;
                        var nama = response['data'][i].nama;

                        var option = "<option value='"+nama+"'>"+nama+"</option>";

                        $("#lingkungan_form").append(option); 
                    }
                }

            }
        });
    });
});


  </script>


@endSection