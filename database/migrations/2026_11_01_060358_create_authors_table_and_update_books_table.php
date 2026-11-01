
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('authors')) {
            Schema::create('authors', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'author')) {
                $table->dropColumn('author');
            }

            if (!Schema::hasColumn('books', 'author_id')) {
                $table->foreignId('author_id')->nullable()->constrained();
            }
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (Schema::hasColumn('books', 'author_id')) {
                $table->dropForeign(['author_id']);
                $table->dropColumn('author_id');
            }

            if (!Schema::hasColumn('books', 'author')) {
                $table->string('author')->nullable();
            }
        });

        Schema::dropIfExists('authors');
    }
};
