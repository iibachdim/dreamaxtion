@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4" style="padding: 150px 20px">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body" style="text-align: center">
                    <a href="{{ route('register.guru') }}" class="btn btn-block btn-info">Register Guru</a>
                    <a href="{{ route('register.siswa') }}" class="btn btn-block btn-primary">Register Siswa</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
