@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Suppliers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Suppliers</a></li>
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
                            <h3 class="card-title">Suppliers List</h3>
                            @can('users.create')
                                <div style="text-align: right">
                                    <a class="btn btn-default" href="{{route('suppliers.create')}}">
                                        <i class="fa fa-plus"></i> Add Supplier
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
                                        <th>Business</th>
                                        <th>Email</th>
                                        <th>Contact Person</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        @if(auth('web'))
                                            <th>Options</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($suppliers  as $supplier)
                                    <tr>
                                        <td>{{ $supplier->first_name.' '.$supplier->last_name }}</td>
                                        <td>{{ $supplier->business_name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->contact_person }}</td>
                                        <td>{{ $supplier->contact_no }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>
                                            @can('users.view')
                                                <a href="{{ route('suppliers.show',$supplier->id) }}" class="btn btn-warning">View</a>
                                            @endcan
                                            @can('users.edit')
                                                <a href="{{ route('suppliers.edit',$supplier->id) }}" class="btn btn-info">Edit</a>
                                            @endcan
                                            @can('users.delete')
                                                <button class="btn btn-danger delete-confirm" data-id="{{ $supplier->id }}">Delete</button>
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
                                url: '/suppliers/delete/' + id,
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