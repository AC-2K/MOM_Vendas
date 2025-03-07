<?php
//include 'DB.php';

if (isset($_POST['dia']) && isset($_POST['servico'])) {

    try {
        $dia = $_POST['dia']; 
        $servico = $_POST['servico'];

        $pdo = new PDO('mysql:host=localhost;dbname=food', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($servico == "VendasDia" ) {
            $stmt = $pdo->prepare("SELECT v.id AS vendas_id,
            r.id AS refeicao_id,
            v.data,
            v.quantidade,
            v.precoTotal,
            r.nome AS refeicao_nome
            FROM vendas v
            JOIN refeicao r ON v.refeicao = r.id
            WHERE v.data LIKE :dia
            order by r.nome");  
            $stmt->bindParam(':dia', $dia);
            $stmt->execute();
        
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
            if ($results) {
                        echo "<table id='data-table-basic' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Refeicao</th>
                                    <th>Quantidade</th>
                                    <th>Preco da venda</th>
                                    <th>Preco total</th>
                                </tr>
                            </thead>
                            <tbody>";
                                // Loop through the results and create table rows
                                foreach ($results as $row) {
                                    echo "<tr>
                                        <td>" . htmlspecialchars($row['refeicao_nome']) . "</td>  
                                        <td>" . htmlspecialchars($row['quantidade']) . "</td>
                                        <td>" .intdiv($row['precoTotal'], 1). "</td> 
                                        <td>" . $row['quantidade'] * $row['precoTotal']. "</td>   
                                    </tr>";
                                }
                            echo "</tbody>";
                        echo "</table>";
            } else {
                echo "No data found.";
            }
        }
        if ($servico == "ComprasTakeAwayDia" ) {
            $stmt = $pdo->prepare("SELECT c.id AS compras_id,
            p.id AS produto_id,
            c.data,
            c.quantidade,
            c.precoUnitario,
            c.fornecedor,
            p.nome AS produto_nome
            FROM compras c
            JOIN produto p ON p.id = c.produto
            WHERE c.data LIKE :dia
            order by p.nome");  
                $stmt->bindParam(':dia', $dia);
                $stmt->execute();
        
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if ($results) {
                    // Start the table
                    echo "<table id='data-table-basic2' class='table table-hover'>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Fornecedor</th>
                                    <th>Quantidade</th>
                                    <th>Preco unitaio</th>
                                </tr>
                            </thead>
                            <tbody>";
                    // Loop through the results and create table rows
                    foreach ($results as $row) {
                        echo "<tr>
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
        if ($servico == "DeliveryDia" ) {
            $stmt = $pdo->prepare("SELECT d.id AS delivery_id,
            d.data,
            d.quantidade,
            d.precoActual,
            dc.nome AS cliente_nome,
            dp.nome AS produto_nome
            FROM delivery d
            JOIN delivery_product dp ON d.produto = dp.id
            JOIN delivery_client dc ON d.cliente = dc.id
            WHERE d.data LIKE :dia
            order by dc.nome");  
            $stmt->bindParam(':dia', $dia);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($results) {
                // Start the table
                echo "<table id='data-table-basic3' class='table table-hover'>
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>";

                // Loop through the results and create table rows
                foreach ($results as $row) {
                    echo "<tr>
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
        if ($servico == "ComprasDeliveryDia" ) {
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
            WHERE dc.data LIKE :dia
            order by dp.nome");  
                $stmt->bindParam(':dia', $dia);
                $stmt->execute();
        
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if ($results) {
                    // Start the table
                    echo "<table id='data-table-Sales' class='table table-hover'>
                        <thead>  
                            <tr>
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
    echo "Required parameters are missing.";
}
?>

