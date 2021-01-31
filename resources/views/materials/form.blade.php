<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name"
             value="@if($material->name){{ $material->name }}@endif"
                   @if (Route::currentRouteName() == 'materials.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="price" placeholder="Price"
             value="@if($material->price){{ $material->price }}@endif"
                   @if (Route::currentRouteName() == 'materials.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="sku" class="col-sm-2 col-form-label">Sku</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="sku" placeholder="Sku"
             value="@if($material->sku){{ $material->sku }}@endif"
                   @if (Route::currentRouteName() == 'materials.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" placeholder="Description"
             value="@if($material->description){{ $material->description }}@endif"
                   @if (Route::currentRouteName() == 'materials.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="expiry_period" class="col-sm-2 col-form-label">Expiry Period</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="expiry_period" placeholder="Expiry Period"
             value="@if($material->expiry_period){{ $material->expiry_period }}@endif"
                   @if (Route::currentRouteName() == 'materials.show') readonly @endif>
        </div>
    </div>




    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
        @if (Route::currentRouteName() == 'materials.show')
            <select class="form-control col-sm-10" name="category_id" disabled>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($material->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="category_id">
                <option value="">-- Please Select a Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($material->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>

    <div class="form-group row">
        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
        @if (Route::currentRouteName() == 'materials.show')
            <select class="form-control col-sm-10" name="unit_id" disabled>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" @if($material->unit_id == $unit->id) selected @endif>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="unit_id">
                <option value="">-- Please Select a Unit --</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" @if($material->unit_id == $unit->id) selected @endif>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>


</div>
<!-- /.card-body -->


<script>
    $(function() {
        $('input[name="expiry_period"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
</script>