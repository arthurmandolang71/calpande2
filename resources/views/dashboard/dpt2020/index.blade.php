@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DPT /</span> TPS Data Pemilih Tetap 2020</h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">TPS Data Pemilih Tetap 2020</h5> <!-- title -->

      <div class="card mb-12">
        <div class="card-body">
          <div class="d-grid gap-2">
            <a href="/dpt2020/create" class="btn btn-label-primary">
              Import DPT <span class="ti-xs ti ti-arrow-bar-to-right me-1"></span>
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
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <label class="form-label" for="multicol-country">Kelurahan</label>
          <select id="kelurahan" class="select2 form-select" data-allow-clear="true">
            @if($select_kelurahan)
                <option value="{{ $select_kelurahan['id'] }}" >{{ $select_kelurahan['nama'] }}</option>
            @else
                <option selected>Pilih Kelurahan</option>
            @endif
            
            @foreach ($kelurahan as $item)
                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
            @endforeach
          </select>
          <hr>
        </div>
      </div>
    </div>

      <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kelurahan</th>
                <th>TPS</th>
                <th>Total Pemilih</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($tps as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>KELURAHAN {{ $item->wilayah->nama }}</td>
                <td>TPS {{ $item->nama }}</td>
                <td>{{ $item->total_pemilih_tps }} dari {{ $item->total_pemilih_kelurahan }} Orang</td>
                <td> 
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="ti ti-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="pemilih/dpt2020?kelurahan={{ $item->wilayah->id }}&tps={{ $item->nama }}"
                        ><i class="ti ti-user me-2"></i> Detail</a
                      >
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach 
            </tbody>
          </table>
      </div>

      <br>
      <div class="container">
        {{ $tps->links(); }}
      </div>
  


    <!--/ end content -->




    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5" />

  </div>
  <!-- / Content -->

  <script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
  <script src="{{ asset('') }}assets/js/form-layouts.js"></script>

  <script>
    const kelurahan = document.getElementById('kelurahan');
    
    $("#kelurahan" ).change(function() {
      location.replace('/dpt2020?kelurahan=' + kelurahan.value)
    });

</script>
@endSection