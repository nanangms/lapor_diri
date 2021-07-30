{!! Form::model($model, [
    'route' => $model->exists ? ['kategori_pemenang.update', $model->id] : 'kategori_pemenang.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Nama Kategori</label>
        {!! Form::text('nama_kat_pemenang', null, ['class' => 'form-control', 'id' => 'nama_kat_pemenang']) !!}
    </div>


{!! Form::close() !!}