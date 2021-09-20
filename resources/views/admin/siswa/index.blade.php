@extends('admin.app', ['page' => __('Daftar Siswa'), 'pageSlug' => 'siswa'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">List Siswa</h4>
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
                      <th>Foto</th>
                      <th>Nama</th>
                      <th>Email</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($siswa as $s)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <img style="width: 60px; border-radius: 50%" src="/foto_user/{{ $s->foto }}">                    </td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->email }}</td>
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
