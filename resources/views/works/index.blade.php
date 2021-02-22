@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Works</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Works</a></li>
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
                            <h3 class="card-title">Works List</h3>
                            @can('works.create')
                                <div style="text-align: right">
                                    <a class="btn btn-default" href="{{route('works.create')}}">
                                        <i class="fa fa-plus"></i> Add Work
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Structure</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        @if(auth('web'))
                                            <th>Options</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                {{--@php dd($works); @endphp--}}
                                @foreach($works  as $work)
                                    <tr>
                                        <td>{{ $work->name }}</td>
                                        <td>{{ $work->description }}</td>
                                        <td>{{ $work->structure ? $work->structure->name :''}}</td>
                                        <td>{{ $work->unit ? $work->unit->name :''}}</td>
                                        <td>{{ $work->price }}</td>
                                        <td>{{ $work->rate }}</td>
                                        <td>{{ $work->quantity }}</td>
                                        <td>
                                            @can('works.view')
                                                <a href="{{ route('works.show',$work->id) }}" class="btn btn-warning">View</a>
                                            @endcan
                                            @can('works.edit')
                                                <a href="{{ route('works.edit',$work->id) }}" class="btn btn-info">Edit</a>
                                            @endcan
                                            @can('works.delete')
                                                <button class="btn btn-danger delete-confirm" data-id="{{ $work->id }}">Delete</button>
                                            @endcan
                                        </td>
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
                                url: '/works/delete/' + id,
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