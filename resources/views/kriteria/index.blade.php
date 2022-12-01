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
                    <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card radius-10">
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>C1</td>
                        <td>Akses Transportasi</td>
                        <td>4</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>C2</td>
                        <td>Kepadatan Penduduk</td>
                        <td>3</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>C3</td>
                        <td>Harga Sewa</td>
                        <td>2</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>C4</td>
                        <td>Pendapatan Penduduk</td>
                        <td>1</td>
                        <td>
                            <div class="table-actions d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            "use strict";

            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    lengthChange: false,
                    buttons: [ 
                        {
                            text: 'Tambah',
                            action: function ( e, dt, node, config ) {
                                location.href = "{{ url('/kriteria/tambah') }}";
                            }
                        },
                        'excel', 'pdf', 'print',
                    ]
                });
            
                table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            });


        });
    </script>
@endsection