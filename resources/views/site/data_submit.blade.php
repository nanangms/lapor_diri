@extends('layoutsite.master')

@section('title')
Data Submit Peserta Gowes
@endsection

@section('content2')
<div class="row">
    <div class="col-md-12">
        <div class="row">
        	<div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2 align="center">Data Peserta Gowes yang telah mengirimkan hasil Gowes</h2>
                        <i>* Jika Status "Terpenuhi" / "Tidak Terpenuhi" maka data anda sudah di verifikasi Panitia</i>
                        <hr>
                        
                        <table class="table table-hover table-striped" id="table_id" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Kota/Kabupaten</th>
                                    <th>Jarak yg Ditempuh</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                        </table>

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
                <div class="panel panel-default">
                    <div class="panel-body">    
                        
                            <h4 align="center">Upload Hasil Gowesmu Disini</h4>
                            <hr>
                            <p align="center"><a href="/kirim-hasil-gowes" class="btn btn-success"><i class="fa fa-upload"></i> Upload Hasil Gowes</a></p>

                       
                    </div>
                </div>   
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
        <script>
    $('#table_id').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.datahasil') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'kategori', name: 'kategori'},
            {data: 'kota', name: 'kota'},
            {data: 'jarak_tempuh', name: 'jarak_tempuh'},
            {data: 'status', name: 'status'}
        ]
    });
</script>
@endsection