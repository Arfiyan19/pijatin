@extends('backend.layouts.master')
@section('main-content')
<!-- //messege  -->
<!-- if messege status == success -->

<div class="card">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <!-- if messege status == error -->
    @if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <h5 class="card-header">superadmin</h5>
    <div class="card-body">
        <form method="post" action="{{ url('superadmin/updateProfil', $data->id) }}" enctype="multipart/form-data">
            @csrf
            {{-- @method('PATCH') --}}

            <div class="form-group">
                <label for="inputPhoto" class="col-form-label">Foto <span class="text-danger">*</span></label>
                <div class="input-group" style="margin-bottom: 10px;">
                    <a href="#" id="foto" data-toggle="modal" data-target="#exampleModal">
                        <img src="{{ asset('storage/foto/'.$data->superadmin->foto) }}" width="100px" height="100px" alt="foto" id="holder">
                    </a>
                </div>
                <div class="input-group">
                    <input id="photo" class="form-control" type="file" name="foto" value="{{ $data->superadmin->foto }}">
                </div>

                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- nama  -->
            <div class="form-group">
                <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" required value="{{ $data->superadmin->nama }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- //nik  -->
            <div class="form-group">
                <label for="nik" class="col-form-label">NIK <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nik" required value="{{ $data->superadmin->nik }}">
                @error('nik')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- foto ktp  -->
            <div class="form-group">
                <label for="foto_ktp" class="col-form-label">Foto KTP <span class="text-danger">*</span></label>
                <div class="input-group" style="margin-bottom: 10px;">
                    <a href="#" id="foto" data-toggle="modal" data-target="#modal2">
                        <img src="{{ asset('storage/foto_ktp/'.$data->superadmin->foto_ktp) }}" width="100px" height="100px" alt="foto_ktp" id="holder">
                    </a>
                </div>
                <div class="input-group">
                    <input id="photo" class="form-control" type="file" name="foto_ktp" value="{{ $data->superadmin->foto_ktp }}">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                @error('foto_ktp')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- jenis kelamin select option  -->
            <div class="form-group">
                <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" @if ($data->superadmin->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if ($data->superadmin->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- no_hp -->
            <div class="form-group">
                <label for="no_hp" class="col-form-label">No HP <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="no_hp" required value="{{ $data->superadmin->no_hp }}">
                @error('no_hp')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- status  -->
            <div class="form-group">
                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="status" required value="{{ $data->superadmin->status }}">
                @error('status')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- tanggal lahir  -->
            <div class="form-group">
                <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="tanggal_lahir" required value="{{ $data->superadmin->tanggal_lahir }}">
                @error('tanggal_lahir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>



            <!-- tempat lahir  -->
            <div class="form-group">
                <label for="tempat_lahir" class="col-form-label">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="tempat_lahir" required value="{{ $data->superadmin->tempat_lahir }}">
                @error('tempat_lahir')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>




            <!-- email  -->

            <!-- alamat  -->
            <div class="form-group">
                <label for="alamat" class="col-form-label">Alamat <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="alamat" required value="{{ $data->superadmin->alamat }}">
                @error('alamat')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- ktp  -->

            <div class="form-group mb-3">
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Foto {{ $data->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/foto/'.$data->superadmin->foto) }}" class="img-fluid" alt="foto" id="holder">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Foto KTP
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/foto_ktp/'.$data->superadmin->ktp) }}" class="img-fluid" alt="foto" id="holder">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>



@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');
    $('#lfm1').filemanager('image');
    $(document).ready(function() {
        $('#summary').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });

    $(document).ready(function() {
        $('#quote').summernote({
            placeholder: "Write short Quote.....",
            tabsize: 2,
            height: 100
        });
    });
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: "Write detail description.....",
            tabsize: 2,
            height: 150
        });
    });

    // foto onclick tampikan modal dan foto 
    $(document).ready(function() {
        $('#foto').click(function() {
            var foto = $('#holder').attr('src');
        });
    });
</script>
@endpush