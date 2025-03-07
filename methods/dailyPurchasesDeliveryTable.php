<?php
include 'DB.php';
$sql="SELECT p.nome as produto_nome,
dp.data,
ds.nome as fornecedor_nome,
dp.quantidade as compras_quantidade,
dp.preco
from delivery_purchase as dp 
inner join delivery_product as p On dp.produto = p.id 
inner join delivery_supplier as ds ON dp.fornecedor = ds.id 
WHERE dp.data = CURDATE()
ORDER BY produto_nome";

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
                            echo "<td>" . $rows['produto_nome']."</td>";
                            echo "<td>" . $rows['data'] . "</td>";
                            echo "<td>" . $rows['fornecedor_nome'] . "</td>";
                            echo "<td>" . $rows['compras_quantidade'] . "</td>";
                            echo "<td>" . $rows['preco'] . "</td>";
                            echo "<td>" . $rows['preco'] * $rows['compras_quantidade']. "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
