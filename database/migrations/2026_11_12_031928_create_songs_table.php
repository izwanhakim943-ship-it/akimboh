
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title', 160);
            $table->string('artist', 160);
            $table->string('album', 160)->nullable();
            $table->string('genre', 80)->nullable();

            $table->string('audio_path');
            $table->string('cover_path')->nullable();

            $table->unsignedBigInteger('size_bytes')->default(0);

            $table->timestamps();

            $table->index(['user_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
