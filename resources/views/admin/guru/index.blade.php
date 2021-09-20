@extends('admin.app', ['page' => __('Daftar Guru'), 'pageSlug' => 'guru'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">List Guru</h4>
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
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($guru as $g)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <img style="width: 60px; border-radius: 50%" src="/foto_user/{{ $g->foto }}">                    </td>
                    <td>{{ $g->name }}</td>
                    <td>{{ $g->email }}</td>
                    <td>
                        <?php if($g->status = 1) { ?>
                        <a href="#" class="btn btn-xs btn-success">Verified</a>
                        <?php } ?>
                    </td>
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
