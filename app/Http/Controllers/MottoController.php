<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motto;

class MottoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mottos = Motto::all();
        return view('motto.index',compact('mottos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories();
        return view('motto.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $motto = new Motto();
        $motto->category = $request->category;
        $motto->desc = $request->description;
        $motto->save();

        return redirect()->route('motto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('motto.edit',compact('motto'));
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
        $motto = Motto::findOrFail($id);
        $motto->category = $request->category;
        $motto->desc = $request->description;
        $motto->update();

        return redirect()->route('motto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motto =  Motto::findOrFail($id);
        $motto->delete();

        return redirect()->route('motto.index');
    }

    private function categories()
    {
        $categories =
        [
            '1' => 'Visi',
            '2' => 'Misi',
        ];

        return $categories;
    }
}
