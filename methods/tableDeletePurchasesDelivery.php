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

        $stmt = $pdo->prepare("SELECT dc.id AS compras_id,
    dp.id AS produto_id,
    dc.data,
    dc.quantidade,
    dc.preco,
    ds.nome as fornecedor_nome,
    dp.nome AS produto_nome
FROM delivery_purchase dc
JOIN delivery_product dp ON dp.id = dc.produto
inner join delivery_supplier ds ON dc.fornecedor = ds.id 
WHERE dc.data LIKE :dateL
order by dp.nome");  
        $stmt->bindParam(':dateL', $dateL);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($results) {
            // Start the table
            echo "<table id='data-table-Sales' class='table table-striped'>
                    <tr>
                        <th>Produto</th>
                        <th>Data</th>
                        <th>Fornecedor</th>
                        <th>Quantidade</th>
                        <th>Preco unitaio</th>
                        <th>Preco total</th>
                        <th>Quer apagar?</th>
                    </tr>";

            // Loop through the results and create table rows
            foreach ($results as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['produto_nome']) . "</td>  
                        <td>" . htmlspecialchars($row['data']) . "</td> 
                        <td>" . htmlspecialchars($row['fornecedor_nome']) . "</td>   
                        <td>" . htmlspecialchars($row['quantidade']) . "</td>
                        <td>" . htmlspecialchars($row['preco']) . "</td>  
                         <td>" . htmlspecialchars($row['preco']) * htmlspecialchars($row['quantidade']). "</td>    
                        <td><input type='checkbox' name='deletePurchases[]' class='delete-checkbox-DeliveryPurchases' value='" . htmlspecialchars($row['compras_id']) . "'></td>
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

