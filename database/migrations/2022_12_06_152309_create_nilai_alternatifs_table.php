<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->constrained('alternatif')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kriteria')->constrained('kriteria')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_nilai_kriteria')->constrained('nilai_kriteria')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_alternatif');
    }
}
