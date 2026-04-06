<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update enum to include new statuses: borrowed, return_requested
        DB::statement("ALTER TABLE borrowings MODIFY COLUMN status ENUM('pending', 'approved', 'rejected', 'borrowed', 'return_requested', 'returned', 'overdue') DEFAULT 'pending'");

        Schema::table('borrowings', function (Blueprint $table) {
            $table->timestamp('borrowed_at')->nullable()->after('approved_by');
            $table->timestamp('return_requested_at')->nullable()->after('returned_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('borrowings', function (Blueprint $table) {
            $table->dropColumn(['borrowed_at', 'return_requested_at']);
        });

        DB::statement("ALTER TABLE borrowings MODIFY COLUMN status ENUM('pending', 'approved', 'rejected', 'returned', 'overdue') DEFAULT 'pending'");
    }
};
