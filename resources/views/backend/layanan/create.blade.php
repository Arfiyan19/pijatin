@extends('backend.layouts.master')

@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 95%;">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Tambah layanan</h3>
                </div>

                <form method="POST" action="{{ route(Auth::user()->role . '-layanan.store') }}" enctype="multipart/form-data"
                    class="d-inline">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Layanan</label>
                                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan">
                                </div>

                                <div class="form-group">
                                    <label>Harga Layanan</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Durasi Layanan</label>
                                    <input type="text" class="form-control" id="durasi" name="durasi">
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input name="gambar" id="gambar" type="file"
                                        class="form-control dt-post required" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4 text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route(Auth::user()->role . '-layanan.index') }}"
                                    class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <br>
@endsection
