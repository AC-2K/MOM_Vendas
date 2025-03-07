
//Autenticacao de usuarios para aceder o sistema 
function autenticacao(){
    // Buscar input values
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    
    $.post("methods/autenticacao.php", {
        eco: username,
        first: password
    }).done(function(data) {
        // Buscar ficheiro JSON do php e alterar credenciais
        const jsonData = JSON.parse(data);
        if(jsonData[0] == '0'){
            new PNotify({
                title: 'Acesso negado',
                text: 'Inseriu dados invalidos',
                type: 'error',
                styling: 'bootstrap3'
            });
        }
        if(jsonData[0] == '1'){
            new PNotify({
                title: 'Acesso permitido',
                text: 'Bem vindo '+jsonData[1],
                type: 'success',
                styling: 'bootstrap3'
            });
            setTimeout(function() {
                window.location.href = "mainMenu.php";
              }, 1000);
        }
    }).fail(function() {
        new PNotify({
            title: 'Acesso negado',
            text: 'Erro servidor',
            styling: 'bootstrap3'
        });
    });
}

//Metodo de tratamento de saida do programa, com handling das sessoes 
function sairSistema(){
    $.post("methods/sair.php", {

    }).done(function(data) {
        const jsonData = JSON.parse(data);
        if(jsonData[0] == '1'){
            new PNotify({
                title: 'Saida do sistema',
                text: 'Adeus',
                type: 'success',
                styling: 'bootstrap3'
            });
            console.log("Notify");
             setTimeout(function() {
                window.location.href = "index.html";
              }, 1000); 
        }else{
            new PNotify({
                title: 'Saida forçado',
                text: 'Sistema forçou saida',
                styling: 'bootstrap3'
            });
            setTimeout(function() {
                window.location.href = "index.html";
              }, 1000);
        }
    }).fail(function() {
        new PNotify({
            title: 'Acesso negado',
            text: 'Erro servidor - saida forçado',
            styling: 'bootstrap3'
        });
        setTimeout(function() {
            window.location.href = "index.html";
          }, 1000);
    }); 
}

