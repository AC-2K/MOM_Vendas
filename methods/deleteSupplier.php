<?php
    session_start();
    include 'crudMethods.php';;
    include 'CSRF_methods.php';
    include 'DB.php';
    
        $csrfToken = $_POST['csrf_tokenDeleteDeliverySupplier'];
        $item = $_POST['supplierDelete'];

        if (!verifyCsrfTokenDeleteDeliverySupplier($csrfToken )) {
            throw new Exception("Invalid CSRF token.", 1);
        }else {
            try {
                deleteRowOneCondition($conn,'delivery_supplier','id', $item);
                $conn->close();
                // Redirect on success
                $result = array('0');
                header('Content-Type: application/json');
                echo json_encode($result);
            }catch (Throwable $th) {
                $conn->close();

                // Display error message
                $result = array('1');
                header('Content-Type: application/json');
                echo json_encode($result);
            }
        }
