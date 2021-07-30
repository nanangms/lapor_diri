@extends('layouts.master')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>                    
    <li><a href="#">Tables</a></li>
    <li class="active">Data Tables</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">                    
    <h2>Data Koperasi</h2>
</div>
<!-- END PAGE TITLE -->                

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                

    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                <div class="form-group">
                        <select name="filter_gender" id="filter_gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="filter_country" id="filter_country" class="form-control" required>
                            <option value="">Select Country</option>
                            @foreach($country_name as $country)

                            <option value="{{ $country->Country }}">{{ $country->Country }}</option>

                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
            
                </div>
                <div class="panel-body">
                <table id="customer_data" class="table">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postal Code</th>
                            <th>Country</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->

            

        </div>
    </div>                                
    
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{asset('admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_gender = '', filter_country = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('customsearch.index') }}",
                data:{filter_gender:filter_gender, filter_country:filter_country}
            },
            columns: [
                {
                    data:'CustomerName',
                    name:'CustomerName'
                },
                {
                    data:'Gender',
                    name:'Gender'
                },
                {
                    data:'Address',
                    name:'Address'
                },
                {
                    data:'City',
                    name:'City'
                },
                {
                    data:'PostalCode',
                    name:'PostalCode'
                },
                {
                    data:'Country',
                    name:'Country'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_gender = $('#filter_gender').val();
        var filter_country = $('#filter_country').val();

        if(filter_gender != '' &&  filter_gender != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_gender, filter_country);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_country').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});
</script>
@stop