@extends('backend.layouts.master')

@section('main-content')
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 95%;">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit layanan</h3>
                </div>

                <form method="post" action="{{ route(Auth::user()->role . '-layanan.update', $layanan->id) }}"
                    enctype="multipart/form-data" class="d-inline">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Layanan</label>
                                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                        value="{{ $layanan->nama_layanan }}">
                                </div>

                                <div class="form-group">
                                    <label>Harga Layanan</label>
                                    <input type="text" class="form-control" id="harga" name="harga"
                                        value="{{ $layanan->harga }}">
                                </div>
                                <div class="form-group">
                                    <label>Durasi Layanan</label>
                                    <input type="text" class="form-control" id="durasi" name="durasi"
                                        value="{{ $layanan->durasi }}">
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input name="gambar" id="gambar" type="file"
                                        class="form-control dt-post required" accept="image/*">
                                    <br>
                                    <img id="gambar-preview" src="{{ asset('storage/' . $layanan->gambar) }}" alt="Preview"
                                        style="max-width: 100%; max-height: 150px;">
                                </div>
                            </div>
                            {{-- preview gambar --}}


                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi">{{ $layanan->deskripsi }}</textarea>
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
@push('scripts')
    <script>
        document.getElementById('gambar').addEventListener('change', function(event) {
            const preview = document.getElementById('gambar-preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        });
    </script>
@endpush
