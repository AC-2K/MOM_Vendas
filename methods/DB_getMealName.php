<?php
   include 'DB.php';

   
   $sql = "select * from refeicao
   order by nome";

  
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $rowMeal = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $rowMeal = $result->fetch_all(MYSQLI_ASSOC);  
   }
   $conn->close();