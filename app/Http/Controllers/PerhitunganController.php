<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $nilaiKriteria = NilaiKriteria::all();
        $alternatif = Alternatif::all();

        // mapping data alternatif dengan nilai kriteria
        $dataAlternatif = [];
        foreach ($alternatif as $alt) {
            // ubah data menjadi asociative array untuk mempermudah manipulasi variabel
            $aData = $alt->toArray();
            // inisialisasi nilai untuk setiap kriteria
            $aData['nilai'] = [];

            // mapping nilai untuk setiap kriteria
            // bentuk yang dihasilkan = alternatif[nilai][kode kriteria ke-n] => data untuk kriteria ke-n (n = index kriteria)
            foreach ($alt->nilai as $aNilai) {
                $aData['nilai'][$aNilai->kriteria->kode] = [
                    'kode' => $aNilai->kriteria->kode,
                    'id_kriteria' => $aNilai->id_kriteria,
                    'kriteria' => $aNilai->kriteria->nama,
                    'bobot' => $aNilai->kriteria->bobot,
                    'nilai' => $aNilai->nilai_kriteria->nilai,
                    'label' => $aNilai->nilai_kriteria->label,

                    // Bobot Evaluasi (WE-n) = nilai * bobot / 100 (n = index kriteria)
                    'bobot_evaluasi' => (double)$aNilai->nilai_kriteria->nilai * (double)$aNilai->kriteria->bobot / 100
                ];

                // Jumlah semua Bobot Evaluasi untuk menghasilkan Nilai MFEP
                $aData['total_mfep'] = array_reduce($aData['nilai'], function ($carry, $item) {
                    return $carry + $item['bobot_evaluasi'];
                }, 0);
            }
            array_push($dataAlternatif, $aData);
        }
        
        // sort data alternatif berdasarkan total MFEP
        $sortedRank = $dataAlternatif;
        usort($sortedRank, function ($a, $b) {
            return $b['total_mfep'] <=> $a['total_mfep'];
        });

        // dd($sortedRank, $dataAlternatif);

        return view('perhitungan.index', compact('kriteria', 'nilaiKriteria', 'dataAlternatif', 'sortedRank'));
    }
}
