<?php
//include 'DB.php';

if (isset($_POST['mes']) && isset($_POST['ano']) && isset($_POST['servico']) ) {

    try {
        $servico = $_POST['servico'];
        $mes = $_POST['mes']; 
        $ano = $_POST['ano'];
        
        if ($mes < 10) {
            $dateL = $ano . '-0' . $mes . '-%%';  
        } else {
            $dateL = $ano . '-' . $mes . '-%%';    
        }

        $pdo = new PDO('mysql:host=localhost;dbname=food', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($servico == "Vendas" ) {
            $stmt = $pdo->prepare("SELECT v.id AS vendas_id,
            r.id AS refeicao_id,
            v.data,
            v.quantidade,
            r.nome AS refeicao_nome
            FROM vendas v
            JOIN refeicao r ON v.refeicao = r.id
            WHERE v.data LIKE :dateL
            order by v.data");  
            $stmt->bindParam(':dateL', $dateL);
            $stmt->execute();
        
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            if ($results) {
                    // Start the table
                    echo "<table id='data-table-Purchases' class='table table-hover'>
                        <thead>  
                            <tr>
                                <th>Data</th>
                                <th>Refeicao</th>
                                <th>Quantidade</th>
                            </tr>
                        <thead>
                        <tbody>"; 
                    // Loop through the results and create table rows
                    foreach ($results as $row) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['data']) . "</td>  
                                <td>" . htmlspecialchars($row['refeicao_nome']) . "</td>  
                                <td>" . htmlspecialchars($row['quantidade']) . "</td>  
                              </tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "No data found.";
                }
        }
        if ($servico == "ComprasTakeAway" ) {
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
            order by c.data");  
                $stmt->bindParam(':dateL', $dateL);
                $stmt->execute();
        
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if ($results) {
                    // Start the table
                    echo "<table id='data-table-Meals' class='table table-hover'>
                            <thead> 
                                <tr>
                                    <th>Data</th>
                                    <th>Produto</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                    <th>Preco unitaio</th>
                                </tr>
                            <thead>
                            <tbody>"; 
                    // Loop through the results and create table rows
                    foreach ($results as $row) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['data']) . "</td> 
                                <td>" . htmlspecialchars($row['produto_nome']) . "</td>  
                                <td>" . htmlspecialchars($row['fornecedor']) . "</td>   
                                <td>" . htmlspecialchars($row['quantidade']) . "</td>
                                <td>" . htmlspecialchars($row['precoUnitario']) . "</td>    
                              </tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "No data found.";
                }
        }
        if ($servico == "Delivery" ) {
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
            order by d.data");  
            $stmt->bindParam(':dateL', $dateL);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($results) {
                // Start the table
                echo "<table id='data-table-client' class='table table-hover'>
                        <thead> 
                            <tr>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                            </tr>
                        <thead>
                        <tbody>"; 
                // Loop through the results and create table rows
                foreach ($results as $row) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['data']) . "</td> 
                            <td>" . htmlspecialchars($row['cliente_nome']) . "</td>
                            <td>" . htmlspecialchars($row['produto_nome']) . "</td>   
                            <td>" . htmlspecialchars($row['quantidade']) . "</td> 
                        </tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No data found.";
            }
        }
        if ($servico == "ComprasDelivery" ) {
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
            order by dc.data");  
                $stmt->bindParam(':dateL', $dateL);
                $stmt->execute();
        
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if ($results) {
                    // Start the table
                    echo "<table id='data-table-supplier' class='table table-hover'>
                            <thead> 
                                <tr>
                                    <th>Data</th>
                                    <th>Produto</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                    <th>Preco unitaio</th>
                                    <th>Preco total</th>
                                </tr>
                            <thead>
                            <tbody>"; 
                    // Loop through the results and create table rows
                    foreach ($results as $row) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['data']) . "</td> 
                                <td>" . htmlspecialchars($row['produto_nome']) . "</td>  
                                <td>" . htmlspecialchars($row['fornecedor_nome']) . "</td>   
                                <td>" . htmlspecialchars($row['quantidade']) . "</td>
                                <td>" . htmlspecialchars($row['preco']) . "</td>  
                                <td>" . htmlspecialchars($row['preco']) * htmlspecialchars($row['quantidade']). "</td>    
                              </tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "No data found.";
                }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "Parametros invalidos";
}
?>

