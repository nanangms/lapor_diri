<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Formstatus;

class FormstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterdata.formstatus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Formstatus();
        return view('masterdata.formstatus.form', compact('model'));
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
            'nama_form' => 'required',
            'status' => 'required'
        ]);

        $model = Formstatus::create($request->all());
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
        $model = Formstatus::findOrFail($id);
        return view('masterdata.formstatus.form', compact('model'));
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
            'nama_form' => 'required',
            'status' => 'required'
        ]);

        $model = Formstatus::findOrFail($id);

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
        $model = Formstatus::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Formstatus::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('masterdata.formstatus._action', [
                    'model' => $model,
                    'url_edit' => route('formstatus.edit', $model->id),
                    'url_destroy' => route('formstatus.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
