@extends('layout.layout')



@section('content')
    <div>
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Users</h1>
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item active"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </div>
                <div class="ms-auto pageheader-btn">
                    <a href="{{ url('users/create') }}" class="btn btn-primary btn-icon text-white me-2">
                        <span>
                            <i class="fe fe-plus"></i>
                        </span> Add Account
                    </a>
                    {{-- <a href="javascript:void(0);" class="btn btn-success btn-icon text-white">
                        <span>
                            <i class="fe fe-log-in"></i>
                        </span> Export
                    </a> --}}
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 -->

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List User</h3>
                        </div>
                        <div class="card-body ">
                            <div class="table-responsive">
                                <table class="table border table-bordered text-nowrap text-md-nowrap mg-b-0 table-sm">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @foreach ($data as $key => $dt)
                                            <tr class="align-middle">
                                                <td class="text-center align-middle">{{ ++$key }}</td>
                                                <td class="align-middle">
                                                    {{ $dt->name }}
                                                </td>
                                                <td class="align-middle">{{ $dt->instansi }}</td>
                                                <td class="align-middle"
                                                    style="word-break: break-word; overflow-wrap: break-word;">
                                                    {{ $dt->email }}</td>
                                                <td class="align-middle">
                                                    <ul class="m-0">
                                                        @foreach ($dt->roles->pluck('name') as $role)
                                                            <li>{{ $role }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="text-center">
                                                    @if (in_array('SUPER ADMIN', $auth->getRoleNames()->toArray()))
                                                        <button
                                                            class="btn btn-outline-secondary btn_roles"data-bs-toggle="modal"
                                                            data-bs-target="#modal_edit_roles" data-id="{{ $dt->id }}"
                                                            data-roles="{{ $dt->roles }}"
                                                            data-nama="{{ $dt->name }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-outline-secondary"> <i
                                                                class="bi bi-pencil"></i></button>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-outline-primary "
                                                        href="{{ url('users/' . \Crypt::encryptString($dt->id)) }}">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-outline-danger  btn_hapus"
                                                        data-id="{{ $dt->id }}" data-nama="{{ $dt->name }}"
                                                        data-bs-toggle="modal" data-bs-target="#modal_hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
