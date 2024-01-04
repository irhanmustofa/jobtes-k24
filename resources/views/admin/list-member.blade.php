@extends('admin.layouts.main')
@section('title', 'List Member Json')

@section('content')
<div>
    {{ json_encode($dataMember) }}
</div>
@endsection