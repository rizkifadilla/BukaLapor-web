@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeAddInstance')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Tambah Instansi</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><span>Tambah</span></li>
    </ul>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <x-card header="Form Tambah Instansi">
            <div class="row">
                <div class="col-md-12">
                <form action="{{ action('AdminController@addedInstance') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Username</label>
                            <input class="form-control" type="text" id="example-text-input" name="username">
                            <label for="example-text-input" class="col-form-label">email</label>
                            <input class="form-control" type="email" id="example-text-input" name="email">
                            <label for="example-text-input" class="col-form-label">password</label>
                            <input class="form-control" type="text" id="example-text-input" name="password">
                            <input type="submit" class="btn btn-rounded btn-success mb-3 mt-3 float-right" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </x-card>
    </div>
</div>
@endsection
