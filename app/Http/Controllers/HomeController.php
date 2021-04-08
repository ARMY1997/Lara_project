<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cards;

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
        $cards = DB::table('cards')->paginate(5);
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

        return redirect()->back()->withSuccess('Пациент успешно добавлен');
    }
     
     function edit($id)
    {
        $card = DB::table('cards')
        ->where('id',$id)
        ->first();
        $data=[
            'card'=>$card,
            'title'=>'Редактировать'
        ];
        return view('card.edit',$data);
    }
     
    function update(Request $request)
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
