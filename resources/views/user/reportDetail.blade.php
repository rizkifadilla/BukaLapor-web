@extends('layouts.templateUser')
@extends('layouts.templateNavigationListUser')
@section('activeReportDetail')
active
@endsection

@section('content')
@php
$no = 1;
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">
                                {{ $report->title }}
                                @if ($report->status == "Done")
                                <span class="badge badge-pill badge-success">Selesai</span>
                                @endif
                            </h4>
                            <p>{{ \App\Model\Instance::where('id', $report->id_instance)->first()->name }}</p>
                            <p class="mt-3 mb-4">{{ $report->subtitle }}</p>
                            @if ($report->id_user == Auth::user()->id)
                            @if ($report->status != "Done")
                            <div class="float-right">
                                <a href="{{ route('doneReportUser', $report->id) }}" class="btn btn-success">Laporan
                                    Selesai</a>
                                <a href="{{ route('deleteReport', $report->id) }}" class="btn btn-danger">Hapus
                                    Laporan</a>
                            </div>
                            @endif
                            @endif
                            @if ($files != null)
                            <p><b>File Lampiran</b></p>
                            @foreach ($files as $file)
                            <p>{{ $no }} . <a href="{{ url('/Upload/FileLampiran/'.$file->file) }}"
                                    target="_BLANK">{{ $file->file }}</a></p>
                            @endforeach
                            @endif
                        </div>
                        <ul class="nav nav-tabs m-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Tindak Lanjut</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="laporanku-tab" data-toggle="tab" href="#laporanku" role="tab"
                                    aria-controls="profile" aria-selected="false">Komentar</a>
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
                                                @if (\App\User::where('id', $action->id_user)->first()->role ==
                                                "User")
                                                <p><b>{{ \App\User::where('id', $action->id_user)->first()->username }}</b>
                                                </p>
                                                @else
                                                <p><b>{{ \App\Model\Instance::where('id_user', $action->id_user)->first()->name }}</b>
                                                </p>
                                                @endif
                                                @if ($action->id_user == Auth::user()->id)
                                                <div class="float-right">
                                                    <a href="{{ route('deleteResponseUser', ['id' => $action->id, 'id_report' => $report->id]) }}"
                                                        style="color:red">Hapus Tanggapan</a>
                                                </div>
                                                @endif

                                                <p>{{ $action->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <form action="{{ action('UserController@response_user') }}" method="POST"
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
                                                            rows="3" name="message"
                                                            placeholder="Berikan Tanggapan/Tindak lanjut ....."
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
                            <div class="tab-pane fade show" id="laporanku" role="tabpanel"
                                aria-labelledby="laporanku-tab">
                                @foreach ($comments as $comment)
                                <div class="card bg-light mb-1 ml-4 mr-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <img class="avatar user-thumb"
                                                    src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                                            </div>
                                            <div class="col-md-11">
                                                <p><b>{{ \App\User::where('id', $comment->id_user)->first()->username }}</b>
                                                </p>
                                                @if ($comment->id_user == Auth::user()->id)
                                                <div class="float-right">
                                                    <a href="{{ route('deleteComment', ['id' => $comment->id, 'id_report' => $report->id]) }}"
                                                        style="color:red">Hapus Komentar</a>
                                                </div>
                                                @endif
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <form action="{{action('UserController@addedReportComment')}}" method="POST"
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
                                                            rows="3" name="comment" placeholder="Komentar Anda ...."
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
        <div class="col-md-4 mt-3">
            <x-card header="BukaLapor">
                <p class="mb-3">Selamat datang diwebsite BukaLapor Lorem ipsum dolor sit amet consectetur,
                    adipisicing
                    elit.
                    Totam debitis vero error repellat deserunt dicta, doloribus dolore similique, magni commodi id
                    facilis
                    reiciendis, eius nostrum? Dolor culpa tenetur corrupti facere. Lorem, ipsum dolor sit amet
                    consectetur
                    adipisicing elit. Soluta harum ut sed fugiat labore, a eius aut velit dolore cumque doloremque
                    voluptatibus quaerat error ex delectus! Molestiae quidem excepturi natus totam rem voluptatum
                    soluta
                    aliquid cupiditate sunt nesciunt nihil debitis sint repellendus, unde cum quia, vel iure
                    blanditiis
                    eaque consequatur? Reiciendis molestiae repudiandae est magni neque? Ipsam qui praesentium,
                    mollitia
                    minima laboriosam dolore dolores quae rerum, nulla reprehenderit esse aspernatur excepturi
                    temporibus?
                    Reprehenderit illo eligendi aliquid distinctio quasi molestias itaque, facere earum culpa, quae
                    id
                    et
                    fugit ex sunt consequuntur laboriosam architecto. Veritatis temporibus fuga nulla nobis veniam,
                    pariatur
                    minima.</p>
            </x-card>
        </div>
    </div>
</div>

@endsection
