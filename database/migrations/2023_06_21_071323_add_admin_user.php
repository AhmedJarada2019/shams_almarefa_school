<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Use DB directly to avoid model issues with columns that may not exist yet
        $exists = DB::table('users')->where('email', 'admin@admin.com')->exists();
        if (! $exists) {
            DB::table('users')->insert([
                'name'       => 'Super Admin',
                'email'      => 'admin@admin.com',
                'password'   => bcrypt('admin@admin.com'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
};
