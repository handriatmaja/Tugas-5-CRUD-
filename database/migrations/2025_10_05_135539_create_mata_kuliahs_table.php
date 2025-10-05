<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('sks');
            // Foreign key to 'dosens' table, deleting a dosen cascades to mata_kuliahs
            $table->foreignId('dosen_id')->constrained('dosens')->onDelete('cascade');
            $table->timestamps();
        });
    }

    // ... (rest of the file)
};