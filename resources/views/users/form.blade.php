<div class="card-body">
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" placeholder="Username"
             value="@if($user->username){{ $user->username }}@endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="fullname" placeholder="Full Name"
             value="@if($user->fullname){{ $user->fullname }}@endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="Email"
             value="@if($user->email){{ $user->email }}@endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
    </div>


    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Address"
                   value="@if($user->address){{ $user->address }}@endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="phone" placeholder="Phone"
                   value="@if($user->phone){{ $user->phone }}@endif">
        </div>
    </div>
    <div class="form-group row">
        <label for="salary" class="col-sm-2 col-form-label">Salary</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="salary" placeholder="Salary"
                   value="@if($user->salary){{ $user->salary }}@endif">
        </div>
    </div>
</div>
<!-- /.card-body -->