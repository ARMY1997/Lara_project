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

}
