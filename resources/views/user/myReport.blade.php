@extends('layouts.templateUser')
@extends('layouts.templateNavigationListUser')
@section('activeMyReport')
active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3">
            <x-card header="">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Semua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="laporanku-tab" data-toggle="tab" href="#laporanku" role="tab"
                                    aria-controls="profile" aria-selected="false">LaporanKu</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="tab-afirmasi" data-toggle="tab" href="#afirmasi" role="tab"
                                    aria-controls="afirmasi" aria-selected="false">Afirmasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Pindah Tugas</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="tab-home">
                                @foreach ($allReports as $allReport)

                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('indexReportDetailUser', $allReport->id) }}">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img class="avatar user-thumb"
                                                        src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                                                </div>
                                                <div class="col-md-11">
                                                    <p><b>{{ \App\User::where('id', $allReport->id_user)->first()->username }}</b>
                                                    </p>
                                                    <p>{{ \App\Model\Instance::where('id', $allReport->id_instance)->first()->name }}
                                                    </p>
                                                    <p class="mt-2 mb-1"><b>{{ $allReport->title }}
                                                        @if ($allReport->status == "Done")
                                                        <span class="badge badge-pill badge-success">Selesai</span>
                                                        @endif
                                                    </b></p>
                                                    <p>{{ $allReport->subtitle }}</p>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-11">
                                            <div class="horizontal-menu mt-3">
                                                <nav>
                                                    <ul id="nav_menu">
                                                        <li><i class="far fa-building"></i><span class="mr-3">Tindak
                                                                Lanjut
                                                                {{ \App\Model\ReportAction::where('id_report', $allReport->id)->count() }}</span>
                                                        </li>
                                                        <li><i class="far fa-comments"></i> <span>Komentar
                                                                {{ \App\Model\ReportComment::where('id_report', $allReport->id)->count() }}</span>
                                                        </li>
                                                        <li>
                                                            <div id="supporthtml{{ $allReport->id }}">
                                                                <a href="javascript:void();" class="support"
                                                                    data-id="{{ $allReport->id }}">

                                                                    @if (\App\Model\ReportSupport::where('id_user',
                                                                    Auth::user()->id)->where('id_report',
                                                                    $allReport->id)->first() == null)
                                                                    <i class="far fa-thumbs-up"></i>
                                                                    @else
                                                                    <i class="fas fa-thumbs-up"></i>
                                                                    @endif

                                                                    <span>Dukung
                                                                        {{ \App\Model\ReportSupport::where('id_report', $allReport->id)->count() }}</span>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                            <div class="tab-pane fade show" id="laporanku" role="tabpanel"
                                aria-labelledby="laporanku-tab">
                                @foreach ($myReports as $myReport)
                                <a href="{{ route('indexReportDetailUser', $myReport->id) }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img class="avatar user-thumb"
                                                        src="{{url('assets/images/author/avatar.png')}}" alt="avatar">
                                                </div>
                                                <div class="col-md-11">
                                                    <p><b>{{ \App\User::where('id', $myReport->id_user)->first()->username }}</b>
                                                    </p>
                                                    <p>{{ \App\Model\Instance::where('id', $myReport->id_instance)->first()->name }}
                                                    </p>
                                                    <p class="mt-2 mb-1"><b>{{ $myReport->title }} 
                                                        @if ($myReport->status == "Done")
                                                        <span class="badge badge-pill badge-success">Selesai</span>
                                                        @endif</b></p>
                                                    <p>{{ $myReport->subtitle }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                            </div>
                            </a>
                            {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </x-card>
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
@section('script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.support').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "{{ url('user/support' ) }}" + '/' + id,
                type: "GET",
                dataType: "json",

                success: function (data) {
                    $('#supporthtml' + id).html(
                        '<a href="javascript:void();" class="support" data-id="{{ $allReport->id }}">  <i class="fas fa-thumbs-up"></i> <span>Dukung '+data+'</span> </a>'
                    )
                },
                error: function (data) {
                    console.log(data);
                },
            });

        })
    })

</script>
@endsection
