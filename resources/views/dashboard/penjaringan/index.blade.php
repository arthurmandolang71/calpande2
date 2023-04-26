@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penjaringan/</span> List Data </h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">List Penjaringan | total : {{ $total_get }} Pemilih </h5><!-- title -->
    
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
        <div class="col-md-3">
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
        {{-- <div class="col-md-2">
            <label class="form-label" for="multicol-country">Tps</label>
            <select id="tps" class="select2 form-select" data-allow-clear="true">
              @if($select_tps)
                  <option value="{{ $select_tps }}" >{{ $select_tps }}</option>
              @else
                  <option selected value="">Pilih Tps</option>
              @endif
              
              @foreach ($list_tps as $item)
                  <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
              @endforeach
            </select>
            <hr>
        </div> --}}
        <input type="hidden" id="tps" value="">

        <div class="col-md-3">
            <label class="form-label" for="multicol-country">Cari Nama Depan + Marga</label>
              @if($cari_nama)
                <input type="text" id="nama" class="form-control" placeholder="John"  value="{{ $cari_nama }}"/>
              @else
                <input type="text" id="nama" class="form-control" placeholder="Masukan nama/marga" value="" />
              @endif
            <hr>
        </div>
        <div class="col-md-2">
          <br>
          <a href="/penjaringan"><button type="button" class="btn btn-primary"><i class="tf-icons ti ti-arrow-back"></i></button></a>
          <button type="button" id="print_pdf" class="btn btn-danger"><i class="tf-icons ti ti-file-text"></i></button>
        </div>
      </div>
    </div>

  
      <div class="table-responsive">
          <table class="datatables-basic table" 
          {{-- id="pemilih_tabel" --}}
          >
            <thead>
              <tr>
                <th>Nama</th>
                <th>TTL</th>
                <th>JK</th>
                <th>Kelurahan</th>
                <th>Ling.</th>
                {{-- <th>Tps</th> --}}
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @if($dpt)
            @foreach ($dpt as $item)
              <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>KELURAHAN {{ $item->wilayah->nama }}</td>
                <td>Ling. {{ $item->rw }}</td>
                {{-- <td>TPS {{ $item->tps }}</td> --}}
                <td> 
                  @if(isset($item->pemilih->pemilih_client->user->anggota_tim->client_id))
                    @if($item->pemilih->pemilih_client->user->anggota_tim->client_id == request()->session()->get('client_id'))
                      <a href="/penjaringan/create/{{ $item->id }}"> <span class="badge rounded-pill bg-success"> <i class="ti ti-circle-check me-2"></i> Terjaring</span> </a>
                    @else
                      <a href="/penjaringan/create/{{ $item->id }}"> <span class="badge rounded-pill bg-warning"> <i class="ti ti-alert-circle me-2"></i> Belum</span> </a>
                    @endif
                   
                  @else
                    <a href="/penjaringan/create/{{ $item->id }}"> <span class="badge rounded-pill bg-warning"> <i class="ti ti-alert-circle me-2"></i> Belum</span> </a>
                  @endif
                </td>
              </tr>
            @endforeach 
            @endif
            </tbody>
          </table>
          <br> <br> <br> <br> 
      </div>

      <br>
      @if($dpt)
      <div class="container">
        {{ $dpt->links(); }}
      </div>
      @endif
  
     

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
    const lingkungan = document.getElementById('lingkungan');
    const tps = document.getElementById('tps');
    const nama = document.getElementById('nama');
    
    $("#kelurahan" ).change(function() {
      location.replace('/penjaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#lingkungan" ).change(function() {
      location.replace('/penjaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#tps" ).change(function() {
      location.replace('/penjaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#nama" ).change(function() {
      location.replace('/penjaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#print_pdf" ).click(function() {
      window.open('/print/dpt2020?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value, '_blank')
    });
  </script>

  
 <script>
  // $(document).ready(function () {

  // var myTable = $('#pemilih_tabel').DataTable({
  //         // "paging": true,
  //         "lengthChange": false,
  //         "pageLength": 20000,
  //         "searching": true,
  //         "ordering": true,
  //         "info": true,
  //         "autoWidth": true,
  //     });

  // });
</script>
@endSection