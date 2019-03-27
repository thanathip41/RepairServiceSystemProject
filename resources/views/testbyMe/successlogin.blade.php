<!DOCTYPE html> <html lang="en"> 
<head> 
<meta charset="utf-8"> 

<title>welcome login</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head> 
<body> 
<div class="container">
   @if(isset(Auth::user()->email))
    <div class="alert alert-success success-block">
     <strong>Welcome {{ Auth::user()->name }}</strong>
     <br />
     <a href="">Logout</a>
    </div>
   @else

   @endif

   <br />
  </div> 
</body> 
</html> 
