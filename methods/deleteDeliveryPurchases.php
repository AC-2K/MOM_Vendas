<?php
    session_start();
include 'DB.php';
include 'CSRF_methods.php';
include 'crudMethods.php';
if (isset($_POST['listaApagarDeliveryPurchases']) && isset($_POST['csrf_tokenDeleteDeliveryPurchase'])) {

    $listaApagarDeliveryPurchases = $_POST['listaApagarDeliveryPurchases'];  // This will be an array
    $csrf_tokenDeleteDeliveryPurchase = $_POST['csrf_tokenDeleteDeliveryPurchase'];  // The token for verification


    if (verifyCsrfTokenDeleteDeliveryPurchase($csrf_tokenDeleteDeliveryPurchase) == false ) {
        throw new Exception("Invalid CSRF token.", 1);
    }

    try {
        if (!empty($listaApagarDeliveryPurchases)) {
            $placeholders = implode(',', array_fill(0, count($listaApagarDeliveryPurchases), '?'));
            $sql = "DELETE FROM delivery_purchase WHERE id IN ($placeholders)";
            
            $stmt = $conn->prepare($sql);
            
            $types = str_repeat('s', count($listaApagarDeliveryPurchases)); // Use 's' for string
            
            $stmt->bind_param($types, ...$listaApagarDeliveryPurchases);
            
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
    
        unset($_SESSION['csrf_tokenDeleteDeliveryPurchase']);
    
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
        unset($_SESSION['csrf_tokenDeleteDeliveryPurchase']);
        
        // Return the result as JSON
        header('Content-Type: application/json');
        echo json_encode($resultData);
    }
} else {
    $conn->close();
    unset($_SESSION['csrf_tokenDeleteDeliveryPurchase']);
    header('Content-Type: application/json');
    echo json_encode($resultData); 
}
?>
