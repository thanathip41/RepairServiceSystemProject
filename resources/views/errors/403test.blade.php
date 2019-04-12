<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="//use.fontawesome.com/84c9ca0cf8.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>403</title>

    <style type="text/css">
        @import url('//fonts.googleapis.com/css?family=Roboto');
        body {
           
            color: #D7D7D7;
            font: 16px/1.3 "Roboto", sans-serif;
        }
        header {
            width: 100%;
            margin:0px auto;
        }
        h1 {
            text-align: center;
            color:#D7D7D7;
            font: 100px/1 "Roboto";
            text-transform: uppercase;
            margin: 5% auto 5%;
            margin-bottom: 35px;
        }

        article { display: block; text-align: center; width: 650px; margin: 10px auto; }

        @media screen and (max-width: 720px) {
            article { display: block; text-align: center; width: 450px; margin: 0 auto; }
            h1 { font: 70px/1 "Roboto";}
            .wrap {margin-top: 50px;}
        }

        @media screen and (max-width: 480px) {
            article { display: block; text-align: center; width: 300px !important; margin: 0 auto; }
            h1 { font: 50px/1 "Roboto";}
            .wrap {margin-top: 50px;}

        }
    </style>

    
</head>
<body>
<div class="wrap">
  <article>
    <header>
      <h1 id="fittext1">คุณไม่มีสิทธิ์เข้าถึงข้อมูล<i class="fa fa-exclamation-triangle fa-fw"></i></h1>
      <div align="right"> 
    <a href="{{url('/')}}" class="btn btn-primary">back</a> 
    </div>
    </header>
  </article>
</div>
</body>
</html>