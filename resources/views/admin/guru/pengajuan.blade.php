@extends('admin.app', ['page' => __('Daftar Pengajuan Guru'), 'pageSlug' => 'pengajuan-guru'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">List Pengajuan Guru</h4>
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
                      <th>Action</th>
                  </tr>
              </thead>
              @foreach($pengajuan as $g)
              <form action="{!! route('admin-accept',$g->id) !!}" method="POST">
              @csrf
              <tbody>
                <tr>
                    <td>{{ $g->id }}</td>
                    <td>{{ $g->name }}</td>
                    <td>{{ $g->email }}</td>
                    <td>
                          <button type="submit" class="btn btn-xs btn-success">{{ __('Terima') }}</button>
                    </td>
                </tr>
              </tbody>
              </form>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
