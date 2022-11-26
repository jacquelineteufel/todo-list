<!DOCTYPE html>
<html lang="de">
   <head>
      <meta charset="utf-8">
      <title>Aufgabe erstellen</title>
      <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>

   <body>
   <div class="container">
      <h1>Aufgabe erstellen</h1>
      <form action="/upload" method="post">
        @csrf
        @method('POST')

        <div class="mb-3">
         <label for="exampleInputEmail1">Titel</label>
         <input type="text" class="form-control" placeholder="z.B. Einkaufen" name="title"> <br>
      </div>

      <div class="mb-3">
         <label for="exampleInputPassword1">Beschreibung (optional)</label>
         <input type="text" class="form-control" placeholder="z.B. Bananen, Pfirsiche und Äpfel" name="description"> <br>
      </div> 

      <div class="mb-3">
         <input type="checkbox" class="form-check-input" name="completed">
         <label class="form-check-label" for="exampleCheck1">Bereits erledigt?</label> <br>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
       <input type="submit" value="Hinzufügen" class="btn btn-primary me-md-2"></input>
       <a href="/dashboard" class="btn btn-danger">Zurück </a>
      </div>

      </form>
      </div>
   </body>
</html>