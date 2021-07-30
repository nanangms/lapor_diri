{!! Form::model($model, [
    'route' => $model->exists ? ['kelurahan.update', $model->id] : 'kelurahan.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Kecamatan</label>
        <select name="kecamatan_id" id="kecamatan_id" class="form-control select">
            <option value="">--Pilih--</option>
            <?php $kec = \App\Kecamatan::all(); ?>
            @foreach($kec as $list)
            <option value="{{$list->id}}" @if($list->id == $model->kecamatan_id) selected @endif>{{$list->nama_kecamatan}}</option>
            @endforeach
        </select>
       
    </div>

    <div class="form-group">
        <label for="" class="control-label">Nama Kelurahan</label>
        {!! Form::text('nama_kelurahan', null, ['class' => 'form-control', 'id' => 'nama_kelurahan']) !!}
    </div>


{!! Form::close() !!}