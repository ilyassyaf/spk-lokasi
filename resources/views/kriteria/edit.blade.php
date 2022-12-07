@extends('layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Kriteria</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{url("/")}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url("/kriteria")}}">Kriteria</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card radius-10">
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ url("kriteria/update/$kriteria->id") }}">
                @csrf
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Informasi Kriteria</h5>
                </div>
                <hr/>
                <div class="row mb-3">
                    <label for="kode" class="col-sm-3 col-form-label">Kode Kriteria</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{ old('kode', $kriteria->kode) }}">
                        @error('kode')
                            <div id="kode" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $kriteria->nama) }}">
                        @error('nama')
                            <div id="nama" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot" id="bobot" value="{{ old('bobot', $kriteria->bobot) }}">
                        @error('bobot')
                            <div id="bobot" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary px-5">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        
    </script>
@endsection