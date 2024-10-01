@extends('main')
@section('title','Data Pembelian')
@section('breadcrumbs')
<main id="main" class="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./pembelian">Master Data</a></li>
                <li class="breadcrumb-item active">Data Pembelian</li>
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
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="card-header">
                                <table width="100%" class="fa fa-text-height" aria-hidden="true" border="0" cellpadding="0" cellspacing="0" class="fa fa-align-center">
                                    <tr>
                                        <td>
                                            <h5 class="card-title">Tambah Data Pembelian Barang</span></h5>
                                        </td>
                                        <td>
                                            <div align="right"><a href="{{ url('./Pembelian')}}" class="btn btn-success btn-sm">
                                                    <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="col-12">
                                    <div class="card recent-sales overflow-auto">
                                        <div class="card-body">

                                            <form action="{{ url('Pembelian/'.$Pembelian->nofak_beli)}}" method="post" enctype="multipart/form-data">
                                                @method('put')
                                                {{ csrf_field() }}
                                                <p>
                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Nofak Beli</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('nofak_beli') is-invalid @enderror" readonly value="{{ old('nofak_beli',$Pembelian->nofak_beli) }}" name="nofak_beli" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Tanggal Beli</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" value="{{ old('tgl_beli',$Pembelian->tgl_beli) }}" name="tgl_beli" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                                    <div class="col-sm-10">
                                                    <select class="form-control" id="kode_barang" name="kode_barang">
                                                        <option value="{{old('kode_barang', $Pembelian->kode_barang)}}">{{old('kode_barang',$Pembelian->kode_barang)}} -{{old('kode_barang',$Pembelian->nama_barang)}}</option>
                                                            @foreach($barang as $item)
                                                            <option value="{{$item -> kode_barang}}">{{$item -> kode_barang}} -{{$item -> nama_barang}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Jumlah Beli</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('jumlah_beli') is-invalid @enderror" value="{{ old('jumlah_beli',$Pembelian->jumlah_beli) }}" name="jumlah_beli" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Harga Beli</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" value="{{ old('harga_beli',$Pembelian->harga_beli) }}" name="harga_beli" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">Harga Jual</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" value="{{ old('harga_jual',$Pembelian->harga_jual) }}" name="harga_jual" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-2 col-form-label">User Id</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id',$Pembelian->user_id) }}" name="user_id" required autofocus>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="name_sup" class="col-sm-2 col-form-label">Id Suplier</label>
                                                    <div class="col-sm-10">
                                                    <select class="form-control" id="id_suplier" name="id_suplier">
                                                        <option value="{{old('id_suplier', $Pembelian->id_suplier)}}">{{old('id_suplier',$Pembelian->id_suplier)}} -{{old('id_suplier',$Pembelian->nama_suplier)}}</option>
                                                            @foreach($suplier as $item)
                                                            <option value="{{$item -> id_suplier}}">{{$item -> id_suplier}} -{{$item -> nama_suplier}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-success" style="font-size:16px"><span class="bi bi-save2 green-color"> Update </span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection