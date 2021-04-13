<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cards;
use App\Models\User;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(5);
        return view('admin.home.index',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        if(!empty($id)) {
            $cards = DB::table('cards')
                ->where('user_id', $id)->paginate(5);
            $data=[
                'cards'=>$cards,
            ];
            return view('admin.user_cards', $data);
        }
    }
    function edit($id)
    {
        $user = DB::table('users')
        ->where('id',$id)
        ->first();
        $data=[
            'user'=>$user,
            'title'=>'Редактировать'
        ];
        return view('admin.edit',$data);
    }

    function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);


        $update = DB::table('users')
        ->where('name', $request->input('name'))
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email')
        ]);

        return redirect('admin_panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('Пользователь успешно удален');
    }
}
