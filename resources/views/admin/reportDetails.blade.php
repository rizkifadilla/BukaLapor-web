@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeAddInstance')
active
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Detail Laporan</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><a href="{{ route('indexReportVerification') }}"><span>Verifikasi</span></a></li>
        <li><span>Detail</span></li>
    </ul>
</div>
@endsection
@section('content')
@php
$no = 1;
@endphp
<div class="row">
    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{ $report->title }}</h4>
                <p>{{ \App\User::where('id', $report->id_user)->first()->username }}</p>
                <p class="mt-3 mb-4">{{ $report->subtitle }}</p>
                @if ($files != null)
                <p><b>File Lampiran</b></p>
                @foreach ($files as $file)
                <p>{{ $no }} . <a href="{{ url('/Upload/FileLampiran/'.$file->file) }}"
                        target="_BLANK">{{ $file->file }}</a></p>
                @endforeach
                @endif
                <div class="float-right">
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#exampleModalCenter">Tolak</button>
                    <a href="{{ route('accept',$report->id) }}" class="btn btn-success">Terima</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambahkan Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ action('AdminController@reject') }}" enctype="multipart/form-data"
                class="ml-2">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_report" value="{{ $report->id }}">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"
                            required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success float-right mt-3" type="submit">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="tolakForm">

</div>
@endsection
