@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('home.create')}}" class="btn btn-primary button_create">Добавить пациента</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div>
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                    @endif
                </div>
                @if (!empty($cards))
                @foreach ($cards as $card)
                    <div class="card card_show">
                        <div class="card-header">
                           Имя: {{ $card->name}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Возраст: {{ $card->age}}</li>
                            <li class="list-group-item">Причины посещения: {{ $card->reason_see }}</li>
                            <li class="list-group-item">Назначение:{{ $card->assign}} </li>
                        </ul>
                        <div class="button_flex">
                            <a href="{{ route('home.edit', $card->id)}}" class="btn btn-info btn-sm button_edit">Редактировать</a>
                            <form action="{{ route('home.destroy', $card->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить?')"> Удалить</button>
                            </form> 
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>Записей нет</p>
                @endif
            </div>
        </div>
    </div>
</div>
{{$cards->links()}}
@endsection