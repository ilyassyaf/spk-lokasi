@extends('layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Alternatif</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{url("/")}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{url("/alternatif")}}">Alternatif</a></li>
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
                    <h5 class="mb-0">Informasi Alternatif</h5>
                </div>
                <hr/>
                <div class="col-6">
                    <div>
                        <label class="form-label">Kode</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Nama Alternatif</label>
                        <input type="text" class="form-control">
                    </div>
                    <div>
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <label class="form-label">Kepadatan Penduduk</label>
                        <select class="form-control single-select" name="C1">
                            <option>Pilih Nilai</option>
                            <option value="< 100">< 100</option>
                            <option value="< 500">< 500</option>
                            <option value="< 1000">< 1000</option>
                            <option value=">= 1000">>= 1000</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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