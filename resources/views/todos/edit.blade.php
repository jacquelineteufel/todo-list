<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Aufgaben bearbeiten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h1>Aufgaben bearbeiten</h1>
    <h3>
        <x-alert />
    </h3>
    <form action="/update" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1">Titel</label>
            <input type="text" class="form-control" name="title" value="{{$todo->title}}"/> <br>
            <input style="display:none" type="number" name="id" value="{{$todo->id}}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1">Beschreibung</label>
            <input type="text" name="description" class="form-control" value="{{$todo->description}}"/> <br>
        </div>

        <div class="mb-3"> 
             <input type="checkbox" class="form-check-input" name="completed">Bereits erledigt? </input>
             <!-- <label class="form-check-input" type="checkbox" value="1">Bereits erledigt</label> <br>-->
        </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <input type="submit" value="Änderung speichern" class="btn btn-primary"></input>
        <a href="/dashboard" class="btn btn-sm btn-danger">Zurück </a>
    </div>

    </form>   
    </div> 
</body>
</html>