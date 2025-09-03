@php($edit = isset($project))
@csrf
<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Title</label>
    <input name="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $project->title ?? '') }}" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>
  <div class="col-md-6">
    <label class="form-label">Program</label>
    <select name="program_id" class="form-select @error('program_id') is-invalid @enderror" required>
      <option value="">Select program</option>
      @foreach($programs as $pr)
        <option value="{{ $pr->id }}" @selected(old('program_id', $project->program_id ?? '') == $pr->id)>{{ $pr->name }}</option>
      @endforeach
    </select>
    @error('program_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
  </div>