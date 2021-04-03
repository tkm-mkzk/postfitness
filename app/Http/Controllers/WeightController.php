<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;
use App\Http\Requests\StoreWeight;
use Illuminate\Support\Facades\DB;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $weights = DB::table('weights')
        ->where('user_id', $request->user()->id)
        ->orderBy('date', 'desc')
        ->paginate(20);

        return view('weight.index', compact('weights'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeight $request)
    {
        $weight = new Weight();

        $weight->date = $request->input('date');
        $weight->weight = $request->input('weight');
        $weight->user_id = $request->user()->id;

        $weight->save();

        return redirect('weight/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weight = Weight::find($id);

        return view('weight.show',
        compact('weight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weight = Weight::find($id);

        return view('weight.edit', compact('weight'));
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
        $weight = Weight::find($id);


        $weight->date = $request->input('date');
        $weight->weight = $request->input('weight');
        $weight->user_id = $request->user()->id;

        $weight->save();

        return redirect('weight/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weight = Weight::find($id);
        $weight->delete();

        return redirect('weight/index');
    }
}
