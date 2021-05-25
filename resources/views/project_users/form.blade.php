{{--@php dd(Request::url(), Request::segment(2), request()->path(), basename(request()->path()) ) @endphp--}}

<div class="card-body">
    <input type="hidden" name="project_id" id="project_id" value="{{ $project->id }}">

    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Project</label>
        <div class="col-sm-10">
            <div class="form-control" readonly>{{$project->name}}</div>
            {{--<input type="text" class="form-control" name="code" id="code" placeholder="Code"--}}
                   {{--value="@if($project_user->code){{ $project_user->code }}@endif">--}}
        </div>
    </div>



    <div class="form-group row project_user-repeater" id="project_user">
        <div class="col-sm-2">
            <input data-repeater-create type="button" class="btn btn-info" value="Add Schedule"/>
        </div>
        <div data-repeater-list="project_user" class="col-sm-10">
            <div data-repeater-item >

                <div class="form-group row">
                    <label for="user_id" class="col-sm-1 col-form-label">User</label>
                    <select class="form-control col-sm-3 user" name="user_id" onchange="changeTimeslot(this);">
                        @foreach($project_users as $project_user)
                            <option value="{{ $project_user->id }}" @if(isset($project_user->timeslot) && $project_user->timeslot->id == $project_user->id) selected @endif>

                            </option>
                        @endforeach
                    </select>

                    <label for="project_id" class="col-sm-1 col-form-label">Role</label>
                    <select class="form-control col-sm-3 project" name="project_id" onchange="changeRole(this)">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if(isset($role->id)) selected @endif>
                                {{ $role->id }}
                            </option>
                        @endforeach
                    </select>


                    <input data-repeater-delete type="button" class="btn btn-danger" style="text-align: right" value="Delete"/>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- /.card-body -->


<script>
    $(function() {
        var arr = [];
        console.log('adsad')
        var $repeater = $('.project_user-repeater').repeater({
            initEmpty: true,
            defaultValues: {
                'user_id': null,
                'project_id': null,
            },
            show: function () {
                console.log('project_user-repeater');
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: true
        });

        @if(basename(request()->path()) === 'edit')
            var myObj = JSON.parse('{!!  json_encode($project_users)  !!}');
            console.log(myObj)
            $repeater.setList(myObj);
        @endif

    });


    function changeTimeslot(val){
        console.log(val.value)
        var myFormObj = $('.project_user-repeater').repeaterVal();
    }



    function changeRole(val){
        console.log('')
        var myFormObj = $('.project_user-repeater').repeaterVal();
        var myFormJson = JSON.stringify(myFormObj)
        console.log('myFormObj:  ',myFormObj)
        console.log('myFormJson arr:  ',myFormJson)
        console.log('$.each objects-------------------')
        $.each( myFormObj.project_user, function( key, value ) {
            console.log( key + ": " + value );
        });
        $.each( myFormObj.project_user, function( key, value ) {
            console.log( key + "\tuser_id: " + value.user_id+ "\tproject_id: " + value.project_id );
        });
    }



    function saveFormData(event) {
        event.preventDefault();
        if ($('.user').length || $('.project').length){
            console.log('has repeater length')
            var scheduleValue =  $('.project_user-repeater').repeaterVal()
            scheduleValue = JSON.stringify(scheduleValue)
            console.log("scheduleValue",scheduleValue)
        } else {
            var scheduleValue = null
        }
        var seats = $('#projectUserForm').find( "input[name='seats']" ).val()
        var code = $('#projectUserForm').find( "input[name='code']" ).val()
        var semester_id = $('#projectUserForm').find( "select[name='semester_id']" ).val()
        var course_id = $('#projectUserForm').find( "select[name='course_id']" ).val()
        var teacher_id = $('#projectUserForm').find( "select[name='teacher_id']" ).val()

        @if(basename(request()->path()) === 'edit')
            var project_user_id = $('#project_user_id').val()
            var url = "/project_users/update/"+project_user_id
        @else
            var url = "/project_users"
        @endif
        console.log(code,teacher_id,semester_id,course_id,seats)
        $.ajax({
            method: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            data: { scheduleValue: scheduleValue, seats: seats, semester_id: semester_id, course_id: course_id, teacher_id: teacher_id, code: code },
            url: url,
            success: function (response) {
                console.log(response.success)
                if (response.success == true) window.location.href = "/project_users";
            },
            error: function (data) {
                console.log('ERROR Data')
                if( data.status === 422 ) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function (key, value) {
                        // console.log(key+ " " +value);
                        $('#response').empty().addClass("alert alert-danger");
                        if($.isPlainObject(value)) {
                            $.each(value, function (key, value) {
                                console.log(key+ " " +value);
                                $('#response').show().append(value+"<br/>");

                            });
                        }else{
                            $('#response').show().append(value+"<br/>"); //this is my div with messages
                        }
                    });
                }
            }
        })
    }


</script>