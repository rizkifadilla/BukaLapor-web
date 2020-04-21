@extends('layouts.templateUser')
@extends('layouts.templateNavigationListUser')
@section('activeHome')
active
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-3">
            <x-card header="Laporkan">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ action('UserController@addedReportData') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Judul Laporan</label>
                                <input class="form-control" type="text" id="example-text-input" name="title" required>
                                <label for="exampleFormControlTextarea1" class="mt-2">Detail Laporan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subtitle"
                                    required></textarea>
                                <label class="col-form-label mt-2">Kategori</label>
                                <select class="custom-select select2" id="provinsiSelect" name="seen" required>
                                    <option selected="selected" disabled>Pilih Kategori</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="example-text-input" class="col-form-label mt-2">Lampiran ( jika tidak
                                    ada
                                    kosongkan )</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            name="lampiran">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-rounded btn-success mb-3 mt-3 float-right"
                                    value="Simpan">
                            </div>
                        </form>
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
