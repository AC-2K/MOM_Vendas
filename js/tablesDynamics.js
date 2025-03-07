// ------------------------------ tabela de vendas ----------------------------------

$('#yearSales').on('click', function() {
    const mes = $('#monthSales').val();
    const ano = $('#yearSales').val();

    $.ajax({
        url: 'methods/tableDeleteSales.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano  
        },
        success: function (data) {
            $('#tableDeleteSalesHTML').html(data);
            $('#tableDeleteSalesHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#monthSales').on('click', function() {
    const mes1 = $('#monthSales').val();
    const ano1 = $('#yearSales').val();

    $.ajax({
        url: 'methods/tableDeleteSales.php',
        type: 'POST',
        data: {
            mes: mes1, 
            ano: ano1  
        },
        success: function (data) {
            $('#tableDeleteSalesHTML').html(data);
            $('#tableDeleteSalesHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});
// --------------------------------------------------------------------------------------
// ------------------------------ tabela de Compras ----------------------------------

$('#yearPurchases').on('click', function() {
    const mes = $('#monthPurchases').val();
    const ano = $('#yearPurchases').val();

    $.ajax({
        url: 'methods/tableDeletePurchases.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano  
        },
        success: function (data) {
            $('#tableDeletePurchasesHTML').html(data);
            $('#tableDeletePurchasesHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#monthPurchases').on('click', function() {
    const mes1 = $('#monthPurchases').val();
    const ano1 = $('#yearPurchases').val();

    $.ajax({
        url: 'methods/tableDeletePurchases.php',
        type: 'POST',
        data: {
            mes: mes1, 
            ano: ano1  
        },
        success: function (data) {
            $('#tableDeletePurchasesHTML').html(data);
            $('#tableDeletePurchasesHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});
// --------------------------------------------------------------------------------------

// ------------------------------ tabela de Delivery ----------------------------------

$('#yearDelivery').on('click', function() {
    const mes = $('#monthDelivery').val();
    const ano = $('#yearDelivery').val();

    $.ajax({
        url: 'methods/tableDeleteDelivery.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano  
        },
        success: function (data) {
            $('#tableDeleteDeliveryHTML').html(data);
            $('#tableDeleteDeliveryHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#monthDelivery').on('click', function() {
    const mes1 = $('#monthDelivery').val();
    const ano1 = $('#yearDelivery').val();

    $.ajax({
        url: 'methods/tableDeleteDelivery.php',
        type: 'POST',
        data: {
            mes: mes1, 
            ano: ano1  
        },
        success: function (data) {
            $('#tableDeleteDeliveryHTML').html(data);
            $('#tableDeleteDeliveryHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});
// --------------------------------------------------------------------------------------

// ------------------------------ tabela de Delivery ----------------------------------

$('#yearPurchasesDelivery').on('click', function() {
    const mes = $('#monthPurchasesDelivery').val();
    const ano = $('#yearPurchasesDelivery').val();

    $.ajax({
        url: 'methods/tableDeletePurchasesDelivery.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano  
        },
        success: function (data) {
            $('#tableDeletePurchasesDeliveryHTML').html(data);
            $('#tableDeletePurchasesDeliveryHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#monthPurchasesDelivery').on('click', function() {
    const mes1 = $('#monthPurchasesDelivery').val();
    const ano1 = $('#yearPurchasesDelivery').val();

    $.ajax({
        url: 'methods/tableDeletePurchasesDelivery.php',
        type: 'POST',
        data: {
            mes: mes1, 
            ano: ano1  
        },
        success: function (data) {
            $('#tableDeletePurchasesDeliveryHTML').html(data);
            $('#tableDeletePurchasesDeliveryHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});
// --------------------------------------------------------------------------------------

// ------------------------------ tabela de listagem ----------------------------------
$('#mesListagemMensal').on('click', function() {
    const mes = $('#mesListagemMensal').val();
    const ano = $('#anoListagemMensal').val();
    const servico = $('#servicoListagemMensal').val();


    $.ajax({
        url: 'methods/tableListagemMensal.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano,
            servico: servico  
        },
        success: function (data) {
            $('#tableListagemMensalHTML').html(data);
            $('#tableListagemMensalHTML table').DataTable();

        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#anoListagemMensal').on('click', function() {
    const mes = $('#mesListagemMensal').val();
    const ano = $('#anoListagemMensal').val();
    const servico = $('#servicoListagemMensal').val();

    $.ajax({
        url: 'methods/tableListagemMensal.php',
        type: 'POST',
        data: {
            mes: mes, 
            ano: ano,
            servico: servico  
        },
        success: function (data) {
            $('#tableListagemMensalHTML').html(data);
            $('#tableListagemMensalHTML table').DataTable();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});

$('#servicoDia').on('click', function() {
    const dia = $('#dateDia').val();
    const servico = $('#servicoDia').val();

    $.ajax({
        url: 'methods/tableListagemDiario.php',
        type: 'POST',
        data: {
            dia: dia, 
            servico: servico  
        },
        success: function (data) {
            $('#tableListagemDiarioHTML').html(data);
            $('#tableListagemDiarioHTML table').DataTable(); 
        },
        error: function (xhr, status, error) {
            console.error("Error fetching data: " + error);
        }
    });
});