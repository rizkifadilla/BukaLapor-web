@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeIntanceData')
active
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Data Instansi</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><span>Data</span></li>
    </ul>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        @if ($instance == null)
        <x-card header="Form Tambah Instansi">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ action('InstanceController@addedInstanceData') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nama Instansi</label>
                            <input class="form-control" type="text" id="example-text-input" name="name" required>
                            <label class="col-form-label mt-2">Tipe Instansi</label>
                            <select class="custom-select select2" name="instanceType" required>
                                <option selected="selected" disabled>Pilih Tipe Instansi</option>
                                @foreach ($InstanceTypes as $InstanceType)
                                <option value="{{ $InstanceType->id }}">{{ $InstanceType->name }}</option>
                                @endforeach
                            </select>
                            <label class="col-form-label mt-2">Tipe Layanan</label>
                            <select class="custom-select select2" name="instanceService" required>
                                <option selected="selected" disabled>Pilih Tipe Layanan</option>
                                @foreach ($InstanceServices as $InstanceService)
                                <option value="{{ $InstanceService->id }}">{{ $InstanceService->name }}</option>
                                @endforeach
                            </select>
                            <label class="col-form-label mt-2">Provinsi</label>
                            <select class="custom-select select2" id="provinsiSelect" name="province" required>
                                <option selected="selected" disabled>Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <label class="col-form-label mt-2">Kota/Kabupaten</label>
                            <select class="custom-select" id="districtSelect" name="district" required>
                                <option selected="selected" disabled>Pilih Kota/Kabupaten</option>
                                <option>Silahkan isi provinsi</option>
                            </select>
                            <label class="col-form-label mt-2">Kecamatan</label>
                            <select class="custom-select" id="subDistrictSelect" name="subDistrict" required>
                                <option selected="selected" disabled>Pilih Kecamatan</option>
                                <option>Silahkan isi Kota/Kabupaten</option>
                            </select>
                            <label for="example-text-input" class="col-form-label mt-2">Alamat</label>
                            <input class="form-control" type="text" id="example-text-input" name="address" required>
                            <input type="submit" class="btn btn-rounded btn-success mb-3 mt-3 float-right"
                                value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </x-card>
        @else
        <x-card header="Data Instansi">
            <div class="row mb-3">
                <div class="col-md-5">Nama Perusahaan</div>
                <div class="col-md-7">: {{ $instance->name }}</div>
                <div class="col-md-5 mt-2">Tipe Perusahaan</div>
                <div class="col-md-7">: {{ \App\Model\InstanceType::where('id', $instance->id_intance_type)->first()->name }}</div>
                <div class="col-md-5 mt-2">Layanan Perusahaan</div>
                <div class="col-md-7">: {{ \App\Model\InstanceService::where('id', $instance->id_intance_service)->first()->name }}</div>
                <div class="col-md-5 mt-2">Provinsi Perusahaan</div>
                <div class="col-md-7">: {{ \App\Model\Master\Zone\Province::where('id',$instance->id_province)->first()->name }}</div>
                <div class="col-md-5 mt-2">Kota atau Kabupaten Perusahaan</div>
                <div class="col-md-7">: {{ \App\Model\Master\Zone\District::where('id', $instance->id_district)->first()->name }}</div>
                <div class="col-md-5 mt-2">Kecamatan Perusahaan</div>
                <div class="col-md-7">: {{ \App\Model\Master\Zone\Subdistrict::where('id',$instance->id_subdistrict)->first()->name }}</div>
                <div class="col-md-5 mt-2">Alamat</div>
                <div class="col-md-7">: {{ $instance->address }}</div>
            </div>
        </x-card>
        @endif
    </div>
</div>
@endsection

@section('script')
<script src="{{url('assets/js/select2.full.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#provinsiSelect').change(function () {
            var e = document.getElementById("provinsiSelect");
            var id = e.options[e.selectedIndex].value;
            $('#kabupatenSelect').html(
                "<option>Mohon Tunggu ....</option>");
            $.ajax({
                url: "{{ url('district') }}" + '/' + id,
                type: "GET",
                dataType: "json",

                success: function (data) {
                    $('#districtSelect').html(
                        "<option>-- Pilih Kota/Kabupaten --</option>");
                    var select = document.getElementById("districtSelect");
                    for (var i = 0; i < data.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = data[i].id;
                        opt.innerHTML = data[i].name;
                        select.appendChild(opt);
                    }
                },
                error: function (data) {
                    console.log(data);
                },
            });
        });
        $('#districtSelect').change(function () {
            var e = document.getElementById("districtSelect");
            var id = e.options[e.selectedIndex].value;
            var e2 = document.getElementById("provinsiSelect");
            var id2 = e2.options[e2.selectedIndex].value;
            $('#subDistrictSelect').html(
                "<option>Mohon Tunggu ....</option>");
            $.ajax({
                url: "{{ url('subDistrict') }}" + '/' + id2 + '/' + id,
                type: "GET",
                dataType: "json",

                success: function (data) {
                    $('#subDistrictSelect').html(
                        "<option>-- Pilih Kecamatan --</option>");
                    var select = document.getElementById("subDistrictSelect");
                    for (var i = 0; i < data.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = data[i].id;
                        opt.innerHTML = data[i].name;
                        select.appendChild(opt);
                    }
                },
                error: function (data) {
                    console.log(data);
                },
            });
        });
    })

</script>
@endsection
