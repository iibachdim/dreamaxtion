@extends('layouts.base', ['page' => __('Daftar Pengajuan Jadwal'), 'pageSlug' => 'pengajuan_jadwal'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">List Pengajuan Jadwal Siswa</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table tablesorter">
              <thead class=" text-primary">
                  @php
                   $no = 1;
                  @endphp
                  <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Action</th>
                  </tr>
              </thead>
              @foreach($pengajuan as $p)
              <form action="{!! route('user.accept-jadwal',$p->id) !!}" method="POST">
              @csrf
              <tbody>
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{  date('d-M-Y',strtotime($p->tanggal)) }}</td>
                    <td>{{ $p->waktu }}</td>
                    <td>
                          <button type="submit" class="btn btn-xs btn-success">{{ __('Terima') }}</button>
                    </td>
                </form>
                <form action="{!! route('user.decline-jadwal',$p->id) !!}" method="POST">
                @csrf
                    <td>
                        <button type="submit" class="btn btn-xs btn-danger">{{ __('Tolak') }}</button>
                    </td>
                </form>
                </tr>
              </tbody>

              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
