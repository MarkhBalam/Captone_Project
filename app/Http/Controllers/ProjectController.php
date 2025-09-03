<?php

namespace App\Http\Controllers;

use App\Models\{Project, Program, Facility};
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $q          = request('q');
        $programId  = request('program_id');
        $facilityId = request('facility_id');

        $projects = Project::with(['program','facilities'])
            ->when($q, fn($qry) =>
                $qry->where(function($w) use ($q) {
                    $w->where('title', 'like', "%{$q}%")
                      ->orWhere('innovation_focus', 'like', "%{$q}%")
                      ->orWhere('prototype_stage', 'like', "%{$q}%")
                      ->orWhere('nature_of_project', 'like', "%{$q}%");
                })
            )
