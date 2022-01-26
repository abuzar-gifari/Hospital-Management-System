<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">



  <style>
      table{
            border:2px solid black;
            border-collapse: collapse;
            width:75%;
        }

        th,td{
            border:2px solid black;
            padding:5px;
            text-align: center;
        }

        th{
            background-color: darkgreen;
            color: white;
            height:30px;
        }
  </style>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header style="font-family: 'Source Sans Pro', sans-serif;">
  
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">WELLNESS</span>-CENTER</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter your query.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            @if (Route::has('login'))
            
            @auth

                <li class="nav-item">
                  <a style="background-color: greenyellow; color:white;" class="nav-link" href="{{ url('myappoinment') }}">My Appoinment</a>
                </li>


                <x-app-layout>
                </x-app-layout>
            @else

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
            </li>

            @endauth
            @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="mt-4" style="font-family: 'Source Sans Pro', sans-serif;">
      <p class="text-center h2" style="font-family: 'Source Sans Pro', sans-serif;font-weight:900">Your Appoinment Informations</p><br>
      <table class="m-auto">
          <tr>
              <th>Doctor Name</th>
              <th>Date</th>
              <th>Message</th>
              <th>Status</th>
              <th>Cancel Appoinment</th>
          </tr>
          @foreach ($appoin as $appoin)
            <tr>
                <td>{{ $appoin->doctor }}</td>
                <td>{{ $appoin->date }}</td>
                <td>{{ $appoin->message }}</td>
                <td>{{ $appoin->status }}</td>
                <td>
                    <a href="{{ url('cancel_appoin',$appoin->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Cancel</a>
                </td>
            </tr>
          @endforeach
          
      </table>
  </div>



<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
