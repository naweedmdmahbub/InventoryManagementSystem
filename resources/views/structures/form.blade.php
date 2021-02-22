<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name" required
             value="@if($structure->name){{ $structure->name }}@endif"
                   @if (Route::currentRouteName() == 'structures.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" placeholder="Description"
             value="@if($structure->description){{ $structure->description }}@endif"
                   @if (Route::currentRouteName() == 'structures.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="project" class="col-sm-2 col-form-label">Project</label>
        @if (Route::currentRouteName() == 'structures.show')
            <select class="form-control col-sm-10" name="project_id" disabled>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" @if($structure->project_id == $project->id) selected @endif>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="project_id" required>
                <option value="">-- Please Select a Project --</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" @if($structure->project_id == $project->id) selected @endif>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>


</div>
<!-- /.card-body -->