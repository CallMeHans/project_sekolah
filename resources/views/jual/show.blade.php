@extends('main') 
@section('title','Data Barang')
@section('breadcrumbs') 

<main id="main" class="main">  
  <div class="pagetitle"> 
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./penjualan">Master Data</a></li>
          <li class="breadcrumb-item active">Data Barang </li>
        </ol>
      </nav>
    </div>  
 
<head>
<script type="text/javascript">
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;
        }
        printDiv('printableArea');
    </script>
</head>
<table width="100%"  class="fa fa-text-height" aria-hidden="true"   border="0" cellpadding="0" cellspacing="0"   class="fa fa-align-center" > 
  <tr   align="right"> 
    <td> 
    <a href="#" onclick="printDiv('printableArea')" class="btn btn-success btn-sm">  
      <span class="bi bi-printer" style="font-size:16px"> Print Data</span> </a> 
     <a href="{{ url('./penjualan')}}" class="btn btn-success btn-sm" >
       <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a>  
    </td> 
    </tr>
  </table>
 
      

<div id="printableArea">
        <td align="center">
          <h5 class="card-title" align="center">Daftar Barang </h5>
        </td>
        <table width="100%" border="1" cellpadding="0" cellspacing="0"> 
                <thead>
                    <tr  bgcolor="gray">
                        <th>No</th>
                                                  <th>Nofak Jual </th> 
                                                  <th>Tanggal Jual </th> 
                                                  <th>Nama Barang </th> 
                                                  <th>Jumlah Jual </th> 
                                                  <th>Harga jual </th> 
                                                  <th>User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach ($penjualan as $item)
                    <tr>
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$item -> nofak_jual}}</td> 
                    <td>{{$item -> tgl_jual}}</td>  
                    <td>{{$item -> nama_barang}}</td> 
                    <td>{{$item -> jumlah_jual}}</td>
                    <td>{{$item -> harga_jual}}</td>
                    <td>{{$item -> nama_suplier}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>