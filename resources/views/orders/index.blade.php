@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders List</h3>
                            @can('products.create')
                                <div style="text-align: right">
                                    <a class="btn btn-default" href="{{route('orders.create')}}">
                                        <i class="fa fa-plus"></i> Add Order
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
                                @foreach($orders  as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->sku }}</td>
                                        <td>{{ $order->description }}</td>
                                        <td>{{ $order->category ? $order->category->name :''}}</td>
                                        <td>{{ $order->unit ? $order->unit->name :''}}</td>
                                        <td>{{ $order->expiry_period }}</td>
                                        <td>
                                            @can('products.view')
                                                <a href="{{ route('orders.show',$order->id) }}" class="btn btn-warning">View</a>
                                            @endcan
                                            @can('products.edit')
                                                <a href="{{ route('orders.edit',$order->id) }}" class="btn btn-info">Edit</a>
                                            @endcan
                                            @can('products.delete')
                                                <button class="btn btn-danger delete-confirm" data-id="{{ $order->id }}">Delete</button>
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
        </div> --}}
        <!-- /.container-fluid -->


        <div id="app">
            <router-view test="test"></router-view>
        </div>
    </section>
    <!-- /.content -->


    <!-- page script -->
    <script>
    </script>

    
    <!-- vue script -->
    <script src="{{ mix('/js/app.js') }}"></script>


@endsection