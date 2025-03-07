$(document).ready(function () {

    //Arrays que irao alojar objectos tratados no sistema 
    let listaApagarSales = [];
    let listaCriarSales = [];

    let hiddenValueArray = [];

    let csfr = [];

    //Inserir oportunidade na lista de submissao
    $('#Criar-ListaSales').on('click', function (e) {
        
            // dados do meeting
            let sales = new Object();

            var emt = document.getElementById("RefeicaoSales");
            var value = emt.options[emt.selectedIndex].value;    
           // Get the selected option
           let selectedOption = document.getElementById('RefeicaoSales').selectedOptions[0];
    
           // Get the value of the data-hidden attribute
           let hiddenValue = selectedOption.getAttribute('data-hiddenSales')+' - '+ document.getElementById("SalesQuantidade").value;
            hiddenValueArray.push(hiddenValue);
           
            sales.refeicao = document.getElementById("RefeicaoSales").value;
            sales.quantidade = document.getElementById("SalesQuantidade").value;
            sales.date = document.getElementById("SalesDate").value;

            listaCriarSales.push(sales);
            alert("Adicionado na lista de vendas: "+hiddenValue);
            
        // Optionally display the submitted opportunity description in the list
        $('#listagemVendas').append('<p>' + hiddenValue +'</p>');
    }); 

    //Eliminar ultimo elemento da lista de submissão
    $('#Apagar-ListaSales').on('click', function () {
        if (listaCriarSales.length > 0) {
            var removedFormData = listaCriarSales.pop(); // Remove and return the last FormData
            alert("Removed last sales. Total items: " + listaCriarSales.length);
            // Update the displayed list of opportunities
            updateSalesList();
        } else {
            alert("No sales to remove.");
        }   
    }); 
    // Função de efectuar update da lista de sales
    function updateSalesList() {
        let salesListElement = document.getElementById("listagemVendas");
        salesListElement.textContent = ''; // Clear the current list

        // Loop through the remaining items and display them - TODO: Acertar visualizacao de dados
        listaCriarSales.forEach(function(sales, index) {
            salesListElement.textContent += 
        'Sales restantes: ' + (index + 1) + ' - ' + hiddenValueArray[index] + '||'+'\n';
        });

        // If no opportunities remain, show a message
        if (listaCriarSales.length === 0) {
            salesListElement.textContent = ' ';
        }
    }

    //TODO - Efectuar a insercao de dados
    //Enviar a lista de adição e obter a resposta correspondente
    $('#Executar-createSales').off('click').on('click', function () {

        csfr.push(document.getElementById("csrf_tokenCreateSales").value);

        const combinedJSONadd = {
            csfr: csfr,
            data: listaCriarSales
        };
        if (listaCriarSales.length > 0) {
            $('#Executar-createSales').prop('disabled', true);

            $.post("methods/createSale.php", {
                listaInsercao: JSON.stringify(combinedJSONadd)
            }).done(function(data) {
                $('#Executar-createSales').prop('disabled', false);
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
                        window.location.href = "mainMenu.php";
                    }, 2000);
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                    // Error handling logic here
                    console.error('Request failed:', textStatus, errorThrown);
                    console.error('Full response:', jqXHR);

                    $('#Executar-createSales').prop('disabled', false);
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
    $('#tableDeleteSalesHTML').on('change', '.delete-checkbox-sales', function() {
        const checkboxValue = $(this).val();
        console.log("Checkbox changed, value:", checkboxValue);

        // If the checkbox is checked, add its value to the array
        if ($(this).prop('checked')) {
            if (!listaApagarSales.includes(checkboxValue)) {
                listaApagarSales.push(checkboxValue);
            }
        } else {
            // If the checkbox is unchecked, remove its value from the array
            const index = listaApagarSales.indexOf(checkboxValue);
            if (index !== -1) {
                listaApagarSales.splice(index, 1);
            }
        }
    });

    // Handle form submission or button click to send data to the backend
    $('#Executar-deleteSales').on('click', function() {
        const csrf_tokenDeleteSales = $('#csrf_tokenDeleteSales').val();
        console.log(listaApagarSales); 
        $.ajax({
            url: 'methods/deleteSale.php',
            type: 'POST',
            data: {
                listaApagarSales: listaApagarSales,  
                csrf_tokenDeleteSales: csrf_tokenDeleteSales 
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
                        text: 'Venda/s apagado',
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

