<?php


// ---------------------------------  General USE -------------------------------------------------------
function generateCsrfTokenCreate() {
    if (!isset($_SESSION['csrf_tokenCreate'])) {
        $_SESSION['csrf_tokenCreate'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreate'];
}
function generateCsrfTokenUpdate() {
    if (!isset($_SESSION['csrf_tokenUpdate'])) {
        $_SESSION['csrf_tokenUpdate'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdate'];
}
function generateCsrfTokenDelete() {
    if (!isset($_SESSION['csrf_tokenDelete'])) {
        $_SESSION['csrf_tokenDelete'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDelete'];
}
function verifyCsrfTokenCreate($token) {
    return isset($_SESSION['csrf_tokenCreate']) && hash_equals($_SESSION['csrf_tokenCreate'], $token);
}
function verifyCsrfTokenUpdate($token) {
    return isset($_SESSION['csrf_tokenUpdate']) && hash_equals($_SESSION['csrf_tokenUpdate'], $token);
}
function verifyCsrfTokenDelete($token) {
    return isset($_SESSION['csrf_tokenDelete']) && hash_equals($_SESSION['csrf_tokenDelete'], $token);
}

//---------------------------------- Meal METHODS -----------------------------------------------------
function generateCsrfTokenCreateMeal() {
    if (!isset($_SESSION['csrf_tokenCreateMeal'])) {
        $_SESSION['csrf_tokenCreateMeal'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateMeal'];
}
function generateCsrfTokenDeleteMeal() {
    if (!isset($_SESSION['csrf_tokenDeleteMeal'])) {
        $_SESSION['csrf_tokenDeleteMeal'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteMeal'];
}

function generateCsrfTokenUpdateMeal() {
    if (!isset($_SESSION['csrf_tokenUpdateMeal'])) {
        $_SESSION['csrf_tokenUpdateMeal'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateMeal'];
}
function verifyCsrfTokenCreateMeal($token) {
    return isset($_SESSION['csrf_tokenCreateMeal']) && hash_equals($_SESSION['csrf_tokenCreateMeal'], $token);
}
function verifyCsrfTokenDeleteMeal($token) {
    return isset($_SESSION['csrf_tokenDeleteMeal']) && hash_equals($_SESSION['csrf_tokenDeleteMeal'], $token);
}
function verifyCsrfTokenUpdateMeal($token) {
    return isset($_SESSION['csrf_tokenUpdateMeal']) && hash_equals($_SESSION['csrf_tokenUpdateMeal'], $token);
}
// --------------------------------------- Purchases managment -------------------------------------------
function generateCsrfTokenCreatePurchase() {
    if (!isset($_SESSION['csrf_tokenCreatePurchase'])) {
        $_SESSION['csrf_tokenCreatePurchase'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreatePurchase'];
}

function generateCsrfTokenDeletePurchase() {
    if (!isset($_SESSION['csrf_tokenDeletePurchase'])) {
        $_SESSION['csrf_tokenDeletePurchase'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeletePurchase'];
}
function verifyCsrfTokenCreatePurchase($token) {
    return isset($_SESSION['csrf_tokenCreatePurchase']) && hash_equals($_SESSION['csrf_tokenCreatePurchase'], $token);
}
function verifyCsrfTokenDeletePurchase($token) {
    return isset($_SESSION['csrf_tokenDeletePurchase']) && hash_equals($_SESSION['csrf_tokenDeletePurchase'], $token);
}

// --------------------------------------- Sales managment -------------------------------------------
function generateCsrfTokenCreateSales() {
    if (!isset($_SESSION['csrf_tokenCreateSales'])) {
        $_SESSION['csrf_tokenCreateSales'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateSales'];
}

function generateCsrfTokenDeleteSales() {
    if (!isset($_SESSION['csrf_tokenDeleteSales'])) {
        $_SESSION['csrf_tokenDeleteSales'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteSales'];
}
function verifyCsrfTokenCreateSales($token) {
    return isset($_SESSION['csrf_tokenCreateSales']) && hash_equals($_SESSION['csrf_tokenCreateSales'], $token);
}

function verifyCsrfTokenDeleteSales($token) {
    return isset($_SESSION['csrf_tokenDeleteSales']) && hash_equals($_SESSION['csrf_tokenDeleteSales'], $token);
}

// --------------------------------------- product managment -------------------------------------------
function generateCsrfTokenCreateProduct() {
    if (!isset($_SESSION['csrf_tokenCreateProduct'])) {
        $_SESSION['csrf_tokenCreateProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateProduct'];
}
function generateCsrfTokenUpdateProduct() {
    if (!isset($_SESSION['csrf_tokenUpdateProduct'])) {
        $_SESSION['csrf_tokenUpdateProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateProduct'];
}
function generateCsrfTokenDeleteProduct() {
    if (!isset($_SESSION['csrf_tokenDeleteProduct'])) {
        $_SESSION['csrf_tokenDeleteProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteProduct'];
}
function verifyCsrfTokenCreateProduct($token) {
    return isset($_SESSION['csrf_tokenCreateProduct']) && hash_equals($_SESSION['csrf_tokenCreateProduct'], $token);
}
function verifyCsrfTokenUpdateProduct($token) {
    return isset($_SESSION['csrf_tokenUpdateProduct']) && hash_equals($_SESSION['csrf_tokenUpdateProduct'], $token);
}
function verifyCsrfTokenDeleteProduct($token) {
    return isset($_SESSION['csrf_tokenDeleteProduct']) && hash_equals($_SESSION['csrf_tokenDeleteProduct'], $token);
}
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// --------------------------------------- Delivery managment -------------------------------------------
function generateCsrfTokenCreateDelivery() {
    if (!isset($_SESSION['csrf_tokenCreateDelivery'])) {
        $_SESSION['csrf_tokenCreateDelivery'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateDelivery'];
}
function generateCsrfTokenUpdateDelivery() {
    if (!isset($_SESSION['csrf_tokenUpdateDelivery'])) {
        $_SESSION['csrf_tokenUpdateDelivery'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateDelivery'];
}
function generateCsrfTokenDeleteDelivery() {
    if (!isset($_SESSION['csrf_tokenDeleteDelivery'])) {
        $_SESSION['csrf_tokenDeleteDelivery'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteDelivery'];
}
function verifyCsrfTokenCreateDelivery($token) {
    return isset($_SESSION['csrf_tokenCreateDelivery']) && hash_equals($_SESSION['csrf_tokenCreateDelivery'], $token);
}
function verifyCsrfTokenUpdateDelivery($token) {
    return isset($_SESSION['csrf_tokenUpdateDelivery']) && hash_equals($_SESSION['csrf_tokenUpdateDelivery'], $token);
}
function verifyCsrfTokenDeleteDelivery($token) {
    return isset($_SESSION['csrf_tokenDeleteDelivery']) && hash_equals($_SESSION['csrf_tokenDeleteDelivery'], $token);
}

// --------------------------------------- Delivery Product managment -------------------------------------------
function generateCsrfTokenCreateDeliveryProduct() {
    if (!isset($_SESSION['csrf_tokenCreateDeliveryProduct'])) {
        $_SESSION['csrf_tokenCreateDeliveryProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateDeliveryProduct'];
}
function generateCsrfTokenUpdateDeliveryProduct() {
    if (!isset($_SESSION['csrf_tokenUpdateDeliveryProduct'])) {
        $_SESSION['csrf_tokenUpdateDeliveryProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateDeliveryProduct'];
}
function generateCsrfTokenDeleteDeliveryProduct() {
    if (!isset($_SESSION['csrf_tokenDeleteDeliveryProduct'])) {
        $_SESSION['csrf_tokenDeleteDeliveryProduct'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteDeliveryProduct'];
}
function verifyCsrfTokenCreateDeliveryProduct($token) {
    return isset($_SESSION['csrf_tokenCreateDeliveryProduct']) && hash_equals($_SESSION['csrf_tokenCreateDeliveryProduct'], $token);
}
function verifyCsrfTokenUpdateDeliveryProduct($token) {
    return isset($_SESSION['csrf_tokenUpdateDeliveryProduct']) && hash_equals($_SESSION['csrf_tokenUpdateDeliveryProduct'], $token);
}
function verifyCsrfTokenDeleteDeliveryProduct($token) {
    return isset($_SESSION['csrf_tokenDeleteDeliveryProduct']) && hash_equals($_SESSION['csrf_tokenDeleteDeliveryProduct'], $token);
}

// --------------------------------------- Delivery Purchases managment -------------------------------------------
function generateCsrfTokenCreateDeliveryPurchase() {
    if (!isset($_SESSION['csrf_tokenCreateDeliveryPurchase'])) {
        $_SESSION['csrf_tokenCreateDeliveryPurchase'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateDeliveryPurchase'];
}
function generateCsrfTokenUpdateDeliveryPurchase() {
    if (!isset($_SESSION['csrf_tokenUpdateDeliveryPurchase'])) {
        $_SESSION['csrf_tokenUpdateDeliveryPurchase'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateDeliveryPurchase'];
}
function generateCsrfTokenDeleteDeliveryPurchase() {
    if (!isset($_SESSION['csrf_tokenDeleteDeliveryPurchase'])) {
        $_SESSION['csrf_tokenDeleteDeliveryPurchase'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteDeliveryPurchase'];
}
function verifyCsrfTokenCreateDeliveryPurchase($token) {
    return isset($_SESSION['csrf_tokenCreateDeliveryPurchase']) && hash_equals($_SESSION['csrf_tokenCreateDeliveryPurchase'], $token);
}
function verifyCsrfTokenUpdateDeliveryPurchase($token) {
    return isset($_SESSION['csrf_tokenUpdateDeliveryPurchase']) && hash_equals($_SESSION['csrf_tokenUpdateDeliveryPurchase'], $token);
}
function verifyCsrfTokenDeleteDeliveryPurchase($token) {
    return isset($_SESSION['csrf_tokenDeleteDeliveryPurchase']) && hash_equals($_SESSION['csrf_tokenDeleteDeliveryPurchase'], $token);
}

// --------------------------------------- Delivery Supplier managment -------------------------------------------
function generateCsrfTokenCreateDeliverySupplier() {
    if (!isset($_SESSION['csrf_tokenCreateDeliverySupplier'])) {
        $_SESSION['csrf_tokenCreateDeliverySupplier'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateDeliverySupplier'];
}
function generateCsrfTokenUpdateDeliverySupplier() {
    if (!isset($_SESSION['csrf_tokenUpdateDeliverySupplier'])) {
        $_SESSION['csrf_tokenUpdateDeliverySupplier'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateDeliverySupplier'];
}
function generateCsrfTokenDeleteDeliverySupplier() {
    if (!isset($_SESSION['csrf_tokenDeleteDeliverySupplier'])) {
        $_SESSION['csrf_tokenDeleteDeliverySupplier'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteDeliverySupplier'];
}
function verifyCsrfTokenCreateDeliverySupplier($token) {
    return isset($_SESSION['csrf_tokenCreateDeliverySupplier']) && hash_equals($_SESSION['csrf_tokenCreateDeliverySupplier'], $token);
}
function verifyCsrfTokenUpdateDeliverySupplier($token) {
    return isset($_SESSION['csrf_tokenUpdateDeliverySupplier']) && hash_equals($_SESSION['csrf_tokenUpdateDeliverySupplier'], $token);
}
function verifyCsrfTokenDeleteDeliverySupplier($token) {
    return isset($_SESSION['csrf_tokenDeleteDeliverySupplier']) && hash_equals($_SESSION['csrf_tokenDeleteDeliverySupplier'], $token);
}

// --------------------------------------- Delivery Client managment -------------------------------------------
function generateCsrfTokenCreateDeliveryClient() {
    if (!isset($_SESSION['csrf_tokenCreateDeliveryClient'])) {
        $_SESSION['csrf_tokenCreateDeliveryClient'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenCreateDeliveryClient'];
}
function generateCsrfTokenUpdateDeliveryClient() {
    if (!isset($_SESSION['csrf_tokenUpdateDeliveryClient'])) {
        $_SESSION['csrf_tokenUpdateDeliveryClient'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenUpdateDeliveryClient'];
}
function generateCsrfTokenDeleteDeliveryClient() {
    if (!isset($_SESSION['csrf_tokenDeleteDeliveryClient'])) {
        $_SESSION['csrf_tokenDeleteDeliveryClient'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['csrf_tokenDeleteDeliveryClient'];
}
function verifyCsrfTokenCreateDeliveryClient($token) {
    return isset($_SESSION['csrf_tokenCreateDeliveryClient']) && hash_equals($_SESSION['csrf_tokenCreateDeliveryClient'], $token);
}
function verifyCsrfTokenUpdateDeliveryClient($token) {
    return isset($_SESSION['csrf_tokenUpdateDeliveryClient']) && hash_equals($_SESSION['csrf_tokenUpdateDeliveryClient'], $token);
}
function verifyCsrfTokenDeleteDeliveryClient($token) {
    return isset($_SESSION['csrf_tokenDeleteDeliveryClient']) && hash_equals($_SESSION['csrf_tokenDeleteDeliveryClient'], $token);
}