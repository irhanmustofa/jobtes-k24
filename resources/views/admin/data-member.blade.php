@extends('admin.layouts.main')
@section('title', 'Data Member')

@section('content')


<div class="container-fluid">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Data Member</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <!-- Add modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target=".bd-example-modal-lg">+ Tambah Member</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="sign-up-from">
                                        <form class="mt-3" action="/data-member" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-0"
                                                            id="exampleInputEmail1" placeholder="Nama Lengkap"
                                                            name="name">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail2">Email<span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" class="form-control mb-0"
                                                            id="exampleInputEmail2" placeholder="Email" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">No Handphone<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor Handphone"
                                                            name="no_hp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Jenis Kelamin<span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control mb-0" name="gender">
                                                            <option>-- Pilih Jenis Kelamin --</option>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Tanggal Lahir<span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor Handphone"
                                                            name="tanggal_lahir">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            No KTP<span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Nomor KTP / NIK"
                                                            name="no_ktp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Foto Profil</label>
                                                        <input type="file" class="form-control-file" name="foto_profil">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Password<span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" class="form-control mb-0"
                                                            id="exampleInputPassword1" placeholder="Password"
                                                            name="password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-inline-block w-100 mb-2">
                                                <button type="submit" class="btn btn-primary float-right">Add
                                                    Member</button>
                                            </div>
                                        </form>
                                    </div>
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
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>No KTP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Foto Profil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataMember as $member)
                                    @php
                                    $status = $member->status;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->no_hp }}</td>
                                        <td>{{ $member->no_ktp }}</td>
                                        <td>{{ $member->gender }}</td>
                                        <td>{{ $member->tanggal_lahir }}</td>
                                        <td>
                                            @if ($member->foto_profil != null)
                                            <img src="{{ asset('storage/img/foto-profil/'.$member->foto_profil) }}"
                                                alt="" style="width: 100px; height: 100px;">
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Edit modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".edit-modal{{ $member->id }}">Edit</button>
                                            <div class="modal fade edit-modal{{ $member->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Member</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="sign-up-from">
                                                            <form class="mt-3" action="/data-member/{{ $member->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Nama
                                                                                Lengkap<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-0"
                                                                                id="exampleInputEmail1"
                                                                                placeholder="Nama Lengkap" name="name"
                                                                                value="{{ $member->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail2">Email<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="email"
                                                                                class="form-control mb-0"
                                                                                id="exampleInputEmail2"
                                                                                placeholder="Email" name="email"
                                                                                value="{{ $member->email }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">No
                                                                                Handphone<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" class="form-control mb-0"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Nomor Handphone"
                                                                                name="no_hp"
                                                                                value="{{ $member->no_hp }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Jenis
                                                                                Kelamin<span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-control mb-0"
                                                                                name="gender">
                                                                                <option value="L" @if ($member->gender
                                                                                    == 'L')
                                                                                    selected
                                                                                    @endif>Laki-Laki</option>
                                                                                <option value="P" @if ($member->gender
                                                                                    == 'P')
                                                                                    selected
                                                                                    @endif>Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Tanggal
                                                                                Lahir<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="date" class="form-control mb-0"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Nomor Handphone"
                                                                                name="tanggal_lahir"
                                                                                value="{{ $member->tanggal_lahir }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">
                                                                                No KTP<span class="text-danger">*</span>
                                                                            </label>
                                                                            <input type="number"
                                                                                class="form-control mb-0"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Nomor KTP / NIK"
                                                                                name="no_ktp"
                                                                                value="{{ $member->no_ktp }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleFormControlFile1">Foto
                                                                                Profil</label>
                                                                            @if ($member->foto_profil != null)
                                                                            <div class="mb-3">
                                                                                <img src="{{ asset('storage/img/foto-profil/'.$member->foto_profil) }}"
                                                                                    alt=""
                                                                                    style="width: 100px; height: 100px;">
                                                                            </div>
                                                                            @endif
                                                                            <input type="file" class="form-control-file"
                                                                                name="foto_profil">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleInputPassword1">Password<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="password"
                                                                                class="form-control mb-0"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Password" name="password">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="pwd">Status</label>
                                                                            <select class="form-control" name="status">
                                                                                <option value="1" @if($status==1)
                                                                                    selected @endif>Aktif</option>
                                                                                <option value="0" @if($status==0)
                                                                                    selected @endif>Tidak
                                                                                    Aktif</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-inline-block w-100 mb-2">
                                                                    <button type="submit"
                                                                        class="btn btn-primary float-right">Simpan
                                                                        Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="/data-member/{{ $member->id }}" type="submit"
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