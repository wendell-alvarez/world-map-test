<!DOCTYPE html>
<html lang="en">
<head>
  <title>WORLD MAP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" 
        type="text/css" 
        href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
  <style>
      html,body {
        height: 100%
      }
  </style>
  @yield('extra_css')
</head>
<body>
    <div class="container h-80 justify-content-center">
        @yield('content')        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('extra_js')
</body>
</html>
