@php($edit = isset($project))
@csrf
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input name="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $project->title ?? '') }}" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>