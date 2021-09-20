@extends('layouts.base', ['page' => __('Tambah Jadwal'), 'pageSlug' => 'add_jadwal'])

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Daftar Guru') }}</h5>
            </div>
            <div class="card-body">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Guru</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                    @foreach($guru as $g)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img style="width: 60px; border-radius: 50%" src="/foto_user/{{ $g->foto }}">
                        </td>
                        <td>{{ $g->name }}</td>
                        <td>{{ $g->email }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Form Pengajuan Jadwal') }}</h5>
            </div>
            <form action="{{ route('store-jadwal-siswa') }}" method="POST" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('Nama Guru') }}</label>
                        <select class="form-control" name="guru_id">
                            @foreach($guru as $g)
                            <option style="color: black" class="form-control" value="{{ $g->id }}">{{ $g->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Tanggal') }}</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Waktu') }}</label>
                        <input type="text" name="waktu" class="form-control" placeholder="14:00" required>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('OK') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
