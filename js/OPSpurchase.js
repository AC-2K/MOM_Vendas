$(document).ready(function () {

    //Arrays que irao alojar objectos tratados no sistema 
    let listaApagarPurchases = [];
    let listaCriarPurchases= [];

    let hiddenValueArrayPurchases = [];

    let csfr = [];

    //Inserir oportunidade na lista de submissao
    $('#Criar-ListaPurchases').on('click', function (e) {
        
            // dados do meeting
            let purchases = new Object();

            var emt = document.getElementById("produtoPurchases");
            var value = emt.options[emt.selectedIndex].value;    
           // Get the selected option
           let selectedOption = document.getElementById('produtoPurchases').selectedOptions[0];
    
           // Get the value of the data-hidden attribute
           let hiddenValue = selectedOption.getAttribute('data-hiddenPurchase')+' - '+ document.getElementById("quantityPurchases").value;
           hiddenValueArrayPurchases.push(hiddenValue);
           
            purchases.produto = document.getElementById("produtoPurchases").value;
            purchases.quantidade = document.getElementById("quantityPurchases").value;
            purchases.data = document.getElementById("datePurchases").value;
            purchases.preco = document.getElementById("pricePurchases").value;
            purchases.fornecedor = document.getElementById("providerPurchases").value;

            listaCriarPurchases.push(purchases);
            alert("Adicionado na lista de compras: "+hiddenValue);
            
        // Optionally display the submitted opportunity description in the list
        $('#listagemCompras').append('<p>' + hiddenValue +'</p>');
    }); 

    //Eliminar ultimo elemento da lista de submissão
    $('#Apagar-ListaPurchases').on('click', function () {
        if (listaCriarPurchases.length > 0) {
            var removedFormData = listaCriarPurchases.pop(); // Remove and return the last FormData
            alert("Removed last purchases. Total items: " + listaCriarPurchases.length);
            // Update the displayed list of opportunities
            updatePurchasesList();
        } else {
            alert("No purchases to remove.");
        }   
    }); 
    // Função de efectuar update da lista de sales
    function updatePurchasesList() {
        let purchasesListElement = document.getElementById("listagemCompras");
        purchasesListElement.textContent = ''; // Clear the current list

        // Loop through the remaining items and display them - TODO: Acertar visualizacao de dados
        listaCriarPurchases.forEach(function(sales, index) {
            purchasesListElement.textContent += 
        'compras restantes: ' + (index + 1) + ' - ' + hiddenValueArrayPurchases[index] + '||'+'\n';
        });

        // If no opportunities remain, show a message
        if (listaCriarPurchases.length === 0) {
            purchasesListElement.textContent = ' ';
        }
    }


    //Enviar a lista de adição e obter a resposta correspondente
    $('#Executar-createPurchase').off('click').on('click', function () {

        csfr.push(document.getElementById("csrf_tokenCreatePurchase").value);

        const combinedJSONadd = {
            csfr: csfr,
            data: listaCriarPurchases
        };
        if (listaCriarPurchases.length > 0) {
            $('#Executar-createPurchase').prop('disabled', true);

            $.post("methods/createPurchase.php", {
                listaInsercao: JSON.stringify(combinedJSONadd)
            }).done(function(data) {
                $('#Executar-createPurchase').prop('disabled', false);
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
                        window.location.href = "mainMenu.php";
                    }, 2000);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Error handling logic here
                    console.error('Request failed:', textStatus, errorThrown);
                    console.error('Full response:', jqXHR);

                    $('#Executar-createPurchase').prop('disabled', false);
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
    $('#tableDeletePurchasesHTML').on('change', '.delete-checkbox-sales', function() {
        const checkboxValue = $(this).val();
        console.log("Checkbox changed, value:", checkboxValue);

        // If the checkbox is checked, add its value to the array
        if ($(this).prop('checked')) {
            if (!listaApagarPurchases.includes(checkboxValue)) {
                listaApagarPurchases.push(checkboxValue);
            }
        } else {
            // If the checkbox is unchecked, remove its value from the array
            const index = listaApagarPurchases.indexOf(checkboxValue);
            if (index !== -1) {
                listaApagarPurchases.splice(index, 1);
            }
        }
    });

    // Handle form submission or button click to send data to the backend
    $('#Executar-deletePurchases').on('click', function() {
        const csrf_tokenDeletePurchase = $('#csrf_tokenDeletePurchase').val();
        console.log(listaApagarPurchases); 
        $.ajax({
            url: 'methods/deletePurchase.php',
            type: 'POST',
            data: {
                listaApagarPurchases: listaApagarPurchases,  
                csrf_tokenDeletePurchase: csrf_tokenDeletePurchase 
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
                        window.location.href = "mainMenu.php";
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
                        window.location.href = "mainMenu.php";
                    }, 2000);
                }                        },
            error: function (jqXHR, textStatus, errorThrown) {
                new PNotify({
                    title: 'Acesso negado',
                    text: 'Error de execução',
                    styling: 'bootstrap3'
                });
                setTimeout(function() {
                    window.location.href = "mainMenu.php";
                }, 2000);
            },
        });
    });
}); 

