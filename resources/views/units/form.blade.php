<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name"
             value="@if($unit->name){{ $unit->name }}@endif"
                   @if (Route::currentRouteName() == 'units.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="note" class="col-sm-2 col-form-label">Note</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="note" placeholder="Note"
             value="@if($unit->note){{ $unit->note }}@endif"
                   @if (Route::currentRouteName() == 'units.show') readonly @endif>
        </div>
    </div>

</div>
<!-- /.card-body -->
