<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Убедись, что столбец 'category_id' существует перед его изменением
            if (Schema::hasColumn('posts', 'category_id')) {
                // Изменяем тип или параметры столбца 'category_id'
                $table->unsignedBigInteger('category_id')->change(); // Или другой тип в зависимости от нужд
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('post_content', 'content');
        });
    }
};
