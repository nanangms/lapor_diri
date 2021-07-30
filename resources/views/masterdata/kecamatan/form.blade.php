{!! Form::model($model, [
    'route' => $model->exists ? ['kecamatan.update', $model->id] : 'kecamatan.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Nama Kecamatan</label>
        {!! Form::text('nama_kecamatan', null, ['class' => 'form-control', 'id' => 'nama_kecamatan']) !!}
    </div>


{!! Form::close() !!}