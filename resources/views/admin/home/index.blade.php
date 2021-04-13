@extends('layouts.admin_layout')

@section('title','Главная')
    
@section('content')
      
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('users')


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Users</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        id
                    </th>
                    <th style="width: 20%">
                        Name
                    </th>
                    <th style="width: 20%">
                        Email
                    </th>
                    <th style="width: 40%">
                        
                    </th>
                </tr>
            </thead>
            @if (!empty($users))
            @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>
                        {{ $user->id}}
                    </td>
                    <td>
                        {{ $user->name}}
                    </td>
                    <td class="project_progress">
                        {{ $user->email }}
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('main.read',$user->id)}}">
                            <i class="fas fa-folder">
                            </i>
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('main.edit', $user->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form action="{{ route('main.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm delete-btn" type="submit"> <i class="fas fa-trash">
                            </i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
            @else
                <p>Пользователей нет</p>
            @endif
        </table>
      </div>
    </div>
    {{$users->links()}}
  </section>
@endsection