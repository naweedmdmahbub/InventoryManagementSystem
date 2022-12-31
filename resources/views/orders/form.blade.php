<div class="card-body">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Name"
             value="@if($order->name){{ $order->name }}@endif"
                   @if (Route::currentRouteName() == 'orders.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" placeholder="Description"
                   value="@if($order->description){{ $order->description }}@endif"
                   @if (Route::currentRouteName() == 'orders.show') readonly @endif>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="price" placeholder="Price"
             value="@if($order->price){{ $order->price }}@endif"
                   @if (Route::currentRouteName() == 'orders.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="rate" class="col-sm-2 col-form-label">Rate</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="rate" placeholder="Rate"
             value="@if($order->rate){{ $order->rate }}@endif"
                   @if (Route::currentRouteName() == 'orders.show') readonly @endif>
        </div>
    </div>

    <div class="form-group row">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="quantity" placeholder="Quantity"
             value="@if($order->quantity){{ $order->quantity }}@endif"
                   @if (Route::currentRouteName() == 'orders.show') readonly @endif>
        </div>
    </div>


    <div class="form-group row">
        <label for="structure" class="col-sm-2 col-form-label">Structure</label>
        @if (Route::currentRouteName() == 'orders.show')
            <select class="form-control col-sm-10" name="structure_id" disabled>
                @foreach($structures as $structure)
                    <option value="{{ $structure->id }}" @if($order->structure_id == $structure->id) selected @endif>
                        {{ $structure->name }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="structure_id">
                <option value="">-- Please Select a Structure --</option>
                @foreach($structures as $structure)
                    <option value="{{ $structure->id }}" @if($order->structure_id == $structure->id) selected @endif>
                        {{ $structure->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>

    <div class="form-group row">
        <label for="unit" class="col-sm-2 col-form-label">Unit</label>
        @if (Route::currentRouteName() == 'orders.show')
            <select class="form-control col-sm-10" name="unit_id" disabled>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" @if($order->unit_id == $unit->id) selected @endif>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        @else
            <select class="form-control col-sm-10" name="unit_id">
                <option value="">-- Please Select a Unit --</option>
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" @if($order->unit_id == $unit->id) selected @endif>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
        @endif
    </div>


</div>
<!-- /.card-body -->