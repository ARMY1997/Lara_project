@extends('layouts.admin_layout')

@section('title','Редактировать')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <h1>{{$title}} {{$user->name}} </h1>
            <div class="col-lg-12">
                <div class="card card-primary">
                    <form action="{{ route('main.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div>
                                <legend for="nameField">Имя:</legend>
                                <input type="text"  value="{{$user->name}}" class="form-control" name="name" id="formGroupExampleInput" placeholder="Имя животного">
                              </div>
                              <div>
                                <legend for="nameField">email</legend>
                                <input  type="text" type="text" value="{{$user->email}}" name="email" class="form-control" id="formGroupExampleInput" placeholder="Возраст">  
                              </div>
                              <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Редактировать</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection