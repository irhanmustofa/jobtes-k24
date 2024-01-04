@extends('admin.layouts.main')
@section('title', 'Dashboard')

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <span class="line-height-4">Jumlah Semua Admin</span>
                            <h4 class="mb-2 mt-2">{{ $countAdmin }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <span class="line-height-4">Jumlah Semua Member</span>
                            <h4 class="mb-2 mt-2">{{ $countMember }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <span class="line-height-4">Jumlah Member Aktif</span>
                            <h4 class="mb-2 mt-2">{{ $countMemberAktif }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection