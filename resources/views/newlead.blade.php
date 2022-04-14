<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div class="container">
 <center> <h2>Add New Lead</h2></center>
 <form id="new_leadform" enctype='multipart/form-data'>				

    <div class="form-group">
      <label for="text">Client Name:</label>
      <input type="text" class="form-control" id="client_name" required placeholder="Enter username" name="username">
    </div>

    <div class="form-group">
      <label for="email">Client Email:</label>
      <input type="email" class="form-control" id="client_email" placeholder="Enter Client Email" name="client_email" required>
    </div>

    <div class="form-group">
      <label for="email">Project Value:</label>
      <input type="number" class="form-control" id="estimate_project_value" placeholder="Enter Project Value" name="estimate_project_value">
    </div>
    <div class="form-group">
      <label for="phone">Client Phone:</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter Client Phone" name="phone">
    </div>
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
    </div>
    <div class="form-group">
      <label for="email">Country:</label>
      <input type="text" class="form-control country" id="country" required placeholder="Enter Country" name="country">
    </div>
    <div class="form-group">
      <label for="state">State:</label>
      <input type="text" class="form-control" id="state" placeholder="Enter state" name="state">
    </div>  
     <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
    </div>  

    <div class="form-group">
    <label for="service">Client Service:</label>
    <select class="form-control client_service" id="service" name="service">
        <option value="">Select One</option>

    </select>
    </div>  


    <div class="form-group">
    <label for="send_to">Lead Send To:</label>
    <select class="form-control send_to" id="send_to" name="send_to" required>
        <option value="">Select One</option>

    </select>
    </div>  


    <div class="form-group">
    <label for="enquiry_sources">Enquiry Sources:</label>
    <select class="form-control enquiry_sources" id="enquiry_sources" name="enquiry_sources" required>
        <option value="">Select One</option>
    </select>
    </div>  

    <div class="form-group">
      <label for="added_by">Name of Adder:</label>
      <input type="text" class="form-control" id="added_by" required placeholder="Enter Name of Adder" name="added_by" required>
    </div>
    
    <div class="form-group">
      <label for="comments">Comments:</label>
      <input type="text" class="form-control" id="comments" required placeholder="Enter Comments" name="comments" required>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</html>

<script>

function client_service() {
$.ajax({
    type: 'get',
    url: "https://localserverweb.com/ci/vansun/api/selectionData.php",
    headers: {"Authorization": localStorage.getItem('token')},
    cache : false,
    dataType:'json',
    success: function (response) {
      console.log(response);

      var service = response.data.services;
      var sendTo = response.data.sendTo;
      var enquirySources = response.data.enquirySources;

      for (var i = 0; i < service.length; i++) {
        $('.client_service').append('<option>' + service[i] + '</option>');
      }

      for (var i = 0; i < sendTo.length; i++) {
        $('.send_to').append('<option>' + sendTo[i].inbox+ '</option>');
      }

      for (var i = 0; i < enquirySources.length; i++) {
        $('.enquiry_sources').append('<option>' + enquirySources[i] + '</option>');
      }

    },
    error: function (data) {

        console.log('unable to send request..');
    }
});
}client_service();

</script>


<script>

$(document).ready(function(){  
      $("#new_leadform").submit(function(e){
          e.preventDefault();

            $.ajax({
                type : "POST",
                url : "https://localserverweb.com/ci/vansun/api/addNewLead.php",
                headers: {"Authorization": localStorage.getItem('token')},
                data : new FormData(this),
                processData : false,
                contentType : false,
                cache : false,

                 success : function(response){

                 console.log(response);   

                 if (response.status == true) {
                      alert("Lead generated successfully");
                 }else{
                      alert("Opps failled");
                 }

                 },
                 error : function(xhr){
                     console.log(xhr);
                    
                 }
                
            });
      });
});
</script>














