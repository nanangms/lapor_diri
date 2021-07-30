

@extends('layouts.master')

@section('title')
Koperasi | Dashboard
@endsection

@section('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                <div class="row">
                    <div class="col-md-12">

                        <div class="error-container">
                            <div class="error-code">404</div>
                            <div class="error-text">page not found</div>
                            <div class="error-subtext">Anda Tidak Punya Akses Kehalaman Ini</div>
                            <div class="error-actions">                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-info btn-block btn-lg" onClick="history.back();">Kembali</button>
                                    </div>
                                    
                                </div>                                
                            </div>
                            
                        </div>

                    </div>
                </div>
                
                                                                    
            </div>                
            <!-- END PAGE CONTENT WRAPPER -->
            @endsection