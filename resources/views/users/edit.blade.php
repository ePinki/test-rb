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
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
  {{ $errors->first() }}
    </div>
    @endif

    <form action="{{route('users.update', $user->id)}}" method="post">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PATCH">
      <h2>Обновление пользователя</h2>
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" aria-describedby="name" placeholder="Введи имя" required>
        <small id="name" class="form-text text-muted">Сюда напишите имя</small>
      </div>

      <div class="form-group">
        <label for="birthdate">Дата рождения</label>
        <input type="date" name="birthdate" class="form-control" id="birthdate" value="{{$user->birthdate or ''}}" aria-describedby="birthdate" placeholder="д.м.г">
        <small id="birthdate" class="form-text text-muted">Здесь дата рождения</small>
      </div>

      <div class="form-group">
        <label for="company">Организация</label>
        <input type="text" name="company" class="form-control" id="company" value="{{$user->company}}" aria-describedby="comany" placeholder="Введи название организации" required>
        <small id="comany" class="form-text text-muted">Название организации</small>
      </div>
      <div class="form-group">
        <label for="UserType">Тип пользователя</label>
        <select type="text" name="UserType" class="form-control" id="UserType" aria-describedby="UserType" placeholder="Введи имя" required>
          <option value="1" @if($user->user_type->id == 1) selected @endif>Гражданин</option>
          <option value="2" @if($user->user_type->id == 2) selected @endif>Управляющая компания</option>
          <option value="3" @if($user->user_type->id == 3) selected @endif>Администрация района</option>
        </select>
        <small id="UserType" class="form-text text-muted">Название организации</small>
      </div>

      <div class="form-group">
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
          <input type="checkbox" name="role[{{$rol->id}}]" id="exampleInputEmail{{$i}}" @foreach($user->role as $role) @if($role->id == $rol->id) checked @endif @endforeach >
        </li>
        @php
        $i++;
        @endphp
        @empty
        @endforelse
      </div>
      <button type="submit" name="button" class="btn btn-primary">Сохранить</button>
    </form>
  </div>
</body>
</html>
