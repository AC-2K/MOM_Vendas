<?php
   include 'DB.php';

   
   $sql = "SELECT d.id,
   d.data, 
   dc.nome as cliente_nome,
   dp.nome as produto_nome
   from delivery d
   INNER JOIN delivery_client dc ON d.cliente = dc.id
   INNER JOIN delivery_product dp ON d.produto = dp.id
   order by d.data";

  
   $result = ($conn->query($sql));
   //declare array to store the data of database
   $rowDeliInfo = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $rowDeliInfo = $result->fetch_all(MYSQLI_ASSOC);  
   }
   $conn->close();
