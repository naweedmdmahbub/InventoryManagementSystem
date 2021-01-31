@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Materials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Materials</a></li>
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
                            <h3 class="card-title">Materials List</h3>
                            @can('products.create')
                                <div style="text-align: right">
                                    <a class="btn btn-default" href="{{route('materials.create')}}">
                                        <i class="fa fa-plus"></i> Add Material
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
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>Expiry Period</th>
                                        @if(auth('web'))
                                            <th>Options</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($materials  as $material)
                                    <tr>
                                        <td>{{ $material->name }}</td>
                                        <td>{{ $material->price }}</td>
                                        <td>{{ $material->sku }}</td>
                                        <td>{{ $material->description }}</td>
                                        <td>{{ $material->category ? $material->category->name :''}}</td>
                                        <td>{{ $material->unit ? $material->unit->name :''}}</td>
                                        <td>{{ $material->expiry_period }}</td>
                                        <td>
                                            @can('products.view')
                                                <a href="{{ route('materials.show',$material->id) }}" class="btn btn-warning">View</a>
                                            @endcan
                                            @can('products.edit')
                                                <a href="{{ route('materials.edit',$material->id) }}" class="btn btn-info">Edit</a>
                                            @endcan
                                            @can('products.delete')
                                                <button class="btn btn-danger delete-confirm" data-id="{{ $material->id }}">Delete</button>
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
                                url: '/materials/delete/' + id,
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