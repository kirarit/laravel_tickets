<!DOCTYPE html>
<html>
<head>
	<title>CRUD Laravel Application</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
	<script type="text/javascript" src="{{url('js/jquery-3.1.0.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
</head>
<body>
  <div id="header">
  
      <h2><a class="navbar-header" href="#">Ticket System</a></h2>
       
      <h3 class="menu">
        <a class="active" href="{{url('/tickets')}}">Home</a>
        <a href="{{url('/create')}}">Get Ticket</a>
       
      </h3>
    </div>
