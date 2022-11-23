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
    <form action="/upload" method="post">
        @csrf
        <label for="exampleInputEmail1">Titel</label>
        <input type="text" name="title" value="{{$todo->title}}"/>
        <input style="display:none" type="number" name="id" value="{{$todo->id}}">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" name="description" value="{{$todo->description}}"/>
        <label class="form-check-label" for="exampleCheck1">Completed?</label>
        
        <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
        
    </form>
    <br>
    <a href="/dashboard" class="btn btn-sm btn-danger">Zurück </a>
</body>
</html>