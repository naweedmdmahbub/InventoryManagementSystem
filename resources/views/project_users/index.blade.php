@extends('layouts.master')

@section('content')
    {{--@php $project_user_types = getProject Usertypes(); @endphp--}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Project Users</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project Users List</h3>
                            <div style="text-align: right">
                                <a class="btn btn-default" href="{{route('project_users.create')}}">
                                    <i class="fa fa-plus"></i> Add Project User
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        {{--<th>Code</th>--}}
                                        {{--<th>Course</th>--}}
                                        {{--<th>Teacher</th>--}}
                                        {{--<th>Seats</th>--}}
                                        @auth('web')
                                            <th>Edit</th>
                                        @endauth
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projects  as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        {{--<td>{{ $project_user->code }}</td>--}}
                                        {{--<td>{{ $project_user->course->title }}</td>--}}
                                        {{--<td>{{ $project_user->teacher->first_name.' '.$project_user->teacher->second_name }}</td>--}}
                                        {{--<td>{{ $project_user->seats }}</td>--}}
                                        @auth('web')
                                            <td><a href="{{ route('project_users.edit',$project->id) }}" class="btn btn-info">Manage Users</a></td>
                                            {{--<td><button class="btn btn-info" onclick="location.href='{{ route('project_users.edit',$project_user->id) }}'">Edit</button></td>--}}
                                            {{--<td><button class="btn btn-danger delete-confirm" data-id="{{ $project_user->id }}">Delete</button></td>--}}
                                        @endauth
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->




    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });




        $(".delete-confirm").click(function () {
            var id = $(this).data("id");
            console.log('Clicking Delete',id);
            $.confirm({
                title: 'Warning!',
                icon: 'fa fa-warning',
                content: 'Are you sure? You wont be able to revert this!',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Click Here',
                        btnClass: 'btn-red',
                        action: function(){
                            $.ajax({
                                method: 'POST',
                                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                                url: '/project_users/delete/' + id,
                                success: function (response) {
                                    if(response.msg){
                                        console.log(response.msg,"ajax success response.msg")
                                        location.reload()
                                    }
                                }
                            })
                        }
                    },
                    close: function () {
                    }
                }
            });
        });
    </script>


@endsection