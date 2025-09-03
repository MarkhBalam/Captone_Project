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
->when($programId, fn($qry) => $qry->where('program_id', $programId))
            ->when($facilityId, fn($qry) =>
                $qry->whereHas('facilities', fn($w) => $w->where('facilities.id', $facilityId))
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $programs   = Program::orderBy('name')->get();
        $facilities = Facility::orderBy('name')->get();

        return view('projects.index', compact('projects','programs','facilities'));
    }
    public function create()
    {
        $programs   = Program::orderBy('name')->get();
        $facilities = Facility::orderBy('name')->get();
        return view('projects.create', compact('programs','facilities'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'title' => 'required|string|max:255',
            'nature_of_project' => 'required|string|max:100',
            'description' => 'nullable|string',
            'innovation_focus' => 'nullable|string|max:100',
            'prototype_stage' => 'nullable|string|max:100',
            'testing_requirements' => 'nullable|string',
            'commercialization_plan' => 'nullable|string',
            'facility_ids' => 'nullable|array',
            'facility_ids.*' => 'exists:facilities,id',
        ]);