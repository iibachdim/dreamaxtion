@extends('layouts.base', ['page' => __('Pengajuan Jadwal'), 'pageSlug' => 'daftar_pengajuan'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">List Jadwal</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablesorter " id="">
              <thead class=" text-primary">
                  @php
                   $no = 1;
                  @endphp
                  <tr>
                      <th>No</th>
                      <th>Nama Guru</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($jadwal as $j)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $j->name }}</td>
                    <td>{{ date('d-M-Y',strtotime($j->tanggal)) }}</td>
                    <td>{{ $j->waktu }}</td>
                    <td>{{ __('Pending') }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
