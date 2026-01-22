<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('book_category_trans', function (Blueprint $table) {
            // Drop the old foreign key constraint
            $table->dropForeign(['book_category_id']);

            // Rename the column
            $table->renameColumn('book_category_id', 'category_id');
        });

        Schema::table('book_category_trans', function (Blueprint $table) {
            // Add the new foreign key constraint
            $table->foreign('category_id')->references('id')->on('book_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_category_trans', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['category_id']);

            // Rename back to the original column name
            $table->renameColumn('category_id', 'book_category_id');
        });

        Schema::table('book_category_trans', function (Blueprint $table) {
            // Add back the old foreign key constraint
            $table->foreign('book_category_id')->references('id')->on('book_categories')->cascadeOnDelete();
        });
    }
};
