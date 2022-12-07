<?php

namespace App\Http\Controllers;

use App\DataTables\KriteriaDataTable;
use App\Http\Requests\KriteriaRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
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
    public function index(KriteriaDataTable $dataTable)
    {
        return $dataTable->render('kriteria.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambah()
    {
        return view('kriteria\tambah');
    }

    public function simpan(KriteriaRequest $request)
    {
        $data = $request->validated();
        $model = new Kriteria($data);
        try {
            $model->save();
            return redirect('kriteria');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria\edit', compact('kriteria'));
    }

    public function update($id, KriteriaRequest $request)
    {
        $data = $request->validated();
        $model = Kriteria::find($id);
        $model->fill($data);
        try {
            $model->save();
            return redirect('kriteria');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapus($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect('kriteria');
    }
}
