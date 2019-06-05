<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <!-- Title -->
     <title>Sorry, This Page Can&#39;t Be Accessed</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" />
</head>

<body class="bg-dark text-white py-5">
     <div class="container py-5">
          <div class="row">
               <div class="col-md-2 text-center">
                    <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status : ปิดการใช้งาน</p>
               </div>
               <div class="col-md-10">
                    <h3>คุณไม่สามารถใช้งานได้ในขณะนี้</h3>
                    <p>กรุณาติดต่อ Admin เพื่อให้สามารถใช้งานได้ตามปกติ </p>
                    <div class="text-center">
          
             <a class="btn btn-danger" href="{{ route('login') }}" class="btn btn-default">Login again?</a> 
             &nbsp;
             <a class="btn btn-primary" href="{{ route('register') }}" class="btn btn-default">Register</a> 
          </div>
        </div>
                   
               </div>
          </div>
     </div>
</body>

</html>

