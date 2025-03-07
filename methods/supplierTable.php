<?php
include 'DB.php';
$sql="SELECT * from delivery_supplier 
ORDER BY nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-supplier' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Localizacao</th>
                            <th>Contacto</th>
                            <th>Mail</th>
                            <th>Credito</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['nome']."</td>";
                            echo "<td>" . $rows['localizacao'] . "</td>";
                            echo "<td>" . $rows['contacto']."</td>";
                            echo "<td>" . $rows['mail'] . "</td>";
                            echo "<td>" . $rows['credito']."</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
