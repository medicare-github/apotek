@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-body text-center">
                    <h1><strong>Selamat Datang Saudara {{$user->name}}</strong></h1>
                    <h2>Anda login sebagai <strong>KASIR {{$user->toko->nama}}</strong></h2>
                    <p><i>Lokasi : {{$user->toko->alamat}}</i></p>
                    {{-- <br><br>

                        <br><br><br> --}}
                    <a href="{{ route('transaksi.baru') }}" class="btn btn-success btn-lg"><i class="fa fa-cart-arrow-down"></i> Transaksi Baru</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">List Produk</span>
                    <span class="info-box-number">{{countProduk($user->toko->id)}} Produk</span>
                    <a href="/toko/produk/{{$user->toko->id}}" class="btn btn-xs btn-primary">lihat <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-opencart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Histori Penjualan</span>
                    <span class="info-box-number">{{countPenjualan($user->toko->id)}} Transaksi</span>
                    <a href="/toko/penjualan/{{$user->toko->id}}" class="btn btn-xs btn-warning">lihat <i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
