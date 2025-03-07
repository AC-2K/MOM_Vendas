<?php
include 'DB.php';
$sql="SELECT dp.nome as produto_nome,
dc.nome as cliente_nome,
d.data,
d.quantidade,
d.precoActual
from delivery as d 
inner join delivery_product as dp On d.produto = dp.id
inner join delivery_client as dc ON d.cliente = dc.id 
WHERE d.data = CURDATE()
ORDER BY produto_nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-delivery' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Quantidade</th>
                            <th>Preco Vendido</th>
                            <th>Preco total</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['produto_nome']."</td>";
                            echo "<td>" . $rows['cliente_nome']."</td>";
                            echo "<td>" . $rows['data'] . "</td>";
                            echo "<td>" . $rows['quantidade'] . "</td>";
                            echo "<td>" . $rows['precoActual'] . "</td>";
                            echo "<td>" . $rows['precoActual'] * $rows['quantidade'] . "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
