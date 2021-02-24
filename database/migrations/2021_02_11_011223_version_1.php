<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Version1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fungsi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('jenis_belanja', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('program', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('aktivitas', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->string('program_id');
            $table->foreign('program_id')->references('kode')->on('program')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('kro', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->string('aktivitas_id');
            $table->foreign('aktivitas_id')->references('kode')->on('aktivitas')->onUpdate('cascade');
            $table->integer('volume')->nullable();
            $table->string('satuan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('ro', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->string('kro_id');
            $table->foreign('kro_id')->references('kode')->on('kro')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('komponen', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->string('ro_id');
            $table->foreign('ro_id')->references('kode')->on('ro')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subkomponen', function (Blueprint $table) {
            $table->string('kode', 50)->primary();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->string('komponen_id');
            $table->foreign('komponen_id')->references('kode')->on('komponen')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('detil', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->integer('posisi');
            $table->integer('volume');
            $table->string('satuan');
            $table->string('subkomponen_id');
            $table->foreign('subkomponen_id')->references('kode')->on('subkomponen')->onUpdate('cascade');
            $table->foreignId('jenis_belanja_id')->constrained('jenis_belanja');
            $table->foreignId('fungsi_id')->constrained('fungsi');

            $table->bigInteger('jan_rpd')->nullable();
            $table->bigInteger('feb_rpd')->nullable();
            $table->bigInteger('mar_rpd')->nullable();
            $table->bigInteger('apr_rpd')->nullable();
            $table->bigInteger('mei_rpd')->nullable();
            $table->bigInteger('jun_rpd')->nullable();
            $table->bigInteger('jul_rpd')->nullable();
            $table->bigInteger('agu_rpd')->nullable();
            $table->bigInteger('sep_rpd')->nullable();
            $table->bigInteger('okt_rpd')->nullable();
            $table->bigInteger('nov_rpd')->nullable();
            $table->bigInteger('des_rpd')->nullable();

            $table->bigInteger('jan_lds')->nullable();
            $table->bigInteger('feb_lds')->nullable();
            $table->bigInteger('mar_lds')->nullable();
            $table->bigInteger('apr_lds')->nullable();
            $table->bigInteger('mei_lds')->nullable();
            $table->bigInteger('jun_lds')->nullable();
            $table->bigInteger('jul_lds')->nullable();
            $table->bigInteger('agu_lds')->nullable();
            $table->bigInteger('sep_lds')->nullable();
            $table->bigInteger('okt_lds')->nullable();
            $table->bigInteger('nov_lds')->nullable();
            $table->bigInteger('des_lds')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('fungsi_id')->nullable()->constrained('fungsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detil');
        Schema::dropIfExists('subkomponen');
        Schema::dropIfExists('komponen');
        Schema::dropIfExists('ro');
        Schema::dropIfExists('kro');
        Schema::dropIfExists('aktivitas');
        Schema::dropIfExists('program');

        Schema::dropIfExists('jenis_belanja');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_fungsi_id_foreign');
            $table->dropColumn('fungsi_id');
        });
    }
}
