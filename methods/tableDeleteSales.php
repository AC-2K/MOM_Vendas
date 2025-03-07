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

        $stmt = $pdo->prepare("SELECT v.id AS vendas_id,
    r.id AS refeicao_id,
    v.data,
    v.quantidade,
    r.nome AS refeicao_nome
FROM vendas v
JOIN refeicao r ON v.refeicao = r.id
WHERE v.data LIKE :dateL
order by r.nome");  
        $stmt->bindParam(':dateL', $dateL);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($results) {
            // Start the table
            echo "<table id='data-table-Sales' class='table table-striped'>
                    <tr>
                        <th>Refeicao</th>
                        <th>Data</th>
                        <th>Quantidade</th>
                        <th>Quer apagar?</th>
                    </tr>";

            // Loop through the results and create table rows
            foreach ($results as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['refeicao_nome']) . "</td>  
                        <td>" . htmlspecialchars($row['data']) . "</td>  
                        <td>" . htmlspecialchars($row['quantidade']) . "</td>  
                        <td><input type='checkbox' name='delete[]' class='delete-checkbox-sales' value='" . htmlspecialchars($row['vendas_id']) . "'></td>
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

