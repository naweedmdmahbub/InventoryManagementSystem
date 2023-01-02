<div class="card-body">
    <div class="form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name" placeholder="First Name"
             value="@if($supplier->first_name){{ $supplier->first_name }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
             value="@if($supplier->last_name){{ $supplier->last_name }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="business_name" class="col-sm-2 col-form-label">Business Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="business_name" placeholder="Business Name"
             value="@if($supplier->business_name){{ $supplier->business_name }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="Email"
             value="@if($supplier->email){{ $supplier->email }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>

    
    <div class="form-group row">
        <label for="contact_person" class="col-sm-2 col-form-label">Contact Person</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="contact_person" placeholder="Contact Person"
                   value="@if($supplier->contact_person){{ $supplier->contact_person }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="contact_no" class="col-sm-2 col-form-label">Contact No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="contact_no" placeholder="Contact No"
                   value="@if($supplier->contact_no){{ $supplier->contact_no }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Address"
                   value="@if($supplier->address){{ $supplier->address }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>
    <div class="form-group row">
        <label for="website" class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="website" placeholder="Website"
                   value="@if($supplier->website){{ $supplier->website }}@endif"
                   @if (Route::currentRouteName() == 'suppliers.show') readonly @endif>
        </div>
    </div>

</div>
<!-- /.card-body -->

<script>
    $( document ).ready(function() {
        $('input').attr('autocomplete','off');
    });
</script>