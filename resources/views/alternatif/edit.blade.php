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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $alternatif->id }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card radius-10">
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{ url("alternatif/update/$alternatif->id") }}">
                @csrf
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">Informasi Alternatif</h5>
                </div>
                <hr/>
                <div class="col-6">
                    <div>
                        <label class="form-label">Kode</label>
                        <input name="kode" type="text" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $alternatif->kode) }}">
                        @error('kode')
                            <div id="kode" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Nama Alternatif</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $alternatif->nama) }}">
                        @error('nama')
                            <div id="nama" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan', $alternatif->keterangan) }}">
                        @error('keterangan')
                            <div id="keterangan" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    @foreach ($kriteria as $k)
                        <?php $select_value = $alternatif->nilai->where('id_kriteria', $k->id)->first() ?>

                        <div class="mb-2">
                            <label class="form-label">{{ $k->kode . ' - ' . $k->nama }}</label>
                            <select class="form-control single-select @error($k->kode) is-invalid @enderror" name="{{ $k->kode }}">
                                <option @if (!old($k->kode, $select_value->id_nilai_kriteria)) selected @endif disabled>-- Pilih Nilai --</option>
                                @foreach ($k->nilai as $n)
                                    <option value="{{ $n->id }}" @if (old($k->kode, $select_value->id_nilai_kriteria) == $n->id) selected @endif>
                                        {{ $n->label }}
                                    </option>
                                @endforeach
                            </select>
                            @error($k->kode)
                                <div id="{{ $k->kode }}" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
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