@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('active')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Home</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><span>Home</span></li>
    </ul>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <x-card header="Card">
            <p class="mb-3">asdhasdkja</p>
        </x-card>
    </div>
</div>
@endsection
