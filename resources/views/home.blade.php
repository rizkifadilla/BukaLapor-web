@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeHome')
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
        <x-card header="BukaLapor">
            <p class="mb-3">Selamat datang diwebsite BukaLapor Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Totam debitis vero error repellat deserunt dicta, doloribus dolore similique, magni commodi id facilis
                reiciendis, eius nostrum? Dolor culpa tenetur corrupti facere. Lorem, ipsum dolor sit amet consectetur
                adipisicing elit. Soluta harum ut sed fugiat labore, a eius aut velit dolore cumque doloremque
                voluptatibus quaerat error ex delectus! Molestiae quidem excepturi natus totam rem voluptatum soluta
                aliquid cupiditate sunt nesciunt nihil debitis sint repellendus, unde cum quia, vel iure blanditiis
                eaque consequatur? Reiciendis molestiae repudiandae est magni neque? Ipsam qui praesentium, mollitia
                minima laboriosam dolore dolores quae rerum, nulla reprehenderit esse aspernatur excepturi temporibus?
                Reprehenderit illo eligendi aliquid distinctio quasi molestias itaque, facere earum culpa, quae id et
                fugit ex sunt consequuntur laboriosam architecto. Veritatis temporibus fuga nulla nobis veniam, pariatur
                minima.</p>
        </x-card>
    </div>
</div>
@endsection
