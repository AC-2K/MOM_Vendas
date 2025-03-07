$(document).ready(function () {

    let productCreate = [];
    let productUpdate = [];
    let productDelete = [];

    $('#productD_create').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        productCreate.push(formData); 
        if (productCreate.length > 0) {
            productCreate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/createDeliveryProduct.php', 
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
                                text: 'Produto criado',
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
            alert("No product to create.");
        }   
    }); 

    $('#productD_update').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        productUpdate.push(formData); 
        if (productUpdate.length > 0) {
            productUpdate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/updateDeliveryProduct.php', 
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
                                text: 'Produto Actualizado',
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
            alert("No product to update.");
        }   
    }); 

    $('#productD_delete').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        productDelete.push(formData); 
        if (productDelete.length > 0) {
            productDelete.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/deleteDeliveryProduct.php', 
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
                                text: 'Produto Removido',
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
            alert("No produtos to delete.");
        }    
    }); 

});