<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Cards;
use Illuminate\View\View;
//use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cards = DB::table('cards')->where('user_id', auth()->user()->getAuthIdentifier())->paginate(5);
        return view('home',compact('cards'));
    }

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
        $card=new Cards(); 
        $card->name= $request->name;
        $card->age= $request->age;
        $card->reason_see= $request->reason_see;
        $card->assign = $request->assign;
        $card-> user_id= $request->user()->id;
        $card->save();

        return redirect('home')->withSuccess('Пациент успешно добавлен');
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  id int
     * @return \Illuminate\Http\Response
     */
    public function show(Cards $cards)
    {
        $this->authorize('view',$cards);
        $cards->load('user');

        return view('home.show',compact('cards'));
    }
     

   
    function edit($id)
    {
        $idInCard = DB::table('cards')
            ->where('id',$id)
            ->first();
        if(!empty($idInCard) && $idInCard->user_id == auth()->user()->getAuthIdentifier()) {
            $card = DB::table('cards')
                ->where('id', $id)
                ->first();
            $data = [
                'card' => $card,
                'title' => 'Редактировать'
            ];
            $error = [
                'error' => 'Вам это действие не разрешено'
            ];
            return view('card.edit', $data);
        }
        else return redirect('home')->withErrors('message','Вам это действие не разрешено!');
    }
     
    function update(Request $request, Cards $cards)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'reason_see'=>'required',
            'assign'=>'required'
        ]);


        $update = DB::table('cards')
        ->where('name', $request->input('name'))
        ->update([
            'name'=>$request->input('name'),
            'age'=>$request->input('age'),
            'reason_see'=>$request->input('reason_see'),
            'assign'=>$request->input('assign')
        ]);

        return redirect('home');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cards  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cards $card)
    {
        $card->delete();
        return redirect()->back()->withSuccess('Пациент успешно удален');
    }
}
