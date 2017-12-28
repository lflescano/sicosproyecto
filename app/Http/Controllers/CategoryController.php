<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use View;

class CategoryController extends Controller
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
        Category::where('borrado',self::NO_BORRADO)->get();

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
        $itemCreado = Category::create([
            'nombre'=>$request->only('nombre')['nombre'],
            'habilitado' => self::NO_BORRADO
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

        dd($item->categoria);
        
        return View::make('items.show')
                   ->with('item',$item)
                   ->with('categoria',$item->categoria);
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
