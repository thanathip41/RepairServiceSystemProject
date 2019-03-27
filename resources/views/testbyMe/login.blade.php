<!DOCTYPE html> <html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login system</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head> 
<body> 
<div class="container">
<h1 align="center"> login</h1>
<br>
<form action="{{url('login/checklogin')}}" method="post">
   {{ csrf_field() }}
    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name="email" value="" class="form-control">
    </div>
     <div class="form-group">
        <label>password</label>
        <input type="password" name="password" value="" class="form-control">
    </div>
       <div class="form-group">
        <input type="submit" name="login" value="login" class="btn btn-primary">
    </div>
</form>
</div> 
</body> 
</html> 
