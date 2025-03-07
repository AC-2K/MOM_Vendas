$(document).ready(function () {

    let mealCreate = [];
    let mealUpdate = [];
    let mealDelete = [];

    $('#meal_create').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        mealCreate.push(formData); 
        if (mealCreate.length > 0) {
            mealCreate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/createMeal.php', 
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
                                window.location.href ="mainMenu.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Refeicao criado',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="mainMenu.php";
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
                            window.location.href ="mainMenu.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No meals to create.");
        }   
    }); 

    $('#meal_update').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        mealUpdate.push(formData); 
        if (mealUpdate.length > 0) {
            mealUpdate.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/updateMeal.php', 
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
                                window.location.href ="mainMenu.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Refeicao actualizado',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="mainMenu.php";
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
                            window.location.href ="mainMenu.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No meal to update.");
        }   
    }); 

    $('#meal_delete').on('submit', function (e) {
        e.preventDefault(); 

        // Create a new FormData object for the current form
        var formData = new FormData(this);
        mealDelete.push(formData); 
        if (mealDelete.length > 0) {
            mealDelete.forEach(function (formData, index) {
                $.ajax({
                    url: 'methods/deleteMeal.php', 
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
                                window.location.href ="mainMenu.php";
                            }, 1500);
                        }if(jsonData == "0"){
                            console.log("Sucesso");
                            new PNotify({
                                title: 'Sucesso',
                                text: 'Refeicao apagado',
                                type: 'success',
                                styling: 'bootstrap3'
                            });
                            setTimeout(function() {
                                window.location.href ="mainMenu.php";
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
                            window.location.href ="mainMenu.php";
                        }, 3000);
                    },
                });
            });
        } else {
            alert("No meal to delete.");
        }    
    }); 

});