<!DOCTYPE html>
<html>
<head>
    <title>Espace Etudiant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">

  <style>

   .img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
      .card {
        margin-bottom: 20px;
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        overflow: hidden;
        transition: 0.3s;
    }

    .card-header {
        background-color: #f8f9fa;
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 20px;
        margin-bottom: 10px;
    }

    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    .card-info {
        font-size: 18px;
        color: #6c757d;
    }

</style>
</head>
<body>  
          @yield('studentcontent')


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
  