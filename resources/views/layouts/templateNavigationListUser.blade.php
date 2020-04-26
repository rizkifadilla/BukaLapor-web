@section('templateNavigationListUser')
{{-- <li>
    <a href="javascript:void(0)"><i class="ti-dashboard"></i><span>dashboard</span></a>
    <ul class="submenu">
        <li><a href="index.html">ICO dashboard</a></li>
        <li><a href="index2.html">Ecommerce dashboard</a></li>
        <li><a href="index3.html">SEO dashboard</a></li>
    </ul>
</li> --}}
<li class="@yield('activeLaporan')"><a href="{{ route('indexMyReport') }}"><i class="far fa-file-alt"></i> <span>Laporan</span></li>
<li class="@yield('activeTentang')"><a href="#"><i class="ti-map-alt"></i> <span>Tentang BukaLapor</span></a></li>

@endsection