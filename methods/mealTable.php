<?php
include 'DB.php';
$sql="SELECT * from refeicao 
ORDER BY nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-basic2' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Preco</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['nome']."</td>";
                            echo "<td>" . $rows['preco'] . "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
