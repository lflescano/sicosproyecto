<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemModel;
use App\Alumno;
use View;

class ItemController extends Controller
{
    const NO_BORRADO = 0;
    const BORRADO = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items;
        if($request->only('nombre')){
            $items = ItemModel::where('nombre','like','%'.$request->only('nombre')['nombre'].'%')->get();
        }else{
            $items = ItemModel::where('borrado',self::NO_BORRADO)->get();
        }

        return View::make('items.index')
                   ->with('itemsToList',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemCreado = ItemModel::create([
            'nombre'=>$request->only('nombre')['nombre'],
            'codigo' => $request->only('codigo')['codigo']
            ]);

        return View::make('items.show')
                   ->with('item',$itemCreado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ItemModel::find($id);
        dd($item->category);
        return View::make('items.show')
                   ->with('item',$item)
                   ->with('categoria',$item->category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ItemModel::find($id);
        
        return View::make('items.edit')
                   ->with('item',$item);

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
        $itemUpdate = ItemModel::find($id)->update([
            'nombre'=>$request->only('nombre')['nombre'],
            'codigo' => $request->only('codigo')['codigo']
            ]);
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemUpdate = ItemModel::find($id)->update([
            'borrado'=> self::BORRADO,
            ]);
        return redirect()->route('items.index');
    }
}
