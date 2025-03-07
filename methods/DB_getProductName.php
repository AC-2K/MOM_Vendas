<?php
   include 'DB.php';

   
   $sql = "select id, nome from produto
   order by nome";

  
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $rowProd = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $rowProd = $result->fetch_all(MYSQLI_ASSOC);  
   }
   $conn->close();
