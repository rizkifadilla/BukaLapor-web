@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeReportData')
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
                <ul class="nav nav-tabs m-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Tindak Lanjut</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="tab-home">
                        @foreach ($actions as $action)
                        <div class="card bg-light mb-1 ml-4 mr-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img class="avatar user-thumb"
                                            src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                                    </div>
                                    <div class="col-md-11">
                                        <p><b>{{ \App\Model\Instance::where('id_user', $action->id_user)->first()->name }}</b></p>
                                        <div class="float-right">
                                            <a href="{{ route('deleteResponse', ['id' => $action->id, 'id_report' => $report->id]) }}" style="color:red">Hapus</a>
                                        </div>
                                        <p>{{ $action->content }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <form action="{{ action('InstanceController@response') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card bg-light mb-1 ml-4 mr-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img class="avatar user-thumb"
                                                src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <input type="hidden" name="id_report" value="{{ $report->id }}">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="3" name="message" placeholder="Berikan Tanggapan/Tindak lanjut ....."
                                                    required></textarea>
                                                <button type="submit"
                                                    class="btn btn-primary float-right mt-2">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
