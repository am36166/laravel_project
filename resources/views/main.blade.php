<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">


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
    .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f5f5f5;
        }
        .content-wrapper {
            flex-grow: 1;
            padding: 20px;
        }
     
        .alert {
            margin-bottom: 10px;
            border-radius: 5px;
        }
        
        .main-header.navbar {
            background-color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-header.navbar .nav-link {
            color: #fff;
            transition: color 0.3s ease;
        }
        .main-header.navbar .nav-link:hover {
            color: #ffc107;
        }
        .main-sidebar.sidebar-dark-primary {
            background-color: #333;
        }
        .main-sidebar.sidebar-dark-primary .nav-sidebar .nav-link {
            color: #fff;
        }
        .table {
    font-size: 14px;
}

.table thead th {
    vertical-align: middle;
}

.table tbody td {
    vertical-align: middle;
}

.table .img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

.table .fa-check-circle {
    color: green;
}

.table .fa-times-circle {
    color: red;
}

.table .badge {
    font-size: 12px;
    padding: 6px 12px;
    border-radius: 4px;
    text-transform: uppercase;
}

.table .badge.bg-success {
    background-color: green;
    color: white;
}

.table .badge.bg-danger {
    background-color: red;
    color: white;
}
 
</style>
</head>
<body>  
          @yield('studentcontent')


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
  