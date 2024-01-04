@extends('admin.layouts.main')
@section('title', 'Data Admin')

@section('content')


<div class="container-fluid">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Data Admin</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <!-- Add modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target=".bd-example-modal-lg">+ Tambah Admin</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/data-admin" method="POST">
                                        @csrf

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="iq-card">
                                                        <div class="iq-card-header d-flex justify-content-between">
                                                            <div class="iq-header-title">
                                                                <h4 class="card-title">Add Admin</h4>
                                                            </div>
                                                        </div>
                                                        <div class="iq-card-body">
                                                            <p>Daftarkan Username dan Password.</p>

                                                            <div class="form-group">
                                                                <label for="email">Username:</label>
                                                                <input type="text" class="form-control" name="name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pwd">Password:</label>
                                                                <input type="password" class="form-control"
                                                                    name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataAdmin as $admin)
                                    @php
                                    $status = $admin->status;
                                    $count = count($dataAdmin);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            @if ($admin->status == 1)
                                            <span class="badge badge-success">Aktif</span>
                                            @else
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".edit-modal{{ $admin->id }}">Edit</button>
                                            <div class="modal fade edit-modal{{ $admin->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Admin</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/data-admin/{{ $admin->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="iq-card">
                                                                            <div
                                                                                class="iq-card-header d-flex justify-content-between">
                                                                                <div class="iq-header-title">
                                                                                    <h4 class="card-title">Edit Admin
                                                                                    </h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="iq-card-body">
                                                                                <div class="form-group">
                                                                                    <label for="name">Username:</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="name"
                                                                                        name="name"
                                                                                        value="{{ $admin->name }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="pwd">Password:</label>
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        name="password">
                                                                                    <small>
                                                                                        <i class="text-danger"><b>
                                                                                                *Kosongkan
                                                                                                jika tidak ingin
                                                                                                mengubah password.
                                                                                            </b>
                                                                                        </i>
                                                                                    </small>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="pwd">Status:</label>
                                                                                    <select class="form-control"
                                                                                        name="status">
                                                                                        <option value="1"
                                                                                            @if($status==1) selected
                                                                                            @endif>Aktif</option>
                                                                                        <option value="0"
                                                                                            @if($status==0) selected
                                                                                            @endif>Tidak
                                                                                            Aktif</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/data-admin/{{ $admin->id }}" type="submit"
                                                class="btn btn-danger delete-btn"
                                                onclick="showSwal('passing-parameter-execute-cancel')">Delete</a>
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