<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\StoreRequest;
use App\Http\Request\UpdateRequest;
use App\Models\Card;
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
        $cards = Card::orderBy('create_at','desc')->get();
        return view('home',[
            '$cards'=>$cards
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card=new Card; 
        $card-> name= $request->name;
        $card-> age= $request->age;
        $card-> reason_see= $request->reason_see;
        $card-> assign = $request->assign;
        //$card->fill($request->validate());
        $card-> user_id= $request->user()->id;
        $card->save();

        return redirect()->back()->withSuccess('Пациент успешно добавлен');
    }

    
  /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Card  $card
     * @return JsonResponse
     */
public function show(Card $card):JsonResponse
{
    return response()->json($card,200);
}





    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param Card $card
     */
    public function update(UpdateRequest $request, Card $card):JsonResponse
    {
        $card->update($request->validate());
        return response()->json($card,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card):JsonResponse
    {
        $card->delete();
        return response()->json([],204);
    }
}
