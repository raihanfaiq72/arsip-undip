@extends($Anggota)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
<style>
    .x_panel {
        margin-bottom: 20px;
        /* Sesuaikan nilai sesuai kebutuhan */
    }

</style>

@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$page}} "{{$surat->jenis}}"</h3>
            </div>
            @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
            @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
            @elseif (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$page}} <small>lampiran yang anda kirim sebelumnya akan terhapus secara default</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{url('ketua/ajukan-masuk/update')}}" method="POST" id="demo-form2"
                            data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$surat->id}}">
                            <input type="hidden" name="status_sekre" value="{{$surat->status_sekre}}">
                            <input type="hidden" name="id_users" value="{{$surat->id_users}}">
                            <input type="hidden" name="lampiran" value="{{$surat->lampiran}}">
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Jenis
                                    Surat
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text" name="jenis"
                                        placeholder="Jenis Surat" value="{{$surat->jenis}}" required>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="formFileMultiple"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Lampiran</label>
                                <div class="col-md-6 col-sm-6">
                                    @if($surat->lampiran)
                                    <p>File saat ini: <a href="{{ asset('/Assets/Admin/Upload/' . $surat->lampiran) }}"
                                            target="_blank">{{ $surat->lampiran }}</a></p>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label for="formFileMultiple"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Download</label>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-primary"><a href="{{ route('ketua.pdf.download', ['id' => $surat->id]) }}">Download</a></button>
                                </div>
                            </div> -->
                            <div class="item form-group">
                                <label for="formFileMultiple" class="col-form-label col-md-3 col-sm-3 label-align">Lampiran</label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="photoInput" class="form-control" type="file" name="lampiran" placeholder="isikan foto produk" required>
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label for="formFileMultiple"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Aksi</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name="status_ketua" id="">
                                        <option value="4">Acc</option>
                                        <option value="5">Tolak</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{url('ketua/ajukan-masuk')}}"><button class="btn btn-danger"
                                            type="button">Kembali</button></a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ini adalah script untuk menampilkan preview photo --}}
<script>
    function previewImage(input) {
        var imagePreview = document.getElementById('imagePreview');
        var photoInput = document.getElementById('photoInput');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    }

</script>

@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
