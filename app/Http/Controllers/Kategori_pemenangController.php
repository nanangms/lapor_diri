<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Kategori_pemenang;

class Kategori_pemenangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterdata.kategori_pemenang.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kategori_pemenang();
        return view('masterdata.kategori_pemenang.form', compact('model'));
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
            'nama_kat_pemenang' => 'required'
        ]);

        $model = Kategori_pemenang::create($request->all());
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
        $model = Kategori_pemenang::findOrFail($id);
        return view('masterdata.kategori_pemenang.form', compact('model'));
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
            'nama_kat_pemenang' => 'required'
        ]);

        $model = Kategori_pemenang::findOrFail($id);

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
        $model = Kategori_pemenang::findOrFail($id);
        $model->delete();
    }

    public function dataTable()
    {
        $model = Kategori_pemenang::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('masterdata.kategori_pemenang._action', [
                    'model' => $model,
                    'url_edit' => route('kategori_pemenang.edit', $model->id),
                    'url_destroy' => route('kategori_pemenang.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
