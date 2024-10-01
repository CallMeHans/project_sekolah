@extends('main')
@section('title','Barang')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./barang">Master Data</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="col-12">
            <div class="row">
                <div class="card top-selling overflow-auto">
                    <div class="content mt-3">
                        <div class="animated fadeIn">

                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Pembelian Barang</h5>

                                        <!-- Horizontal Form -->
                                        <form action="{{ url('datapembelian')}}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row mb-3">
                                                <label for="tgbeli" class="col-sm-2 col-form-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="tgbeli" name="tgbeli">
                                                        <option value=''>
                                                        <option>
                                                            @for ($i = 1; $i <= 31; $i++)
                                                                <option value='{{ $i }}'>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="bulan" class="col-sm-2 col-form-label">Bulan :</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="bulan_beli" name="bulan_beli">
                                                        <option value=''>
                                                        <option>
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <option value='{{ $i }}'>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="tahun" class="col-sm-2 col-form-label">Tahun :</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="tahun" name="tahun">
                                                        <option value=''>
                                                        <option>
                                                            @for ($i = 2024; $i <= 2030; $i++)
                                                                <option value='{{ $i }}'>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" id="cetak" name="cetak" class="btn btn-primary">Cetak Data</button>
                                                <button type="reset" class="btn btn-secondary">Clear</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
</main>
@endsection