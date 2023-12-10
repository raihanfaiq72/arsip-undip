@extends($Anggota)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')


<div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">1</div>
            </div>
            <div class="col-md-4 col-sm-2  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Sampah Organik</span>
              <div class="count">1</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Sampah Non-Organik</span>
              <div class="count green">1</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Produk</span>
              <div class="count">1</div>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Form Kerjasama</span>
              <div class="count">2</div>
            </div>
            
          </div>
        </div>
          <!-- /top tiles -->

          
          <br />
        </div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
@endsection