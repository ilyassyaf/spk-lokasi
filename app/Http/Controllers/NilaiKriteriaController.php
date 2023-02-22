<?php

namespace App\Http\Controllers;

use App\DataTables\NilaiKriteriaDataTable;
use App\Http\Requests\NilaiKriteriaRequest;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;

class NilaiKriteriaController extends Controller
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
    public function index(NilaiKriteriaDataTable $dataTable)
    {
        $kriteria = $this->kriteriaList();
        return $dataTable->render('nilai_kriteria.index', compact("kriteria"));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambah()
    {
        $kriteria = $this->kriteriaList();
        return view('nilai_kriteria/tambah', compact("kriteria"));
    }

    public function simpan(NilaiKriteriaRequest $request)
    {
        $data = $request->validated();
        $model = new NilaiKriteria($data);
        try {
            $model->save();
            return redirect('kriteria/nilai');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $nilaiKriteria = $this->findModel($id);
        $kriteria = $this->kriteriaList();
        return view('nilai_kriteria/edit', compact('kriteria', 'nilaiKriteria'));
    }

    public function update($id, NilaiKriteriaRequest $request)
    {
        $data = $request->validated();
        $model = $this->findModel($id);
        $model->fill($data);
        try {
            $model->save();
            return redirect('kriteria/nilai');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapus($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return redirect('kriteria/nilai');
    }

    /**
     * Show list of kriteria.
     *
     * @return \App\Models\Kriteria[]
     */
    protected function kriteriaList() {
        return Kriteria::all();
    }

    /**
     * Find nilai kriteria model.
     *
     * @return \App\Models\NilaiKriteria
     */
    protected function findModel($id) {
        return NilaiKriteria::find($id);
    }
}
