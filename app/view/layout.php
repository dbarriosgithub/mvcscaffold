<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>MVC CLIENT</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a href="#" class="navbar-brand">2E-WEB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_menu">
        <ul class="navbar-nav">
         <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Client</a>
            <div class="dropdown-menu">
              <a href="/client/index" class="dropdown-item">List</a>
              <a href="/client/create" class="dropdown-item">Create</a>
            </div>
         </li>     
        </ul>
      </div> 
      </nav> 
  
     <!-- área de mensajes -->
     <?php if(isset($message) && ($message!='OK')) { ?>
      <div class="row justify-content-center">
       <div class="col-md-10 alert alert-success alert-dismissible fade show">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
          </button>
          <?php echo $message; ?>
      </div>
      </div>
      <?php } ?>

     <!-- contenido principal -->
     <div class="container-fluid">
      <?php include($body);?>  
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>