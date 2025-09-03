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