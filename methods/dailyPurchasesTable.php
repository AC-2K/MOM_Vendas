<?php
include 'DB.php';
$sql="SELECT p.nome,
c.data,
c.fornecedor,
c.quantidade as compras_quantidade,
c.precoUnitario
from compras as c 
inner join produto as p On c.produto = p.id 
WHERE c.data = CURDATE()
ORDER BY p.nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-basic' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Data</th>
                            <th>Fornecedor</th>
                            <th>Quantidade</th>
                            <th>Preco Unitario</th>
                            <th>Preco Total</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['nome']."</td>";
                            echo "<td>" . $rows['data'] . "</td>";
                            echo "<td>" . $rows['fornecedor'] . "</td>";
                            echo "<td>" . $rows['compras_quantidade'] . "</td>";
                            echo "<td>" . $rows['precoUnitario'] . "</td>";
                            echo "<td>" . $rows['precoUnitario'] * $rows['compras_quantidade']. "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
