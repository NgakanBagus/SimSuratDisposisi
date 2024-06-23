<?php
// database/migrations/2024_06_18_000000_create_disposisi_surat_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiSuratTable extends Migration
{
    public function up()
    {
        Schema::create('disposisi_surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id');
            $table->string('title');
            $table->string('sender');
            $table->string('receiver');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disposisi_surat');
    }
}
