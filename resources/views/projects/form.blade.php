<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name" required
             value="@if($project->name){{ $project->name }}@endif"
                   @if (Route::currentRouteName() == 'projects.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="location" class="col-sm-2 col-form-label">Location</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="location" placeholder="Location" required
             value="@if($project->location){{ $project->location }}@endif"
                   @if (Route::currentRouteName() == 'projects.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" placeholder="Description"
             value="@if($project->description){{ $project->description }}@endif"
                   @if (Route::currentRouteName() == 'projects.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="start_date" placeholder="Start Date"
             value="@if($project->start_date){{ $project->start_date }}@endif"
                   @if (Route::currentRouteName() == 'projects.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="end_date" placeholder="End Date"
             value="@if($project->end_date){{ $project->end_date }}@endif"
                   @if (Route::currentRouteName() == 'projects.show') readonly @endif>
        </div>
    </div>



    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        @if (Route::currentRouteName() == 'projects.show')
            <select class="form-control col-sm-10" name="status" disabled>
                @foreach(\App\Models\Project::getStatuses() as $key=>$status)
                    <option value="{{ $key }}" @if($project->status == $key) selected @endif>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="status">
                <option value="">-- Please Select a Status --</option>
                @foreach(\App\Models\Project::getStatuses() as $key=>$status)
                    <option value="{{ $key }}" @if($project->status == $key) selected @endif>
                        {{ $status }}
                    </option>
                @endforeach

            </select>
        @endif
    </div>


</div>
<!-- /.card-body -->


<script>
    $(function() {
        $('input[name="start_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
        $('input[name="end_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
</script>