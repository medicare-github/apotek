@extends('layouts.master')

@section('title')
    Daftar Toko
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Toko</li>
@endsection

@push('css')
    <style>
        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }
    </style>
@endpush
@section('content')
    @if (session()->has('error'))
    <div class="row">
        <div class="col-lg-6">
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <strong>Gagal !</strong> {{ session('error') }}.
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-success btn-xs btn-flat" data-toggle="modal"
                        data-target="#exampleModal">
                        <i class="fa fa-plus-circle"></i> Tambah
                    </button>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="5%">No</th>
                            <th>Nama Toko</th>
                            <th>Alamat</th>
                            <th>Daftar Produk</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $val)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $val->nama }}</td>
                                    <td>{{ $val->alamat }}</td>
                                    <td>
                                        <a href="/toko/produk/{{$val->id}}" class="btn btn-xs btn-info btn-flat"> <i
                                                class="fa fa-eye"></i> lihat</a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('toko.destroy',$val->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-xs btn-warning btn-flat" data-toggle="modal"
                                                data-target="#edit-{{$val->id}}" ><i
                                                        class="fa fa-pencil"></i></button>

                                                <button type="submit"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-xs btn-danger btn-flat"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('toko.store') }}" method="post" class="form-horizontal">
                @csrf
                @method('post')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>

                        </div>
                        <div class="form-grou row">
                            <label for="alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                        <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                                class="fa fa-arrow-circle-left"></i> Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach ($data as $val )
    <div class="modal fade " id="edit-{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-{{$val->id}}"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <form action="{{ route('toko.update',$val->id) }}" method="post" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="modal-content ">
                    <div class="modal-header bg-warning">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{$val->nama}}" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>

                        </div>
                        <div class="form-grou row">
                            <label for="alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required>{{$val->alamat}}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i>
                            Simpan</button>
                        <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                                class="fa fa-arrow-circle-left"></i> Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                responsive: true,
            })
        })
    </script>
@endpush
