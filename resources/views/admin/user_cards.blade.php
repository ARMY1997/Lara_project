@extends('layouts.admin_layout')

@section('title','Клиенты пользователя')


@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Клиенты пользователя</h1>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('users')
    @if (!empty($cards))
    @foreach ($cards as $card)
    <div class="container-fluid">
        <div class="row rows-col-2">
            <div class="col-md-5">
                <div class="card">
                  <div class="card-header">
                    Имя: {{ $card->name}}
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: flex;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Возраст: {{ $card->age}}</li>
                        <li class="list-group-item">Причины посещения: {{ $card->reason_see }}</li>
                        <li class="list-group-item">Назначение:{{ $card->assign}} </li>
                    </ul>
                  </div>
                </div>
              </div>
        </div>
    </div>
        @endforeach
    @else
        <p>Записей нет</p>
    @endif
    {{$cards->links()}}
@endsection