<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Kelurahan;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterdata.kelurahan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kelurahan();
        return view('masterdata.kelurahan.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kecamatan_id' => 'required',
            'nama_kelurahan' => 'required'
        ]);

        $model = Kelurahan::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Kelurahan::findOrFail($id);
        return view('masterdata.kelurahan.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kecamatan_id' => 'required',
            'nama_kelurahan' => 'required'
        ]);

        $model = Kelurahan::findOrFail($id);

        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kelurahan::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Kelurahan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('masterdata.kelurahan._action', [
                    'model' => $model,
                    'url_edit' => route('kelurahan.edit', $model->id),
                    'url_destroy' => route('kelurahan.destroy', $model->id)
                ]);
            })
            ->addColumn('kecamatan',function($model){
            return $model->kecamatan->nama_kecamatan;
            })
            ->addIndexColumn()
            ->rawColumns(['action','kecamatan'])
            ->make(true);
    }
}
