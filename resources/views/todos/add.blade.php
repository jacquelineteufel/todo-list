<!DOCTYPE html>
<html lang="de">
   <head>
      <meta charset="utf-8">
      <title>Aufgabe erstellen</title>
   </head>
   <body>
   <body style="text-align:center">
      <h1>Aufgabe erstellen</h1>
      <form action="/upload" method="post">
        @csrf
         <label for="exampleInputEmail1">Titel</label>
         <input type="text" class="form-control" name="title"> <br>
         <label for="exampleInputPassword1">Description</label>
         <input type="text" class="form-control" name="description"> <br>
         <input type="checkbox" class="form-check-input" name="completed">
         <label class="form-check-label" for="exampleCheck1">Bereits erledigt</label> <br>
         <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
      </form>
   </body>
</html>