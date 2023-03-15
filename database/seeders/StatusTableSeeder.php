<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create(['nama_status' => "Pending"]);
        Status::create(['nama_status' => "Reject"]);
        Status::create(['nama_status' => "Approved"]);
    }
}
