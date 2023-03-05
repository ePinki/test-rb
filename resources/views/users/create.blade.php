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
    <form action="{{route('users.store')}}" method="post">
      {{csrf_field()}}
      <h2>Создание пользователя</h2>
      <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Введи имя" required>
        <small id="name" class="form-text text-muted">Сюда напишите имя</small>
      </div>

      <div class="form-group">
        <label for="birthdate">Дата рождения</label>
        <input type="date" name="birthdate" class="form-control" id="birthdate" aria-describedby="birthdate" placeholder="д.м.г">
        <small id="birthdate" class="form-text text-muted">Здесь дата рождения</small>
      </div>

      <div class="form-group">
        <label for="company">Организация</label>
        <input type="text" name="company" class="form-control" id="company" aria-describedby="comany" placeholder="Введи название организации" required>
        <small id="comany" class="form-text text-muted">Название организации</small>
      </div>

      <div class="form-group">
        <label for="UserType">Тип пользователя</label>
        <select type="text" name="user_type_id" class="form-control" id="UserType" aria-describedby="UserType" placeholder="Введи имя" required>
          <option value="1">Гражданин</option>
          <option value="2">Управляющая компания</option>
          <option value="3">Администрация района</option>
        </select>
        <small id="UserType" class="form-text text-muted">Название организации</small>
      </div>

      <div class="form-group">
        <label for="role1">Личный кабинет</label>
        <input type="checkbox" name="role[1]" id="role1">
        <label for="role2">Сообщения</label>
        <input type="checkbox" name="role[2]" id="role2">
        <label for="role3">Отчеты</label>
        <input type="checkbox" name="role[3]" id="role3">
        <label for="role4">Раскрытие информации</label>
        <input type="checkbox" name="role[4]" id="role4">
        <label for="role5">Сообщения</label>
        <input type="checkbox" name="role[5]" id="role5">
      </div>
      <button type="submit" name="button" class="btn btn-primary">Сохранить</button>
    </form>
  </div>
</body>
</html>
