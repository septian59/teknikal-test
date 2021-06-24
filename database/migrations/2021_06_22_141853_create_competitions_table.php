<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id1')->constrained('teams');
            $table->foreignId('team_id2')->constrained('teams');
            $table->integer('skor_team1')->default(0);
            $table->integer('skor_team2')->default(0);
            $table->foreignId('homeaway_id1')->constrained('homeaways');
            $table->foreignId('homeaway_id2')->constrained('homeaways');
            $table->text('hasil_tanding1')->nullable();
            $table->text('hasil_tanding2')->nullable();
            $table->date('tanggal_tanding');
            $table->time('waktu_tanding');
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
        Schema::dropIfExists('competitions');
    }
}
