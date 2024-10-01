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
                            @if (session('status'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Proses...! </strong> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <div class="card-header">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Data Barang</span></h5>
                                        </td>
                                        <td>
                                            <div align="right">
                                                <a href="{{ url('barang/show')}}" class="btn btn-success btn-sm" role="button" aria-disabled="true">
                                                    <span class="bi bi-printer" style="font-size:16px"> Print Data</span> </a>

                                                <a href="{{ url('barang/create')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-plus-circle" style="font-size:16px"> New</span></a>
                                            </div>

                                    </tr>
                                </table>

                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            <th>Jenis Barang</th>
                                            <th>Nama User</th>
                                            <th>Ubah</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $item)
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$item -> kode_barang}}</td>
                                            <td>{{$item -> nama_barang}}</td>
                                            <td>{{$item -> satuan}}</td>
                                            <td>{{$item -> stok}}</td>
                                            <td>{{$item -> harga_jual}}</td>
                                            <td>{{$item -> jenis_barang}}</td> 
                                            <td>{{$item -> nm_user}}</td> 
                                            
                                            <td><a href="{{ url('barang/' .$item->kode_barang.'/edit')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-pencil-square" style="font-size:12px"></span></a> </td>
                                            <td>
                                                <form action="{{ url('barang/' .$item->kode_barang)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-success btn-sm"><span class="bi bi-trash"></span></button>
                                            </td>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection