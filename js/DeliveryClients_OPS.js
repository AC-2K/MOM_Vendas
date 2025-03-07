$(document).ready(function () {

    let clientCreate = [];
    let clientUpdate = [];
    let clientDelete = [];

    $('#client_create').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        clientCreate.push(formData); 
        if (clientCreate.length > 0) {
            clientCreate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/createClient.php', 
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
                                text: 'Cliente criado',
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
            alert("No clients to create.");
        }   
    }); 

    $('#client_update').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        clientUpdate.push(formData); 
        if (clientUpdate.length > 0) {
            clientUpdate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/updateClient.php', 
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
                                text: 'Cliente Actualizado',
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
            alert("No client to update.");
        }   
    }); 

    $('#client_delete').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        clientDelete.push(formData); 
        if (clientDelete.length > 0) {
            clientDelete.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/deleteClient.php', 
                    type: 'POST',
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
                                text: 'Cliente Removido',
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
            alert("No clients to delete.");
        }    
    }); 

});