<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tins', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->text('tomTat')->nullable();
            $table->string('urlHinh')->nullable();
            $table->timestamp('ngayDang')->nullable();
            $table->text('noiDung');
            $table->integer('idLT');
            $table->integer('xem')->default(0);
            $table->boolean('noiBat')->default(0);
            $table->boolean('anHien')->default(1);
            $table->string('tags', 2000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tins');
    }
};
