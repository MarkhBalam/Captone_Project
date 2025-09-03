<?php

namespace Database\Seeders;

use App\Models\{Project, Program, Facility};
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $programIds   = Program::pluck('id')->all();
        $facilityIds  = Facility::pluck('id')->all();

        if (empty($programIds) || empty($facilityIds)) {
            // Make sure ProgramSeeder and FacilitySeeder run first.
            return;
        }