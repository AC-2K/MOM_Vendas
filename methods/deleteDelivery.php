<?php
    session_start();
include 'DB.php';
include 'CSRF_methods.php';
include 'crudMethods.php';
if (isset($_POST['listaApagarDelivery']) && isset($_POST['csrf_tokenDeleteDelivery'])) {

    $listaApagarDelivery = $_POST['listaApagarDelivery'];  // This will be an array
    $csrf_tokenDeleteDelivery = $_POST['csrf_tokenDeleteDelivery'];  // The token for verification


    if (verifyCsrfTokenDeleteDelivery($csrf_tokenDeleteDelivery) == false ) {
        throw new Exception("Invalid CSRF token.", 1);
    }

    try {
        if (!empty($listaApagarDelivery)) {
            $placeholders = implode(',', array_fill(0, count($listaApagarDelivery), '?'));
            $sql = "DELETE FROM delivery WHERE id IN ($placeholders)";
            
            $stmt = $conn->prepare($sql);
            
            $types = str_repeat('s', count($listaApagarDelivery)); // Use 's' for string
            
            $stmt->bind_param($types, ...$listaApagarDelivery);
            
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
    
        unset($_SESSION['csrf_tokenDeleteDelivery']);
    
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
        unset($_SESSION['csrf_tokenDeleteDelivery']);
        
        // Return the result as JSON
        header('Content-Type: application/json');
        echo json_encode($resultData);
    }
} else {
    $conn->close();
    unset($_SESSION['csrf_tokenDeleteDelivery']);
    header('Content-Type: application/json');
    echo json_encode($resultData); 
}
?>
