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
                <a href="{{ route('Cards.create')}}" class="btn btn-primary">Добавить пациента</a>
                
                
                @foreach ($cards as $card)
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                        Имя: {{$card['id']}}
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">Возраст: {{$card['age']}}</li>
                        <li class="list-group-item">Причины посещения: {{$card['reason_see']}}</li>
                        <li class="list-group-item">Назначение: {{$card['assign']}}</li>
                        </ul>
                        <a href="" class="btn btn-primary">Редактировать</a>
                        <a href="" class="btn btn-primary">Удалить</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection