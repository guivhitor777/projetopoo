<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aluno');
            $table->string('disciplina');
            $table->decimal('nota', 4, 2);
            $table->foreign('id_aluno')->references('id')->on('alunos')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};