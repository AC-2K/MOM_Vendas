$(document).ready(function () {
    let supplierCreate = [];
    let supplierUpdate = [];
    let supplierDelete = [];

    $('#supplier_create').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        supplierCreate.push(formData); 
        if (supplierCreate.length > 0) {
            supplierCreate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/createSupplier.php', 
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tell jQuery not to set content type
                    processData: false, // Tell jQuery not to process the data
                    success: function (result) {
                        const jsonData = JSON.parse(result);
                        if(jsonData == "1"){
                            new PNotify({
                                title: 'Erro',
                                text: 'Inseriu dados invalidos',
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Fornecedor criado',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 2000);
                        }                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        new PNotify({
                            title: 'Acesso negado',
                            text: 'Error de execução',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function() {
                            window.location.href ="delivery.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No supplier to create.");
        }   
    }); 

    $('#supplier_Update').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        supplierUpdate.push(formData); 
        if (supplierUpdate.length > 0) {
            supplierUpdate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/updateSupplier.php', 
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tell jQuery not to set content type
                    processData: false, // Tell jQuery not to process the data
                    success: function (result) {
                        const jsonData = JSON.parse(result);
                        if(jsonData == "1"){
                            new PNotify({
                                title: 'Erro',
                                text: 'Inseriu dados invalidos',
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Fornecedor Actualizado',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 2000);
                        }                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        new PNotify({
                            title: 'Acesso negado',
                            text: 'Error de execução',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function() {
                            window.location.href ="delivery.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No suppliers to update.");
        }   
    }); 

    $('#supplier_delete').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        supplierDelete.push(formData); 
        if (supplierDelete.length > 0) {
            supplierDelete.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/deleteSupplier.php', 
                    type: 'POST',
                    data: formData,
                    contentType: false, // Tell jQuery not to set content type
                    processData: false, // Tell jQuery not to process the data
                    success: function (result) {
                        const jsonData = JSON.parse(result);
                        if(jsonData == "1"){
                            new PNotify({
                                title: 'Erro',
                                text: 'Inseriu dados invalidos',
                                type: 'error',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Fornecedor Removido',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="delivery.php";
                            }, 2000);
                        }                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        new PNotify({
                            title: 'Acesso negado',
                            text: 'Error de execução',
                            styling: 'bootstrap3'
                        });
                        setTimeout(function() {
                            window.location.href ="delivery.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No suppliers to delete.");
        }    
    }); 

});