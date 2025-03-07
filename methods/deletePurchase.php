<?php
    session_start();
include 'DB.php';
include 'CSRF_methods.php';
include 'crudMethods.php';
if (isset($_POST['listaApagarPurchases']) && isset($_POST['csrf_tokenDeletePurchase'])) {

    $listaApagarPurchases = $_POST['listaApagarPurchases'];  // This will be an array
    $csrf_tokenDeletePurchase = $_POST['csrf_tokenDeletePurchase'];  // The token for verification


    if (verifyCsrfTokenDeletePurchase($csrf_tokenDeletePurchase) == false ) {
        throw new Exception("Invalid CSRF token.", 1);
    }

    try {
        if (!empty($listaApagarPurchases)) {
            $placeholders = implode(',', array_fill(0, count($listaApagarPurchases), '?'));
            $sql = "DELETE FROM compras WHERE id IN ($placeholders)";
            
            $stmt = $conn->prepare($sql);
            
            $types = str_repeat('s', count($listaApagarPurchases)); // Use 's' for string
            
            $stmt->bind_param($types, ...$listaApagarPurchases);
            
            // Execute the statement
            if ($stmt->execute()) {
                $resultData = array('0'); // Success response
            } else {
                $resultData = array('1'); // Error response
            }
            // Close the statement
            $stmt->close();
        } else {
            $resultData = array('1'); // No IDs to delete
        }
    
        $conn->close();
    
        unset($_SESSION['csrf_tokenDeletePurchase']);
    
        header('Content-Type: application/json');
        echo json_encode($resultData);
    
    } catch (PDOException $e) {
        // In case of error, return failure response
        $resultData = array('1');
        // Close the database connection (if it's open)
        if (isset($conn) && $conn->connect_error === false) {
            $conn->close();
        }
        
        // Clear the CSRF token in case of failure
        unset($_SESSION['csrf_tokenDeletePurchase']);
        
        // Return the result as JSON
        header('Content-Type: application/json');
        echo json_encode($resultData);
    }
} else {
    $resultData = array('1');
    $conn->close();
    unset($_SESSION['csrf_tokenDeleteSales']);
    header('Content-Type: application/json');
    echo json_encode($resultData); 
}
?>
