@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manpowers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Manpowers</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="app">
            <router-view></router-view>
        </div>
    </section>
    <!-- /.content -->


    <!-- page script -->
    <script>
    </script>

    
    <!-- vue script -->
    <script src="{{ mix('/js/app.js') }}"></script>


@endsection