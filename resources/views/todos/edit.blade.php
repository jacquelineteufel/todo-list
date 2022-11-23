<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Aufgaben bearbeiten</title>
</head>
<body style="text-align:center">
    <h1>Aufgaben bearbeiten</h1>
    <h3>
        <x-alert />
    </h3>
    <form action="/update" method="post">
        @csrf
        @method('PUT')
        <label for="exampleInputEmail1">Titel</label>
        <input type="text" name="title" value="{{$todo->title}}"/> <br>
        <input style="display:none" type="number" name="id" value="{{$todo->id}}">
        <label for="exampleInputEmail1">Beschreibung</label>
        <input type="text" name="description" value="{{$todo->description}}"/> <br>
        <input type="checkbox" class="form-check-input" name="completed">
        <label class="form-check-input" type="checkbox" value="1">Bereits erledigt</label> <br>
        <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
        
    </form>
    <br>
    <a href="/dashboard" class="btn btn-sm btn-danger">Zurück </a>
</body>
</html>