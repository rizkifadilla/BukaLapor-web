@extends('layouts.template')
@extends('layouts.templateNavigationList')
@section('activeReportData')
active
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@section('breadcrumbs')
<div class="breadcrumbs-area clearfix">
    <h4 class="page-title pull-left">Data Laporan</h4>
    <ul class="breadcrumbs pull-left">
        {{-- <li><a href="index.html">Home</a></li> --}}
        <li><span>Data</span></li>
    </ul>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 mt-5">
        <x-card header="Data Verifikasi Laporan">
            <div class="data-tables">
                <table id="dataTable" class="text-center">
                    <thead class="bg-light text-capitalize">
                        <tr>
                            <th>Pelapor</th>
                            <th>Judul Laporan</th>
                            <th>Tanggal laporan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr>
                            <td>{{ \App\User::where('id', $report->id_user)->first()->username }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ $report->created_at }}</td>
                            <td><a href="{{ route('reportDetailsInstance', $report->id)}}" class="btn btn-light">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
