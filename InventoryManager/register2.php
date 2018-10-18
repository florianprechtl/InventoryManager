 
<!DOCTYPE html>
<html lang="en">
<head>

	    <!-- Required meta tags -->
     		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 	    <!-- Bootstrap CSS -->
   		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 	 <title>Registration for new users </title>
  	 <style>
		body {
			background-color: white; }
		h1 { color : blue;
		     text-align : center;
		     font-family : verdana;}

		p.normal{ color : blue;
		     text-align : center;		     
		      }

		p.info { color : gray;
	            font-size : 200%;
		    text-align : center;}

		p.important { color : blue;
	            text-align : center;
	            /*background-color : yellow;*/}

	 </style>	 


</head>

<body>

  <h1 style="margin:auto; width:600px;height:120px;border:10px solid lightblue;"> REGISTRATION PAGE</h1>

    <p class ="info">Give those information to register</p>
    
	<form>

    <p class = "normal"> Name : 
    <input type="text" name="name" required> <p>

    <p class = "normal"> Family name : 
    <input type="text" name="family" required> <p>

    <p class = "normal"> Age :
    <input type="age" name="age" required> <p>

     <div class="form-group" style="margin:auto; width:250px;height:140px; color : blue; text-align : center;">
    <label for="exampleFormControlSelect2"> Choose a gender: </label>
  	  <select multiple class="form-control" id="exampleFormControlSelect2">
    	 	 <option>M</option>
     		 <option>F</option>
      		 <option>Other</option>
     	 </select>
    </div>


    <p class = "normal"> Email :
    <input type="text" name="email" required> <p>

    <p class = "important"> User name : 
    <input type="text" name="username" required> <p>

    <p class = "important"> Password :
    <input type="password" placeholder="Choose a password" name="psw" required> <p>
	
    <p class = "important"> Repeat Password :
    <input type="password" placeholder="Repeat password" name="repeatedpsw" required> <p>

    <button type="button" class="btn btn-primary btn-lg btn-block" style="margin:auto; width:300px;height:100px;">SEND REGISTRATION</button>

    
    

		</form>
</body>
</html>


