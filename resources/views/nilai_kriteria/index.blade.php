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
                    <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card radius-10">
        <div class="card-header bg-transparent">
            <div class="col-3">
                <select id="select_kriteria" class="single-select">
                    <option selected disabled>-- Pilih Kriteria --</option>
                    @foreach ($kriteria as $item)
                        <option value="{{$item['id']}}">{{$item['nama']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@section('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(function() {
            "use strict";

            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            $('#select_kriteria').on('change', (e) => {
                $('#nilai-kriteria-table').on('preXhr.dt', function ( e, settings, data ) {
                    data.id_kriteria = $('#select_kriteria').val();
                }).DataTable().draw();
            });
        });
    </script>
@endsection