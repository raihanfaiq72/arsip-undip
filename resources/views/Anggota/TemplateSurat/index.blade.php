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
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$page}}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            @forelse($template as $p)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        @if(pathinfo($p['lampiran'], PATHINFO_EXTENSION) === 'pdf')
                                        <img style="width: 100%; display: block;"
                                            src="{{ asset('Assets/Admin/icon/pngwing.com.png') }}" alt="gagal load" />
                                        @elseif(pathinfo($p['lampiran'], PATHINFO_EXTENSION) === 'docx')
                                        <img style="width: 100%; display: block;"
                                            src="{{ asset('Assets/Admin/icon/pngwing.com (1).png') }}"
                                            alt="gagal load" />
                                        @else
                                        <p>hello world</p>
                                        @endif
                                        <div class="mask">
                                            <p>{{ $p->keterangan }}</p>
                                            <div class="tools tools-bottom">
                                                <a
                                                    href="{{ route('anggota.rev-template-surat.download', ['id' => $p->id]) }}"><i
                                                        class="fa fa-download"></i></a>
                                                
                                                </a>
                                                <form id="delete-form"
                                                    action="{{ route('sekretaris.template-surat.destroy', ['id' => $p->id]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fa fa-times"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>{{ $p->keterangan }}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-danger">
                                Data {{ $page }} belum Tersedia silahkan tambah.
                            </div>
                            @endforelse
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
