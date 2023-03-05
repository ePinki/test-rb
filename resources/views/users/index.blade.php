<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/public/css/app.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

</head>

<body>
<div class="content" style="margin:20px;">
  <a href="/users/create" class="btn btn-primary">Создать</a><br>
  <form action="/lastame/search" method="get">
    <input type="text" name="name" placeholder="Фамилия">
  </form>
<br>
  <form action="/date/search" method="get">
    <input type="text" name="created_from" placeholder="Дата создания с">-
    <input type="text" name="created_to" placeholder="Дата создания по">
    <input type="submit"  value="Фильтровать">
  </form>


  <form action="/users/update/all" method="post">
    {{csrf_field()}}

  <table class="table">
    <thead>
      <tr>
        <th>ФИО</th>
        <th>Время создания</th>
        <th>Тип пользователя</th>
        <th>Роли</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      @forelse($users as $user)
      <input type="hidden" name="user_id[]" value="{{$user->id}}">
      <tr>
        <td>{{$user->name or 'Неизвестно'}}</td>
        <td>{{User::created_at($user->created_at)}}</td>
        <td>{{$user->user_type->title}}</td>
          <td>
            @php
            if(isset($i)){

            }
            else{
              $i=1;
            }
            @endphp
            <ul>
            @forelse($user->user_type->role as $rol)
            <li>
              <label for="exampleInputEmail{{$i}}">{{$rol->title}}</label>
              <input type="checkbox" name="UserRole[{{$user->id}}][{{$rol->id}}]role[]" id="exampleInputEmail{{$i}}" @foreach($user->role as $role) @if($role->id == $rol->id) checked @endif @endforeach >
            </li>
            @php
            $i++;
            @endphp
            @empty
            @endforelse
            </ul>
          </td>
        <td>
          <a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Изменить</a>
          <button type="button" name="button" class="btn btn-danger">Удалить</button>
        </td>
      </tr>
      @empty
      @endforelse
      <tr>
        <td>
          <button type="sumbit" class="btn btn-primary" name="button">Сохранить</button>
        </td>
      </tr>
    </tbody>
  </table>
  </form>
  {{$users->links()}}
</div>
</body>
</html>
