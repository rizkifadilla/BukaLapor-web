@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeHome')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Laporkan</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><span>Form</span></li>
    </ul>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <x-card header="Form Laporan">

        </x-card>
    </div>
</div>
@endsection
