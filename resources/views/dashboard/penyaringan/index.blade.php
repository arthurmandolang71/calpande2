@extends('dashboard.part.layout')

@section('content')


 <!-- Content -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Penjaringan/</span> List Data </h4> <!-- title -->


    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">List Penjaringan | total : {{ $total_get }} Pemilih </h5><!-- title -->


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
          <a href="/penyaringan"><button type="button" class="btn btn-primary"><i class="tf-icons ti ti-arrow-back"></i></button></a>
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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @if($pemilih)
            @foreach ($pemilih as $item)
              <tr>
                <td>{{ $item->pemilih->nama }}</td>
                <td>{{ $item->pemilih->tempat_lahir }}, {{ $item->pemilih->tanggal_lahir }}</td>
                <td>{{ $item->pemilih->jenis_kelamin }}</td>
                <td>KELURAHAN {{ $item->pemilih->wilayah->nama }}</td>
                <td>Ling. {{ $item->pemilih->rw }}</td>
                <td> 
                  @if($item->level->level == 1)
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-secondary"> <i class="ti ti-question-mark me-2"></i> Penjaringan</span> </a>
                  @elseif($item->level->level == 2)
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-info"> <i class="ti ti-question-mark me-2"></i> Pengembira</span> </a>
                  @elseif($item->level->level == 3)
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-dark"> <i class="ti ti-question-mark me-2"></i> Pragmatis</span> </a>
                  @elseif($item->level->level == 4)
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-success"> <i class="ti ti-question-mark me-2"></i> Loyalis</span> </a>
                  @elseif($item->level->level == 5)
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-primary"> <i class="ti ti-question-mark me-2"></i> Militansi</span> </a>
                  @else
                    <a href="/penyaringan/edit/{{ $item->id }}""> <span class="badge rounded-pill bg-danger"> <i class="ti ti-question-mark me-2"></i> Pindah Arus</span> </a>
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
      @if($pemilih)
      <div class="container">
        {{ $pemilih->links(); }}
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
      location.replace('/penyaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#lingkungan" ).change(function() {
      location.replace('/penyaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#tps" ).change(function() {
      location.replace('/penyaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });

    $("#nama" ).change(function() {
      location.replace('/penyaringan?kelurahan=' + kelurahan.value + '&tps=' + tps.value + '&lingkungan=' + lingkungan.value + '&nama=' + nama.value)
    });


  </script>

  

@endSection