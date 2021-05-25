@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    {{--@php dd($project_user); @endphp--}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Project User Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Project User</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Project User / create</h3>
                </div>
                <div id="response"></div>

                <form id="projectUserForm" class="form-horizontal" action="{{ route('project_users.store') }}" method="POST">
                    {{ csrf_field() }}
                    @include('project_users.form')

                    <div class="card-footer">
                        {{--<button type="submit" class="btn btn-info">Submit</button>--}}
                        <a href="" onclick="saveFormData(event);" class="btn btn-info">Submit</a>
                        <a class="btn btn-default float-right" href="{{ route('project_users.index') }}">Cancel</a>
                    </div>
                </form>

            </div>
            <!-- /.card -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



    <script>
    </script>
@endsection
