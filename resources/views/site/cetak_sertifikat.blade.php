@extends('layoutsite.master')

@section('title')
Sertifikat Gowes Virtual
@endsection

@section('content2')
<div class="row">
    <div class="col-md-12">
        <div class="row">
        	<div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 align="center">Sertifikat Gowes Virtual</h2>
                        <hr>
                        <!-- <div class="alert alert-danger">
                            <h1 align="center" style="color: white"><i class="fa fa-warning"></i> PENDAFTARAN DITUTUP !</h1>
                        </div> -->
                        @if(session('gagal'))
                          <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-warning"></i> {{session('gagal')}}
                          </div>
                        @endif
                        <span class="text-info"><b>Langkah-langkah Mendapatkan sertifikat Gowes Virtual Merdeka 75: </b><br>1. Masukan No.Peserta yang didapat pada saat mendaftar <br>
                           2. Klik Tombol Download Sertifikat, maka sertifikat akan langsung tersimpan dalam bentuk format PDF
                        </span>
                        <br><br>
                        <form action="/download-sertifikat" method="GET">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">No. Peserta</label>
                                <div class="col-md-6 col-xs-12 text-center">
                                    <input type="text" class="form-control" name="no_peserta" id="no_peserta" required/>
                                    <button class="btn btn-primary" id="cek_nik" type="submit"><i class="fa fa-download"></i> Download Sertifikat</button>
                                </div>
                            </div>
                        </div>
                        </form>    
		              <hr>

                	</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">	
                		<div class="owl-carousel" id="owl-example">
                            @foreach($banner as $ban)
                            <div>                       
                                <a class="gallery-item" href="{{asset('images/slide/'.$ban->gambar)}}" title="{{$ban->nama_banner}}" data-gallery>
                                    <div class="image">                              
                                        <img src="{{asset('images/slide/'.$ban->gambar)}}" class="img img-responsive" width="100%" alt="Info 1"/>
                                    </div>
                                </a>
                            </div>
                            @endforeach

	                   </div>
                    </div>
                </div> 

                <!-- <div class="panel panel-default">
                    <div class="panel-body">    
                        
                            <h4 align="center">Upload Hasil Gowesmu Disini</h4>
                            <hr>
                            <p align="center"><a href="/kirim-hasil-gowes" class="btn btn-success"><i class="fa fa-upload"></i> Upload Hasil Gowes</a></p>

                       
                    </div>
                </div>   
                <hr>    -->

            </div>
           
        </div>
    </div>
</div>
 <!-- BLUEIMP GALLERY -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>      
<!-- END BLUEIMP GALLERY -->
@endsection

@section('footer2')

<script type="text/javascript" src="{{asset('frontend/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/plugins/owl/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/plugins/bootstrap/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/plugins/dropzone/dropzone.min.js')}}"></script>

<script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                var link = target.src ? target.parentNode : target;
                var options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }};
                var links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
        </script> 
@endsection