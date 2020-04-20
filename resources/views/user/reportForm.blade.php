@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeReportForm')
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
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ action('UserController@addedReportData') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Judul Laporan</label>
                            <input class="form-control" type="text" id="example-text-input" name="title" required>
                            <label for="exampleFormControlTextarea1" class="mt-2">Detail Laporan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subtitle" required></textarea>
                            <label class="col-form-label mt-2">Kategori</label>
                            <select class="custom-select select2" id="provinsiSelect" name="seen" required>
                                <option selected="selected" disabled>Pilih Kategori</option>
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="example-text-input" class="col-form-label mt-2">Lampiran ( jika tidak ada kosongkan )</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="lampiran">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-rounded btn-success mb-3 mt-3 float-right" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </x-card>
    </div>
</div>
@endsection
