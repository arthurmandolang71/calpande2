@extends('dashboard.part.layout')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Client /</span> Data Client</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Data Client</h5> <!-- title -->

      <div class="card mb-12">
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="/clients/create" class="btn btn-label-primary">
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

      <div class="table-responsive text-nowrap">

        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Kendaraan</th>
              <th>Kontak</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($clients as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->name }}</td>
              <td>
                {{ $item->anggota_tim->client->kendaraan->nama_singkat ?? ''}}, 
                No. Urut {{ $item->anggota_tim->client->no_urut ?? ''}} <br>
                Dapil {{ $item->anggota_tim->client->dapil->nama ?? ''}}
              </td>
              <td>{{ $item->anggota_tim->client->no_wa ?? ''}}</td>
              <td>
                @if ($item->active == 1)
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
                    <a class="dropdown-item" href="clients/{{ $item->id }}"
                      ><i class="ti ti-user me-2"></i> Detail</a
                    >
                    <a class="dropdown-item" href="/clients/{{ $item->id }}/edit"
                      ><i class="ti ti-pencil me-2"></i> Edit</a
                    >
                    <form action="/clients/update_status/{{ $item->id }}" method="post">
                      @method('put')
                      @csrf
                        @if ($item->active == 1)
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
      {{ $clients->links(); }}
    </div>

  </div>
  <!-- / Content -->
  <!-- Vendors JS -->


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


@endSection