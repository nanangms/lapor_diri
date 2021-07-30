{!! Form::model($model, [
    'route' => $model->exists ? ['tempat_test.update', $model->id] : 'tempat_test.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Nama Tempat Test</label>
        {!! Form::text('nama_tempat', null, ['class' => 'form-control', 'id' => 'nama_tempat']) !!}
    </div>


{!! Form::close() !!}