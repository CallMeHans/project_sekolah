`@extends('main') 
@section('title','Data suplier Barang')
@section('breadcrumbs') 
<main id="main" class="main">  
    <div class="pagetitle"> 
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./kode_barang">Master Data</a></li>
            <li class="breadcrumb-item active">Suplier  Barang</li>
          </ol>
        </nav>
      </div>  
        <section  class="section dashboard">
          <div class="col-12">
            <div class="row">  
                <div class="card top-selling overflow-auto">  
                    <div class="content mt-3">
                        <div class="animated fadeIn">  
                                <div class="card-header"> 
                                <table width="100%"  class="fa fa-text-height" aria-hidden="true"   border="0" cellpadding="0" cellspacing="0"   class="fa fa-align-center" > 
                                 <tr>
                                  <td><h5 class="card-title">Ubah Barang</span></h5></td>
                                  <td> 
                                    <div align="right"><a href="{{ url('./barang')}}" class="btn btn-success btn-sm" >
                                      <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a> 
                                    </div> 
                                  </td> 
                                   </tr>
                                 </table>
                                 <div class="col-12">
                                    <div class="card recent-sales overflow-auto">
                                    <div class="card-body">  
                                      
                                        <form action="{{ url('barang/'.$barang->kode_barang)}}" method="post" enctype="multipart/form-data">
                                            @method('put')
                                          {{ csrf_field() }} 
                                          <p>
                                            <div class="row mb-3">
                                              
                                                <label for="name" class="col-sm-2 col-form-label"> kode barang</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" readonly="true"   value="{{ old('kode_barang',$barang->kode_barang) }}"  name="kode_barang" >
                                                   </div>
                                              </div> 
                
                                              <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">nama barang</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"   value="{{ old('nama_barang',$barang->nama_barang) }}"  name="nama_barang"  required autofocus>
                                                   </div>
                                              </div> 

                                              <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">satuan</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('satuan') is-invalid @enderror"   value="{{ old('satuan',$barang->satuan) }}"  name="satuan"  required autofocus>
                                                   </div>
                                              </div> 

                                              <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">Stok</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('stok') is-invalid @enderror"   value="{{ old('stok',$barang->stok) }}"  name="stok"  required autofocus>
                                                   </div>
                                              </div> 

                                              <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">Harga jual</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('harga_jual') is-invalid @enderror"   value="{{ old('harga_jual',$barang->harga_jual) }}"  name="harga_jual"  required autofocus>
                                                   </div>
                                              </div> 

                                              <div class="row mb-3">
                                                <label for="jenis_barang" class="col-sm-2 col-form-label">Jenis Barang </label>
                                                <div class="col-sm-10">
                                                  <select class ="form-control" id="id_jenis" name="id_jenis">
                                                    <option value="{{old('id_jenis' ,$barang->id_jenis)}}">{{old('id_jenis',$barang->id_jenis)}} -{{old('id_jenis',$barang->jenis_barang)}}</option>
                                                    @foreach ($jenis as $item)
                                                    <option value='{{$item -> id_jenis}}'>{{$item -> id_jenis}} -{{$item -> jenis_barang}}
                                                    </option>
                                                    @endforeach
                                                    </select>
                                                   </div>
                                              </div> 

                                              <div class="row mb-3">
                                                <label for="name" class="col-sm-2 col-form-label">User ID</label>
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control @error('user_id') is-invalid @enderror"   value="{{ old('user_id',$barang->user_id) }}"  name="user_id"  required autofocus>
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
      </section> 
</main> 
@endsection