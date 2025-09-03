@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center mb-3">
    <h1 class="h3 mb-0">Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary ms-auto">New Project</a>
</div>