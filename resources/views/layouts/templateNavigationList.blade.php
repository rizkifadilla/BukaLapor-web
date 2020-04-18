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
<li class="@yield('active')"><a href="#"><i class="ti-map-alt"></i> <span>Home</span></a></li>
@endsection