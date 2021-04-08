@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <a href="{{ route('home.create')}}" class="btn btn-primary">Добавить пациента</a>
                @if (!empty($cards))
                @foreach ($cards as $card)
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                        {{ $card->id}}
                         </div>
                        <div class="card-header">
                           Имя: {{ $card->name}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Возраст: {{ $card->age}}</li>
                            <li class="list-group-item">Причины посещения: {{ $card->reason_see }}</li>
                            <li class="list-group-item">Назначение:{{ $card->assign}} </li>
                        </ul>
                            <a href="{{ route('home.edit', $card->id)}}" class="btn btn-info btn-sm">Редактировать</a>
                            
                            <form action="{{ route('home.destroy', $card->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm delete-btn" type="submit" onclick="return confirm('Вы действительно хотите удалить?')"> Удалить</button>
                            </form>
                    </div>
                    @endforeach
                @else
                    <p>Записей нет</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection