<?php
   include 'DB.php';
  
   $sql = "SELECT SUM(quantidade * precoTotal) AS receita
    FROM vendas;";

   $result = ($conn->query($sql));
   //declare array to store the data of database
   $rowTotalSales = []; 
   
   if ($result->num_rows > 0) 
   {
       // fetch all data from db into array 
       $rowTotalSales = $result->fetch_all(MYSQLI_ASSOC);  
   }
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   $sql2 = "SELECT SUM(quantidade * precoTotal) AS receitaMensal
   FROM vendas 
   WHERE MONTH(data) = MONTH(CURRENT_DATE())
     AND YEAR(data) = YEAR(CURRENT_DATE());
   ";

    $result2 = ($conn->query($sql2));
    //declare array to store the data of database
    $rowMonthSales = []; 

    if ($result2->num_rows > 0) 
    {
        // fetch all data from db into array 
        $rowMonthSales = $result2->fetch_all(MYSQLI_ASSOC);  
    }
//  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $sql3 = "SELECT SUM(c.quantidade * c.precoUnitario) AS gastosMensal
    FROM compras c
    WHERE MONTH(c.data) = MONTH(CURRENT_DATE())
      AND YEAR(c.data) = YEAR(CURRENT_DATE());
    ";
 
     $result3 = ($conn->query($sql3));
     //declare array to store the data of database
     $rowMonthExpenses = []; 
 
     if ($result3->num_rows > 0) 
     {
         // fetch all data from db into array 
         $rowMonthExpenses = $result3->fetch_all(MYSQLI_ASSOC);  
     }
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $sql4 = "SELECT (SELECT SUM(quantidade * precoTotal) AS receitaMensal FROM vendas
            WHERE MONTH(data) = MONTH(CURRENT_DATE())
            AND YEAR(data) = YEAR(CURRENT_DATE()))
            - 
            ( SELECT SUM(c.quantidade * c.precoUnitario) AS gastosMensal
            FROM compras c WHERE MONTH(c.data) = MONTH(CURRENT_DATE()) AND YEAR(c.data) = YEAR(CURRENT_DATE()) ) AS lucros;
            ";
 
     $result4 = ($conn->query($sql4));
     //declare array to store the data of database
     $rowMonthPROFITS = []; 
 
     if ($result4->num_rows > 0) 
     {
         // fetch all data from db into array 
         $rowMonthPROFITS = $result4->fetch_all(MYSQLI_ASSOC);  
     }

    $conn->close();
