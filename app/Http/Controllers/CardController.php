<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\StoreRequest;
use App\Http\Request\UpdateRequest;
use App\Models\Cards;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Illuminate\Http\Response;
     */
    public function index()
    {
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card=new Cards; 
        $card-> name= $request->name;
        $card-> age= $request->age;
        $card-> reason_see= $request->reason_see;
        $card-> assign = $request->assign;
        //$card->fill($request->validate());
        $card-> user_id= $request->user()->id;
        $card->save();

        return redirect()->route('home')->withSuccess('Пациент успешно добавлен');
    }

  /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Cards  $card
     * @return JsonResponse
     */
public function show(Cards $card):JsonResponse
{
    return response()->json($card,200);
}


 /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @param  \App\Models\Cards $cards
     * @return \Illuminate\Http\Response
     */
    public function edit(Cards $cards)
    {
        $card = DB::table('cards');
        $card = Cards::find(1);
        return view('card.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param Cards $card
     */
    public function update(UpdateRequest $request, Cards $card):JsonResponse
    {
        $card->update($request->validate());
        return response()->json($card,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cards  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $card):JsonResponse
    {
        $card->delete();
        return response()->json([],204);
    }
}
