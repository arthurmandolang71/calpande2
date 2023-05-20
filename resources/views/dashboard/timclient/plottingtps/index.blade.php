@extends('dashboard.part.layout')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Plotting /</span> TPS</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Plotting TPS</h5> <!-- title -->

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Kelurahan</th>
              <th>Lingkungan</th>
              <th>DPT</th>
              <th>Terjaringan</th>
              <th>Pengembira</th>
              <th>Pragmatis</th>
              <th>Loyalis</th>
              <th>Militansi</th>
              <th>Pindah Arus</th>
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
              </td>
            </tr>
          @endforeach 
          </tbody>
        </table>
       
    <hr class="my-5" />
    </div>
    <!--/ Basic Bootstrap Table -->

  </div>
     


       
    
        <hr class="my-5" />

    <!--/ Basic Bootstrap Table -->
        <div class="container">
            {{ $tim->links(); }}
        </div>

     </div>
  <!-- / Content -->
  <!-- Vendors JS -->
  <script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
  <script src="{{ asset('') }}assets/js/form-layouts.js"></script>





@endSection