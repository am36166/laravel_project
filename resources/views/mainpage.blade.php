<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
</head>
 <style>     
           .card {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
      .card-body {
            padding: 10px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-label {
            margin-bottom: 3px;
        }
        
        .form-control {
            padding: 5px 10px;
        }
        
        .form-control-file {
            padding-top: 3px;
            padding-bottom: 3px;
        }
        
        .btn-primary {
            padding: 4px 10px;
        }
        
        #etudiant-form,
        #responsable-form {
            margin: 0 auto;
            max-width: 400px;
        }
        
        .card-body form {
            width: 100%;
            margin: 0 auto;
        }
        
        .text-center {
            text-align: center;
        }
        
        .button-container {
            display: flex;
            justify-content: center;
        }
    </style>
<body> 
   @yield('content')
</body>
</html>