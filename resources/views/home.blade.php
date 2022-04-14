<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://www.google.com/jsapi?key=INSERT-YOUR-KEY"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
 <center> <h2>Login Form</h2></center>
 <form id="login_form" enctype='multipart/form-data'>				

    <div class="form-group">
      <label for="uname">UserName:</label>
      <input type="email" class="form-control" id="uname" placeholder="Enter username" name="uname">
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
    
      $("#login_form").submit(function(e){
          e.preventDefault();
       
            $.ajax({
                type : "POST",
                url : "https://localserverweb.com/ci/vansun/api/login.php",
                data : new FormData(this),
                processData : false,
                contentType : false,
                cache : false,

                 success : function(response){

                //  console.log(response.data);   

                 if (response.status == true) {

                  localStorage.setItem("token",response.data.token);

                  window.location = "{{ url('addnewlead') }}";

                 }else{
                   console.log(response.message);
                 }

                 },
                 error : function(xhr){
                     console.log(xhr);
                    
                 }
                
            });
      });
});
</script>


</html>
