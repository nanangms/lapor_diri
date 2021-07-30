@extends('layouts.master')

@section('title')
Manajemen User
@endsection
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('ad/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Manajemen User</li>
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
          <h3 class="card-title">Data User</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            
          </div>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah</button><hr class="invisible">
                        <table class="table table-hover table-bordered" id="table_id" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                        </table>
        </div>
      </div>
  </section>
</div>

@include('user.tambah')


<div id="ShowEDIT" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="modal-body">

                <div class="isi"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->   


@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('ad/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('ad/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>


<script>
    $('#table_id').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.users') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'username', name: 'username'},
            {data: 'role', name: 'role'},
            {data: 'aktif', name: 'aktif'},
            {data: 'action', name: 'action'}
        ]
    });

    $('body').on('click', '.hapus', function (event) {
    event.preventDefault();

    var user_name = $(this).attr('user-name'),
        title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
        user_id = $(this).attr('user-id');
    swal({
                title: "Anda Yakin?",
                text: "Mau Menghapus Data : "+ title +"?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
    .then((result) => {
        if (result) {
            $.ajax({
                url: "/user/"+user_id+"/delete",

                success: function (response) {
                    $('#table_id').DataTable().ajax.reload();
                    swal("Berhasil", "Data Berhasil Dihapus", "success");
                },
                error: function (xhr) {
                    swal("Oops...", "Terjadi Kesalahan", "error");
                    
                }
            });
        }
    });
});
</script>
<script>
    $(document).ready(function(){
        $("#ShowEDIT").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');

            $.ajax({
                url: "/user" +'/' + id +'/edit',
                dataType: 'html',
                success: function (response) {
                    $('.isi').html(response);
                }
            });

        });
    });    
    
</script>
    <script>
        
        $('#modal-btn-save').click(function (event) {
        event.preventDefault();
        $('#modal-btn-save').text('Menyimpan data...'); //change button text
        $('#modal-btn-save').attr('disabled',true); //set button disable
        var form = $('#modal-body form'),
            url = form.attr('action');
            //method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

         form.find('.text-danger').remove();
         form.find('.form-group').removeClass('has-error');

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                form.trigger('reset');
                $('#Tambah').modal('hide');
                $('#table_id').DataTable().ajax.reload();

                swal("Berhasil", "Data Berhasil Disimpan", "success");
                //$('#nameError').removeClass('d-none');
            },
            // error: function (data) {
            //         $('#nameError').addClass('d-none');
            //         // $('#editLastnameError').addClass('d-none');
            //         // $('#editBirthdateError').addClass('d-none');
            //         // $('#editStatusError').addClass('d-none');
            //         // $('#editCvError').addClass('d-none');
            //         var errors = data.responseJSON;
            //         if($.isEmptyObject(errors) == false) {
            //             $.each(errors.errors,function (key, value) {
            //                 var ErrorID = '#' + key +'Error';
            //                 $(ErrorID).removeClass("d-none");
            //                 $(ErrorID).text(value).addClass('has-error')
            //             })
            //         }
            //     }

            error: function (err) {
                if (err.status == 422){
                    console.log(err.responseJSON);

                    console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="text-danger">'+error[0]+'</span>'));
                    });
                }
                $('#modal-btn-save').removeAttr('disabled').text('Simpan');
            }


            // error: function (xhr){
            //     var res = xhr.responseJSON;
            //     if ($.isEmptyObject(res) == false){
            //         $.each(res.errors, function(key,value){
            //             $('#' + key)
            //                 .closest('.form-group')
            //                 .addClass('has-error')
            //                 .append('<span class="text-danger">' + value + '</span>');
            //         });

            //     }
            // }
        })
    });
        
    </script>
@stop