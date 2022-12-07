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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url("/kriteria/nilai")}}">Nilai</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card radius-10">
        <div class="card-body">
            <form class="row g-3">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Nilai Kriteria</h5>
                </div>
                <hr/>
                <div class="row mb-3">
                    <label for="kriteria" class="col-sm-3 col-form-label">Kriteria</label>
                    <select class="col-sm-9 single-select" name="kriteria">
                        <option>Pilih Kriteria</option>
                        <option value="Kepadatan Penduduk">Kepadatan Penduduk</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="label" class="col-sm-3 col-form-label">Label</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="label">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nilai">
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
        $(function() {
            "use strict";

            $('.single-select').select2({
                theme: 'bootstrap4',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });
    </script>
@endsection