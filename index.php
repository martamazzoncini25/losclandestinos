
<?php
        
	session_start();
		require_once 'lib/funzioni.php';
       
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{ 
        
         $codicef = PostVal('CodiceFiscale');
		
          	
    $db=mysqli_connect("localhost:8889","root","root","losclandestinosdb");
   
   $sq="SELECT `UserType`
	      FROM `users` 
		  WHERE  `CodiceFiscale`='$codicef'";
		  
   /*$sqi="INSERT  
		   INTO`users`(`id`, `UserType`, `nome`, `cognome`, `CodiceFiscale`) 
		  VALUES ('$id','$UserType','$nome','$cognome','$CodiceFiscale')";*/
    
     $ris=mysqli_query($db,$sq);
	 //$r=mysqli_query($db,$sqi);
	 
	 $_SESSION['UserType']=$ris[$UserType];
	
	
	 if($_SESSION['UserType']==0)
	 {
	   
		 
		   //echo $ro['nome'];
		   //echo $ro['cognome'];
		    header("location:file/prova.php");
	  }
	  else if($_SESSION['UserType']!=0){
		  
		   header("location:file/logout.php");
	         session_destroy();	   
	  }
	
	}
	mysqli_close();
  


?>
<!DOCTYPE html>
<html>

  <head>
    <title>LOS-CLANDESTINO</title>
  </head>

		<body>
         <form method="post" action="index.php">
        
		 <input type="text" name="CodiceFiscale">COD-FISCALE<br>
      
           <input type="submit" name="Invia"><br>


         </form>
	 

		</body>
</html>