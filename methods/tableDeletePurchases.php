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

        $stmt = $pdo->prepare("SELECT c.id AS compras_id,
    p.id AS produto_id,
    c.data,
    c.quantidade,
    c.precoUnitario,
    c.fornecedor,
    p.nome AS produto_nome
FROM compras c
JOIN produto p ON p.id = c.produto
WHERE c.data LIKE :dateL
order by p.nome");  
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
                        <th>Quer apagar?</th>
                    </tr>";

            // Loop through the results and create table rows
            foreach ($results as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['produto_nome']) . "</td>  
                        <td>" . htmlspecialchars($row['data']) . "</td> 
                        <td>" . htmlspecialchars($row['fornecedor']) . "</td>   
                        <td>" . htmlspecialchars($row['quantidade']) . "</td>
                        <td>" . htmlspecialchars($row['precoUnitario']) . "</td>    
                        <td><input type='checkbox' name='deletePurchases[]' class='delete-checkbox-sales' value='" . htmlspecialchars($row['compras_id']) . "'></td>
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

