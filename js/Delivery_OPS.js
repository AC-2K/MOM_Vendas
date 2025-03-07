$(document).ready(function () {

    //Arrays que irao alojar objectos tratados no sistema 
    let listaApagarDelivery = [];
    let listaCriarDelivery = [];

    let hiddenValueArray = [];

    let csfr = [];

    //Inserir oportunidade na lista de submissao
    $('#Criar-ListaDelivery').on('click', function (e) {
        
            // dados do meeting
            let delivery = new Object();

            var emt = document.getElementById("clienteVendas");
            var value = emt.options[emt.selectedIndex].value;    
           // Get the selected option
           let selectedOption = document.getElementById('clienteVendas').selectedOptions[0];

           var emt2 = document.getElementById("supplierPurchases");
           var value2 = emt2.options[emt2.selectedIndex].value;    
            // Get the selected option
            let selectedOption2 = document.getElementById('produtoVendas').selectedOptions[0];
    
           // Get the value of the data-hidden attribute
           let hiddenValue = selectedOption.getAttribute('data-hiddenSalesClient')+' - '+selectedOption2.getAttribute('data-hiddenSalesProduct')+' - '+ document.getElementById("quantidadeVenda").value;
            hiddenValueArray.push(hiddenValue);
           
            delivery.cliente = document.getElementById("clienteVendas").value;
            delivery.produto = document.getElementById("produtoVendas").value;
            delivery.data = document.getElementById("dateVenda").value;
            delivery.quantidade = document.getElementById("quantidadeVenda").value;
            delivery.preco = document.getElementById("precoVenda").value;

            listaCriarDelivery.push(delivery);
            alert("Adicionado na lista de vendas: "+hiddenValue);
            
        // Optionally display the submitted opportunity description in the list
        $('#listagemDelivery').append('<p>' + hiddenValue +'</p>');
    }); 

    //Eliminar ultimo elemento da lista de submissão
    $('#Apagar-ListaDelivery').on('click', function () {
        if (listaCriarDelivery.length > 0) {
            var removedFormData = listaCriarDelivery.pop(); // Remove and return the last FormData
            alert("Removed last sales. Total items: " + listaCriarDelivery.length);
            // Update the displayed list of opportunities
            updateSalesDeliveryList();
        } else {
            alert("No sales to remove.");
        }   
    }); 
    // Função de efectuar update da lista de sales
    function updateSalesDeliveryList() {
        let salesDeliveryListElement = document.getElementById("listagemDelivery");
        salesDeliveryListElement.textContent = ''; // Clear the current list

        // Loop through the remaining items and display them - TODO: Acertar visualizacao de dados
        listaCriarDelivery.forEach(function(sales, index) {
            salesDeliveryListElement.textContent += 
        'Sales restantes: ' + (index + 1) + ' - ' + hiddenValueArray[index] + '||'+'\n';
        });

        // If no opportunities remain, show a message
        if (listaCriarDelivery.length === 0) {
            salesDeliveryListElement.textContent = ' ';
        }
    }

    //Enviar a lista de adição e obter a resposta correspondente
    $('#Executar-createDelivery').off('click').on('click', function () {

        csfr.push(document.getElementById("csrf_tokenCreateDelivery").value);

        const combinedJSONadd = {
            csfr: csfr,
            data: listaCriarDelivery
        };
        if (listaCriarDelivery.length > 0) {
            $('#Executar-createDelivery').prop('disabled', true);

            $.post("methods/createDelivery.php", {
                listaInsercao: JSON.stringify(combinedJSONadd)
            }).done(function(data) {
                $('#Executar-createDelivery').prop('disabled', false);
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
                        text: 'venda/s criado',
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

                    $('#Executar-createDelivery').prop('disabled', false);
                new PNotify({
                    title: 'Acesso negado',
                    text: 'Error de execução',
                    styling: 'bootstrap3'
                });
            });
            

        }else{
            alert("No sales to submit.");
        }
    });

    //Enviar a lista de eliminação e obter a resposta correspondente
    $('#tableDeleteDeliveryHTML').on('change', '.delete-checkbox-Delivery', function() {
        const checkboxValue = $(this).val();
        console.log("Checkbox changed, value:", checkboxValue);

        // If the checkbox is checked, add its value to the array
        if ($(this).prop('checked')) {
            if (!listaApagarDelivery.includes(checkboxValue)) {
                listaApagarDelivery.push(checkboxValue);
            }
        } else {
            // If the checkbox is unchecked, remove its value from the array
            const index = listaApagarDelivery.indexOf(checkboxValue);
            if (index !== -1) {
                listaApagarDelivery.splice(index, 1);
            }
        }
    });

    // Handle form submission or button click to send data to the backend
    $('#Executar-deleteDelivery').on('click', function() {
        const csrf_tokenDeleteDelivery = $('#csrf_tokenDeleteDelivery').val();
        console.log(listaApagarDelivery); 
        $.ajax({
            url: 'methods/deleteDelivery.php',
            type: 'POST',
            data: {
                listaApagarDelivery: listaApagarDelivery,  
                csrf_tokenDeleteDelivery: csrf_tokenDeleteDelivery 
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
                        text: 'Delivery/s apagado',
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

