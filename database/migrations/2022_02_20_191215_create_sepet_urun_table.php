<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSepetUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepet_urun', function (Blueprint $table) {
            $table->id();
            $table->integer('sepet_id')->unsigned();
            $table->integer('urun_id')->unsigned();
            $table->integer('adet');
            $table->decimal('fiyati', 5, 2);
            $table->string('durum', 30);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes()->nullable();

            $table->foreign('sepet_id')->references('id')->on('sepet')->onDelete('cascade');
            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sepet_urun');
    }
}
