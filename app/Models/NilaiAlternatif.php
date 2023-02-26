<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    use HasFactory;

    protected $table = 'nilai_alternatif';
    protected $guarded = [];

    function kriteria() {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    function nilai_kriteria() {
        return $this->belongsTo(NilaiKriteria::class, 'id_nilai_kriteria');
    }

    function alternatif() {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }
}
