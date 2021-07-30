{!! Form::model($model, [
    'route' => $model->exists ? ['formstatus.update', $model->id] : 'formstatus.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <label for="" class="control-label">Nama Form</label>
        {!! Form::text('nama_form', null, ['class' => 'form-control', 'id' => 'nama_form']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">Status</label>
        <select name="status" id="status" class="form-control select">
            <option value="">--Pilih--</option>
            <option value="Aktif" @if($model->status == 'Aktif') selected @endif>Aktif</option>
            <option value="Non Aktif" @if($model->status == 'Non Aktif') selected @endif>Non Aktif</option>
        </select>
       
    </div>

    


{!! Form::close() !!}