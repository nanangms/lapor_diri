@extends('layouts.master')

@section('title')
Data Pemenang
@endsection
@section('header')

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pemenang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Pemenang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pemenang</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
          <div class="row">

            @foreach($kategori as $k)
            <div class="col-12 col-sm-6 col-md-3">
              <a href="/pemenang/{{$k->id}}">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-flag"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">{{$k->nama_kat_pemenang}}</span>
                  <span class="info-box-number">
                    {{pemenang($k->id)}}
                    
                  </span>
                </div>
              </div>
              </a>
            </div>
            @endforeach

          </div>
        </div>
      </div>
  </section>
</div>



@include('layouts._modal')
@endsection
@section('footer')

    
@stop