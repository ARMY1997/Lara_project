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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card; 
        $card-> name= $request->name;
        $card-> age= $request->age;
        $card-> reason_see= $request->reason_see;
        $card-> assign = $request->assign;
        $card->save();

        return redirect('home')->withSuccess('Пациент успешно добавлен');
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
