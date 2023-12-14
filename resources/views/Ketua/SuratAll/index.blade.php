@extends($Anggota)

@section('css-library')
{{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
{{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
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
            <div class="title_left">
                <h3>{{$page}}</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-checkbox"
                                        class="table table-striped table-bordered bulk_action" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis</th>
                                                <th>Lampiran</th>
                                                <th>status sekre</th>
                                                <th>status ketua</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @forelse($surat as $p)
                                            <tr style="{{ ($p->status_ketua == 4) ? 'background-color: #99ff99;' : (($p->status_sekre == 2 || $p->status_ketua == 5) ? 'background-color: #ff9999;' : '') }}">
                                            <td>{{$loop->iteration}}</td>
                                                <td>{{$p->jenis}}</td>
                                                <td>{{$p->lampiran}}</td>
                                                <td style="{{ ($p->status_sekre == 2) ? 'color: #ff0000;' : '' }}">
                                                    @if($p->status_sekre == 0)
                                                    Sedang diajukan
                                                    @elseif($p->status_sekre == 1)
                                                    Acc sekre
                                                    @elseif($p->status_sekre == 2)
                                                    Ditolak sekre
                                                    @endif
                                                </td>
                                                <td style="{{ ($p->status_ketua == 5) ? 'color: #ff0000;' : '' }}">
                                                    @if($p->status_ketua == 3)
                                                    Sedang diajukan
                                                    @elseif($p->status_ketua == 4)
                                                    Acc ketua
                                                    @elseif($p->status_ketua == 5)
                                                    Ditolak ketua
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($p->status_sekre != 2 && $p->status_ketua != 5)
                                                    <a href="{{url('ketua/ajukan-masuk/'.$p->id)}}/edit">Aksi</a>
                                                    | <a href="{{url('ketua/PDF/'.$p->id,[])}}" target="__blank">show</a> | delete
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <div class="alert alert-danger">
                                                Data {{$page}} belum Tersedia silahkan tambah.
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

@section('js-library')
{{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection
