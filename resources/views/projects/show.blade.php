@extends('layouts.app')
@section('content')
<div class="row g-3">
    <div class="col-lg-8">
        <div class="card p-4">
            <div class="d-flex align-items-start">
                <div>
                    <h2 class="h4 mb-1">{{ $project->title }}</h2>
                    <div class="text-muted">Program: {{ optional($project->program)->name ?? '—' }}</div>
                </div>
                <a href="{{ route('projects.edit',$project) }}" class="btn btn-outline-secondary btn-sm ms-auto me-2">Edit</a>
                <button type="button" class="btn btn-outline-danger btn-sm"
                        data-delete-url="{{ route('projects.destroy',$project) }}">
                    Delete
                </button>
            </div>
            <hr>
            <p class="mb-2">{{ $project->description ?? 'No description.' }}</p>
            <div class="row">
                <div class="col-md-4"><span class="text-muted">Nature</span><div>{{ $project->nature_of_project }}</div></div>
                <div class="col-md-4"><span class="text-muted">Stage</span><div>{{ $project->prototype_stage ?? '—' }}</div></div>
                <div class="col-md-4"><span class="text-muted">Focus</span><div>{{ $project->innovation_focus ?? '—' }}</div></div>
            </div>
        </div>