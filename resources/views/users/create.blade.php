@extends('layout.layout')



@section('content')
    <div>
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Users</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="javascript:void(0);">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    <a href="javascript:void(0);" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> Export
                    </a>
                    <a href="{{ url('users/create') }}" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Create
                    </a>
                </div>
            </div>

            @include('layout.alert')
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card ">
                        <form action="{{ url('users/store') }}" method="POST">
                            @csrf
                            @include('users.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection


@section('script')
    <script>
        $('#menu_users').addClass('active')
        $('#menu_users').next().show();
    </script>
@endsection
