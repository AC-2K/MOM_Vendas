<?php
   include 'DB.php';

   
   $sql = "select id, nome from delivery_product
   order by nome";

  
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $rowDelPro = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $rowDelPro = $result->fetch_all(MYSQLI_ASSOC);  
   }
   $conn->close();
