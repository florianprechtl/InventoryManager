<?php
    include('connectDB.php');
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/resetCss.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/inventoryStyles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/datepicker/js/bootstrap-datepicker.js"></script>

    <title>Register Modal</title>
</head>

    <!-- Button trigger modal -->
    <br>
    <br>

	
 <div class="padding-bottom" >
                <a class="registration-link" data-toggle="modal" data-target="#exampleModalCenter" >Not registered yet? Click here!</a>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:blue" id="exampleModalCenterTitle">REGISTRATION INFO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="mx-auto">
          
        <form>

    <p> First Name : 
    <input type="text" name="name" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>

    <p> Last name : 
    <input type="text" name="family" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>

    		
   <div class="form-group" style="margin:auto; width:250px;height:140px; text-align : center;" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    <label for="exampleFormControlSelect2"> Choose a gender: </label>
  	  <select multiple class="form-control" id="exampleFormControlSelect2">
    	 	 <option>M</option>
     		 <option>F</option>
      		 <option>Other</option>
     	 </select>
   </div> 
		
    <p> Age :
    <input type="int" name="age"  class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>
    
    <p> Email :
    <input type="text" name="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>
	   
    <p> User name : 
    <input type="text" name="username" class="form-control"aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>
    <p> Password :
    <input type="password" placeholder="Choose a password" name="psw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>
	
    <p> Repeat Password :
    <input type="password" placeholder="Repeat password" name="repeatedpsw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" required> <p>
	


   
	
	
</form>
    
          
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">REGISTER</button>
      </div>
    </div>
 

        </div>
</div>
