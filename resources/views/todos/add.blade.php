<!DOCTYPE html>
<html lang="de">
   <head></head>
   <body>
      <h1>Aufgabe erstellen</h1>
      <form action="/upload" method="post">
        @csrf
         <label for="exampleInputEmail1">Titel</label>
         <input type="text" class="form-control" name="title">
         <label for="exampleInputPassword1">Description</label>
         <input type="text" class="form-control" name="description">
         <input type="checkbox" class="form-check-input" name="completed">
         <label class="form-check-label" for="exampleCheck1">Completed?</label>
         <input type="submit" value="Hinzufügen" class="btn btn-primary"></input>
      </form>
   </body>
</html>