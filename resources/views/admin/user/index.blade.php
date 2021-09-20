@extends('admin.app', ['page' => __('User List'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h4 class="card-title">User Management</h4>
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th colspan="2" style="text-align: center">Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($user as $u)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td style="text-transform: uppercase">{{ $u->role }}</td>
                    <td style="text-align: right">
                        <a href="#" class="btn btn-xs btn-info">Edit</a>
                    </td>
                    <td style="text-align: center">
                        <form action="{{ route('admin.user-delete', 'id='.$u->id ) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-xs btn-danger">Delete</button>
                        </form>
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
