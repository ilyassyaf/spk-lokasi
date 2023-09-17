@extends('layouts.app')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Perhitungan</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{url("/")}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Perhitungan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card radius-10">
        <div class="card-body table-responsive">
            <div class="h3">Kriteria</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Normalisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $k)
                        <tr>
                            <td class="text-center">{{ $k->kode }}</td>
                            <td>{{ $k->nama }}</td>
                            <td class="text-center">{{ $k->bobot }}</td>
                            <td class="text-center">{{ (double)$k->bobot / 100 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body table-responsive">
            <div class="h3">Alternatif</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        @foreach ($kriteria as $k)
                            <th class="text-center">{{ $k->nama }} ({{ $k->kode }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAlternatif as $da)
                        <tr>
                            <td>{{ $da['kode'] }}</td>
                            <td>{{ $da['nama'] }}</td>
                            @foreach ($kriteria as $k)
                                <td>{{ $da['nilai'][$k->kode]['label'] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body table-responsive">
            <div class="h3">Nilai Alternatif Numerik</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        @foreach ($kriteria as $k)
                            <th class="text-center">{{ $k->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAlternatif as $da)
                        <tr>
                            <td class="text-center">{{ $da['kode'] }}</td>
                            @foreach ($kriteria as $k)
                                <td class="text-center">{{ $da['nilai'][$k->kode]['nilai'] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body table-responsive">
            <div class="h3">Perhitungan Bobot Evaluasi</div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th rowspan="2" colspan="2" class="text-center">Kriteria (C)</th>
                        <th rowspan="2" class="text-center">Bobot (W)</th>
                        <th colspan="{{ count($dataAlternatif) }}" class="text-center">Evaluasi (E)</th>
                    </tr>
                    <tr>
                        @foreach ($dataAlternatif as $da)
                            <th class="text-center">E-{{ $da['kode'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $k)
                        <tr>
                            <td class="text-center">{{ $k->kode }}</td>
                            <td>{{ $k->nama }}</td>
                            <td class="text-center">{{ (double)$k->bobot / 100 }}</td>
                            @foreach ($dataAlternatif as $da)
                                <td class="text-center">{{ $da['nilai'][$k->kode]['bobot_evaluasi'] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body table-responsive">
            <div class="h3">Perangkingan</div>
            <table id="rankTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Total MFEP</th>
                        <th class="text-center">Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sortedRank as $item)
                        <tr>
                            <td class="text-center">{{ $item['kode'] }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td class="text-center">{{ $item['total_mfep'] }}</td>
                            <td class="text-center">{{ (int)$loop->index + 1 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button onclick="printTable()" class="btn btn-primary">Cetak</button>
        </div>
    </div>
@endsection

@section('script')
<script>
    function printTable() {
        var table = document.getElementById("rankTable");
        if (table) {
            var printWindow = window.open('', '', 'width=1080,height=720');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Ranking Table</title></head><body>');
            printWindow.document.write('<style>table, th, td {border: 1px solid black;border-collapse: collapse;} .text-center {text-align: center;}</style>');
            printWindow.document.write('<table style="width: 100%;">' + table.innerHTML + '</table>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            // printWindow.close();
        }
    }
</script>
@endsection