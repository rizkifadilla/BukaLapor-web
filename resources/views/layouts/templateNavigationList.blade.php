{{-- dropdown
<li class="active">
    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
    <ul class="collapse">
        <li><a href="index.html">ICO dashboard</a></li>
        <li><a href="index2.html">Ecommerce dashboard</a></li>
        <li class="active"><a href="index3.html">SEO dashboard</a></li>
    </ul>
</li>
menu biasa
<li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li> --}}
@section('templateNavigationList')
    <li class="@yield('activeHome')"><a href="home"><i class="fas fa-home"></i> <span>Home</span></a></li>

    @if ( Auth::user()->role == 'Admin' )
        <li class="@yield('activeAddInstance')"><a href="{{ route('indexAddedInstance') }}"><i class="fas fa-user-plus"></i> <span>Tambah Instansi</span></a></li>
        <li class="@yield('activeReportVerification')"><a href="{{ route('indexReportVerification') }}"><i class="far fa-check-square"></i> <span>Verifikasi Laporan</span></a></li>

    @elseif( Auth::user()->role == 'Instance' )
        <li class="@yield('activeIntanceData')"><a href="{{ route('indexInstanceData') }}"><i class="far fa-building"></i> <span>Data Instansi</span></a></li>
        <li class="@yield('activeReportData')"><a href="{{ route('indexReportData') }}"><i class="far fa-file-alt"></i> <span>Laporan</span></a></li>
        <li class="@yield('activeReportDone')"><a href="{{ route('indexReportDone') }}"><i class="far fa-file-alt"></i> <span>Laporan Selesai</span></a></li>

    {{-- @elseif( Auth::user()->role == 'User' )
        <li class="@yield('activeReportForm')"><a href="{{ route('indexReportForm') }}"><i class="ti-map-alt"></i> <span>Laporkan</span></a></li> --}}

    @endif
@endsection