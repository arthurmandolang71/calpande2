@extends('dashboard.part.layout')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Anggota Tim /</span> Data Anggota Tim</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Data Anggota Tim</h5> <!-- title -->

      <div class="card mb-12">
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="/tim/create" class="btn btn-label-primary">
              Tambah Data <span class="ti-xs ti ti-arrow-bar-to-right me-1"></span>
            </a>
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
            <label class="form-label" for="multicol-country">Cari Nama</label>
            @if($cari_nama)
              <input type="text" id="nama" class="form-control" placeholder="John"  value="{{ $cari_nama }}"/>
            @else
              <input type="text" id="nama" class="form-control" placeholder="Masukan nama/marga" value="" />
            @endif
          <hr>
          </div>
          <div class="col-md-2">
            <br>
            <a href="/tim"><button type="button" class="btn btn-primary"><i class="tf-icons ti ti-arrow-back"></i> Refresh</button></a>
          </div>
        </div>
      </div>


      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No. Wa</th>
              <th>JK</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($tim as $item)
            <tr>
              <td>{{ $item->user->name ?? ''}}</td>
              <td>{{ $item->alamat ?? ''}}</td>
              <td>{{ $item->no_wa ?? ''}}</td>
              <td>{{ $item->jenis_kelamin ?? ''}}</td>
              <td>
                @if ($item->user->active == 1)
                  <span class="badge bg-label-primary me-1">Active</span>
                @else
                  <span class="badge bg-label-danger me-1">Block</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="tim/{{ $item->user->id }}"
                      ><i class="ti ti-user me-2"></i> Detail</a
                    >
                    <a class="dropdown-item" href="/tim/{{ $item->user->id }}/edit"
                      ><i class="ti ti-pencil me-2"></i> Edit</a
                    >
                    <form action="/tim/update_status/{{ $item->user->id }}" method="post">
                      @method('put')
                      @csrf
                        @if ($item->user->active == 1)
                          <input type="hidden" name="acitve" value="0">
                          <button type="submit" class="dropdown-item" onclick="archiveFunction()">
                            <i class="ti ti-cloud-off me-2"></i> 
                            Non aktifkan
                          </button>
                        @else
                          <input type="hidden" name="acitve" value="1">
                            <button type="submit" class="dropdown-item" onclick="archiveFunction()">
                              <i class="ti ti-cloud me-2"></i> 
                              aktifkan
                          </button>
                        @endif
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
      {{ $tim->links(); }}
    </div>

  </div>
  <!-- / Content -->
  <!-- Vendors JS -->
  <script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
  <script src="{{ asset('') }}assets/js/form-layouts.js"></script>

  <script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
                swal({
                  title: "Apakah anda yakin mengubah status aktif?",
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

    const nama = document.getElementById('nama');
      
    $("#nama" ).change(function() {
      location.replace('/tim?nama=' + nama.value)
    });

</script>


@endSection