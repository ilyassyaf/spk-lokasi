<?php

namespace App\Http\Controllers;

use App\DataTables\AlternatifDataTable;
use App\Http\Requests\AlternatifRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
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
    public function index(AlternatifDataTable $dataTable)
    {
        return $dataTable->render('alternatif.index');
    }

    /**
     * Add new alternatif.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambah()
    {
        $kriteria = Kriteria::with('nilai')->get();
        return view('alternatif/tambah', compact('kriteria'));
    }

    /**
     * Add new alternatif.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $alternatif = Alternatif::with('nilai')->find($id);
        $kriteria = Kriteria::with('nilai')->get();
        return view('alternatif/edit', compact('kriteria', 'alternatif'));
    }

    public function save(AlternatifRequest $request) {
        $data = $request->validated();
        
        $kriteria = Kriteria::all(['id', 'kode']);
        $nilai_alternatif = [];
        foreach ($kriteria as $k) {
            array_push($nilai_alternatif, new NilaiAlternatif([
                'id_kriteria' => $k->id,
                'id_nilai_kriteria' => $data[$k->kode]
            ]));
        }

        $model = new Alternatif($data);
        try {
            $model->save();
            $model->nilai()->saveMany($nilai_alternatif);
            return redirect('alternatif');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, AlternatifRequest $request) {
        $data = $request->validated();
        
        $kriteria = Kriteria::all(['id', 'kode']);
        $model = Alternatif::find($id);

        $model->fill($data);
        try {
            $model->save();
            
            foreach ($kriteria as $k) {
                $model->nilai()->where('id_kriteria', $k->id)->update(['id_nilai_kriteria' => $data[$k->kode]]);
            }
            
            return redirect('alternatif');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapus($id)
    {
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return redirect('alternatif');
    }
}
