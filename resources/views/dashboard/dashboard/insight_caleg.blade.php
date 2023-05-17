@extends('dashboard.part.layout')

@section('content')



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Pemilih</h4> <!-- title -->


     <!-- Navbar pills -->
     <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"
              ><i class="ti-xs ti ti-user-check me-1"></i>Dashboard Data Pemilih</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-profile-teams.html"
              ><i class="ti-xs ti ti-users me-1"></i> Dashboard Kerja Tim</a
            >
          </li>
        </ul>
      </div>
    </div>
    <!--/ Navbar pills -->

    <div class="col-xl-12 mb-12 col-lg-12 col-12">
        <div class="card h-100">
          <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="card-title mb-0">Statistik</h5>
            </div>
          </div>
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-md-2 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-primary me-3 p-2">
                    <i class="ti ti-box ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">{{ $total_kecamatan }}</h5>
                    <small>Kecamatan</small>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-info me-3 p-2">
                    <i class="ti ti-box-model ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">{{ $total_kelurahan }}</h5>
                    <small>Kelurahan</small>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-success me-3 p-2">
                    <i class="ti ti-flag ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">{{ $total_tps }}</h5>
                    <small>TPS</small>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-6">
                <div class="d-flex align-items-center">
                  <div class="badge rounded-pill bg-label-success me-3 p-2">
                    <i class="ti ti-users ti-sm"></i>
                  </div>
                  <div class="card-info">
                    <h5 class="mb-0">+{{ $total_pemilih }}</h5>
                    <small>Suara</small>
                  </div>
                </div>
              </div>
             
              
            </div>
          </div>
        </div>
      </div>


    <br>
    <div class="row">
       <!-- Transactions -->
       <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card h-100">
           

          <div class="card-header d-flex justify-content-between">
            <div class="card-title m-0 me-2">
              <h5 class="m-0 me-2">Kelurahan</h5>
            </div>
          </div>

          <div class="card-body">
            <ul class="p-0 m-0">
             
                @foreach ($kelurahan as $item)   
                <li class="d-flex mb-3 pb-1 align-items-center">
                    <div class="badge bg-label-success rounded me-3 p-2">
                        <i class="ti ti-home ti-sm"></i>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{ $item->nama }}</h6>
                        </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0 text-success">+{{ $item->jumlah }} </h6>
                        </div>
                    </div>
                </li>
                @endforeach
          
            </ul>
          </div>
       
        <div class="card-header d-flex justify-content-between">
          <div class="card-title m-0 me-2">
              <h5 class="m-0 me-2">Kecamatan</h5>
          </div>
        </div>
        <div class="card-body">
            <ul class="p-0 m-0">
                @foreach ($kecamatan as $item)   
                <li class="d-flex mb-3 pb-1 align-items-center">
                    <div class="badge bg-label-success rounded me-3 p-2">
                        <i class="ti ti-home ti-sm"></i>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{ $item->nama }}</h6>
                          
                        </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0 text-success">+{{ $item->jumlah  }}</h6>
                        </div>
                    </div>
                </li>
                @endforeach
            
            </ul>
        </div>

        </div>

      </div>
      <!--/ Transactions -->

      <!-- Invoice table -->
      <div class="col-lg-8">
        <div class="card h-100">
          <br>
          <h5 class="m-0 me-2 container">TPS</h5>
          <div class="table-responsive card-datatable">
            <table class="datatables-basic table" id="lingkungan_tabel">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Kelurahan</th>
                  <th>TPS</th>
                  <th>Suara</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($tps as $item)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <th>{{ $item->wilayah->nama }}</th>
                  <th>{{ $item->nama  }}</th>
                  <th class="mb-0 text-success"><a target="_blank" href="/penjaringan?kelurahan={{ $item->wilayah->id }}&tps={{ $item->nama  }}">+{{ $item->total_pemilih_tps }}</a></th>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- /Invoice table -->
   
    </div>  <!-- / row -->

  </div>
  <!-- / Content -->
  <!-- Vendors JS -->


 <!-- Vendors JS -->

 <script>
    $(document).ready(function () {
 
    var myTable = $('#lingkungan_tabel').DataTable({
            "paging": true,
            "lengthChange": false,
            "pageLength": 25,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        });

    });
 </script>


@endSection