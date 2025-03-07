<?php
//include 'DB.php';

if (isset($_POST['mes']) && isset($_POST['ano'])) {

    try {
        $mes = $_POST['mes']; 
        $ano = $_POST['ano'];
        
        if ($mes < 10) {
            $dateL = $ano . '-0' . $mes . '-%%';  
        } else {
            $dateL = $ano . '-' . $mes . '-%%';    
        }

        $pdo = new PDO('mysql:host=localhost;dbname=food', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT d.id AS delivery_id,
    d.data,
    d.quantidade,
    d.precoActual,
    dc.nome AS cliente_nome,
    dp.nome AS produto_nome
FROM delivery d
JOIN delivery_product dp ON d.produto = dp.id
JOIN delivery_client dc ON d.cliente = dc.id
WHERE d.data LIKE :dateL
order by dc.nome");  
        $stmt->bindParam(':dateL', $dateL);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($results) {
            // Start the table
            echo "<table id='data-table-Sales' class='table table-striped'>
                    <tr>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Data</th>
                        <th>Quantidade</th>
                        <th>Quer apagar?</th>
                    </tr>";

            // Loop through the results and create table rows
            foreach ($results as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['cliente_nome']) . "</td>
                        <td>" . htmlspecialchars($row['produto_nome']) . "</td>   
                        <td>" . htmlspecialchars($row['data']) . "</td> 
                        <td>" . htmlspecialchars($row['quantidade']) . "</td> 
                        <td><input type='checkbox' name='delete[]' class='delete-checkbox-Delivery' value='" . htmlspecialchars($row['delivery_id']) . "'></td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "No data found.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "Required parameters are missing.";
}
?>

