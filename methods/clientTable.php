<?php
include 'DB.php';
$sql="SELECT * from delivery_client 
ORDER BY nome";

$result = mysqli_query($conn,$sql);
$row = $result->fetch_all(MYSQLI_ASSOC); 


echo "
                <table id='data-table-client' class='table table-striped' >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Mail</th>
                            <th>Contacto</th>
                            <th>Localizacao</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>";
                        if(!empty($row))
                        foreach($row as $rows)
                        {
            
                        echo "<tr>";
                            echo "<td>" . $rows['nome']."</td>";
                            echo "<td>" . $rows['mail'] . "</td>";
                            echo "<td>" . $rows['contacto'] . "</td>";
                            echo "<td>" . $rows['localizacao'] . "</td>";
                            echo "<td>" . $rows['tipo'] . "</td>";
                        echo "</tr>";

                        }
                    echo "</tbody>";
                echo "</table>";
mysqli_close($conn);
?>
