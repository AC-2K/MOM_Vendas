<?php
include 'DB.php';
$sql="SELECT * from vendas as v 
inner join refeicao as r On v.refeicao = r.id 
WHERE v.data = CURDATE()
ORDER BY r.nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-basic3' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Refeicao</th>
                            <th>Quantidade</th>
                            <th>Data</th>
                            <th>Preco Unitario</th>
                            <th>Preco total</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['nome']."</td>";
                            echo "<td>" . $rows['quantidade'] . "</td>";
                            echo "<td>" . $rows['data'] . "</td>";
                            echo "<td>" . $rows['precoTotal'] . "</td>";
                            echo "<td>" . $rows['preco'] * $rows['quantidade'] . "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
