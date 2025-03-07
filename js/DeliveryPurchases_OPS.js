$(document).ready(function () {

    //Arrays que irao alojar objectos tratados no sistema 
    let listaApagarDeliveryPurchases = [];
    let listaCriarDeliveryPurchases= [];

    let hiddenValueArrayDeliveryPurchase = [];

    let csfr = [];

    //Inserir oportunidade na lista de submissao
    $('#Criar-ListaPurchasesDelivery').on('click', function (e) {
        
            // dados do meeting
            let purchasesDelivery = new Object();

            var emt = document.getElementById("produtoPurchases");
            var value = emt.options[emt.selectedIndex].value;    
           // Get the selected option
           let selectedOption = document.getElementById('produtoPurchases').selectedOptions[0];

           var emt2 = document.getElementById("supplierPurchases");
           var value2 = emt2.options[emt2.selectedIndex].value;    
          // Get the selected option
          let selectedOption2 = document.getElementById('supplierPurchases').selectedOptions[0];
    
           // Get the value of the data-hidden attribute
           let hiddenValue = selectedOption.getAttribute('data-hiddenDeliveryPurchaseProduct')+' - Fornecedor: '+selectedOption2.getAttribute('data-hiddenDeliveryPurchaseSupplier')+' - '+ document.getElementById("quantityPurchases").value;
           hiddenValueArrayDeliveryPurchase.push(hiddenValue);
           
           purchasesDelivery.produto = document.getElementById("produtoPurchases").value;
           purchasesDelivery.fornecedor = document.getElementById("supplierPurchases").value;
           purchasesDelivery.data = document.getElementById("datePurchases").value;
           purchasesDelivery.quantidade = document.getElementById("quantityPurchases").value;
           purchasesDelivery.preco = document.getElementById("pricePurchases").value;

           listaCriarDeliveryPurchases.push(purchasesDelivery);
            alert("Adicionado na lista de compras: "+hiddenValue);
            
        // Optionally display the submitted opportunity description in the list
        $('#listagemComprasDelivery').append('<p>' + hiddenValue +'</p>');
    }); 

    //Eliminar ultimo elemento da lista de submissão
    $('#Apagar-ListaPurchasesDelivery').on('click', function () {
        if (listaCriarDeliveryPurchases.length > 0) {
            var removedFormData = listaCriarDeliveryPurchases.pop(); // Remove and return the last FormData
            alert("Removed last purchases. Total items: " + listaCriarDeliveryPurchases.length);
            // Update the displayed list of opportunities
            updateDeliveryPurchasesList();
        } else {
            alert("No purchases to remove.");
        }   
    }); 
    // Função de efectuar update da lista de sales
    function updateDeliveryPurchasesList() {
        let deliveryPurchasesListElement = document.getElementById("listagemComprasDelivery");
        deliveryPurchasesListElement.textContent = ''; // Clear the current list

        // Loop through the remaining items and display them - TODO: Acertar visualizacao de dados
        listaCriarDeliveryPurchases.forEach(function(deliveryPurchases, index) {
            deliveryPurchasesListElement.textContent += 
        'Compras restantes restantes: ' + (index + 1) + ' - ' + hiddenValueArrayDeliveryPurchase[index] + '||'+'\n';
        });

        // If no opportunities remain, show a message
        if (listaCriarDeliveryPurchases.length === 0) {
            deliveryPurchasesListElement.textContent = ' ';
        }
    }


    //Enviar a lista de adição e obter a resposta correspondente
    $('#Executar-createPurchaseDelivery').off('click').on('click', function () {

        csfr.push(document.getElementById("csrf_tokenCreateDeliveryPurchase").value);

        const combinedJSONadd = {
            csfr: csfr,
            data: listaCriarDeliveryPurchases
        };
        if (listaCriarDeliveryPurchases.length > 0) {
            $('#Executar-createPurchaseDelivery').prop('disabled', true);

            $.post("methods/createDeliveryPurchase.php", {
                listaInsercao: JSON.stringify(combinedJSONadd)
            }).done(function(data) {
                $('#Executar-createPurchaseDelivery').prop('disabled', false);
                const jsonData = JSON.parse(data);
                if(jsonData == "1"){
                    new PNotify({
                        title: 'Erro',
                        text: 'Inseriu dados invalidos',
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }if(jsonData == "0"){
                    console.log("Sucesso");
                    new PNotify({
                        title: 'Sucesso',
                        text: 'compra/s criado',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    setTimeout(function() {
                        window.location.href = "delivery.php";
                    }, 2000);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Error handling logic here
                    console.error('Request failed:', textStatus, errorThrown);
                    console.error('Full response:', jqXHR);

                    $('#Executar-createPurchaseDelivery').prop('disabled', false);
                new PNotify({
                    title: 'Acesso negado',
                    text: 'Error de execução',
                    styling: 'bootstrap3'
                });
            });
            

        }else{
            alert("No purchases to submit.");
        }
    });

    //Enviar a lista de eliminação e obter a resposta correspondente
    $('#tableDeletePurchasesDeliveryHTML').on('change', '.delete-checkbox-DeliveryPurchases', function() {
        const checkboxValue = $(this).val();
        console.log("Checkbox changed, value:", checkboxValue);

        // If the checkbox is checked, add its value to the array
        if ($(this).prop('checked')) {
            if (!listaApagarDeliveryPurchases.includes(checkboxValue)) {
                listaApagarDeliveryPurchases.push(checkboxValue);
            }
        } else {
            // If the checkbox is unchecked, remove its value from the array
            const index = listaApagarDeliveryPurchases.indexOf(checkboxValue);
            if (index !== -1) {
                listaApagarDeliveryPurchases.splice(index, 1);
            }
        }
    });

    // Handle form submission or button click to send data to the backend
    $('#Executar-deleteDeliveryPurchases').on('click', function() {
        const csrf_tokenDeleteDeliveryPurchase = $('#csrf_tokenDeleteDeliveryPurchase').val();
        console.log(listaApagarDeliveryPurchases); 
        $.ajax({
            url: 'methods/deleteDeliveryPurchases.php',
            type: 'POST',
            data: {
                listaApagarDeliveryPurchases: listaApagarDeliveryPurchases,  
                csrf_tokenDeleteDeliveryPurchase: csrf_tokenDeleteDeliveryPurchase 
            },
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
                        window.location.href = "delivery.php";
                    }, 1500);
                }if(jsonData == "0"){
                    console.log("Sucesso");
                    new PNotify({
                        title: 'Sucesso',
                        text: 'Compra/s apagado',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    setTimeout(function() {
                        window.location.href = "delivery.php";
                    }, 2000);
                }                        },
            error: function (jqXHR, textStatus, errorThrown) {
                new PNotify({
                    title: 'Acesso negado',
                    text: 'Error de execução',
                    styling: 'bootstrap3'
                });
                setTimeout(function() {
                    window.location.href = "delivery.php";
                }, 2000);
            },
        });
    });
}); 

