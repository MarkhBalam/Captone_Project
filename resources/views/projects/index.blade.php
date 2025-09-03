@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mb-3">
    <h1 class="h3 mb-0">Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary ms-auto">New Project</a>
</div>
<form class="card p-3 mb-3" method="get">
  <div class="row g-2">
    <div class="col-md-6">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Search title, focus, stage, nature">
    </div>
    <div class="col-md-3">
      <select class="form-select" name="program_id">
        <option value="">All programs</option>
        @foreach($programs as $pr)
          <option value="{{ $pr->id }}" @selected(request('program_id')==$pr->id)>{{ $pr->name }}</option>
        @endforeach
      </select>
    </div>
     <div class="col-md-3">
      <select class="form-select" name="facility_id">
        <option value="">All facilities</option>
        @foreach($facilities as $f)
          <option value="{{ $f->id }}" @selected(request('facility_id')==$f->id)>{{ $f->name }}</option>
        @endforeach
      </select>
    </div>
  </div>