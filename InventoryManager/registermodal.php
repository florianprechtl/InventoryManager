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
<div class="container-fluid" style="max-width: 800px; width:100%">
	
<div class="row header">
            <h1 class="col-sm-20" align="center">MyFridge</h1>
</div>
    <br>
    <br>

	
 <div class="padding-bottom" >
                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="color:white" >REGISTER NOW</a>
 </div>
</div>
		
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">    	     
      <div class="modal-header">
        <h5 class="modal-title" style="color:blue" id="exampleModalCenterTitle">REGISTRATION DEMAND</h5>
        <button type="button" class="close"  onclick="myFunction()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="mx-auto">
          
        <form method="POST" action="uploaduser.php" enctype="multipart/form-data">

    <p> First Name : 
    <input type="text" name="firstname" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm"  > <p>

    <p> Last name : 
    <input type="text" name="lastname" class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" > <p>

    		
 
		
    <p> Age :
    <input type="text" name="age"  class="form-control"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" > <p>
	   
    <p> User name : 
    <input type="text" name="newusername" class="form-control"aria-label="Small" aria-describedby="inputGroup-sizing-sm" > <p>
    <p> Password :
    <input type="password" placeholder="Choose a password" name="psw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" > <p>
	
    <p> Repeat Password :
    <input type="password" placeholder="Repeat password" name="repeatedpsw" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" > <p>
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
      </div>
    </div>
 </form>
	
        </div>
</div>


        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>


</html>

