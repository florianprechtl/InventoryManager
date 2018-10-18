  
<!DOCTYPE html>
<html>
<head>
 	 <title>Registration for new users </title>
  	 <style>
		body {
			background-color: dodgerblue; }
		h1 { color : blue;
		     text-align : center;
		     font-family : verdana;}

		p.normal{ color : lightyellow;
		     text-align : center;		     
		      }

		p.info { color : white;
	            font-size : 200%;
		    text-align : center;}

		p.important { color : blue;
	            text-align : center;
	            background-color : yellow;}

	 </style>	 


</head>

<body>

  <h1 style="border:10px solid Tomato;"> REGISTRATION PAGE</h1>

    <p class ="info">Give those information to register</p>
    
	<form>

    <p class = "normal"> First Name : 
    <input type="text" name="firstname" required> <p>

    <p class = "normal"> Last Name : 
    <input type="text" name="family" required> <p>

    <p class = "normal"> Age :
    <input type="age" name="age" required> <p>

    <p class = "normal"> Sex :
    <input type="radio" name="sex" value="male" checked> Male 
    <input type="radio" name="sex" value="female" checked> Female 
    <input type="radio" name="sex" value="other" checked> Other  <p>

    <p class = "normal"> Email :
    <input type="text" name="email" required> <p>

    <p class = "important"> Username : 
    <input type="text" name="username" required> <p>

    <p class = "important"> Password :
    <input type="password" placeholder="Choose a password" name="psw" required> <p>
	
    <p class = "important"> Repeat Password :
    <input type="password" placeholder="Repeat password" name="repeatedpsw" required> <p>

    
    

		</form>
</body>
</html>


