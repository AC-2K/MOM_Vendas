function populate30Years(selectId) {
    const selectElement = document.getElementById(selectId);
    const currentYear = new Date().getFullYear();

    for (let i = 0; i < 30; i++) {
        const year = currentYear - i;
        const option = document.createElement("option");
        option.value = year;
        option.textContent = year;
        selectElement.appendChild(option);
    }
}

function populateMonths(selectId) {
    const selectElement = document.getElementById(selectId);
    const monthLabels = [
        { name: "Janeiro", value: 1 }, 
        { name: "Fevereiro", value: 2 },
        { name: "Março", value: 3 },
        { name: "Abril", value: 4 },
        { name: "Maio", value: 5 },
        { name: "Junho", value: 6 },
        { name: "Julho", value: 7 },
        { name: "Agosto", value: 8 },
        { name: "Setembro", value: 9 },
        { name: "Outubro", value: 10 },
        { name: "Novembro", value: 11 },
        { name: "Dezembro", value: 12 }
    ];


    for (let i = 0; i < monthLabels.length; i++) {
        const option = document.createElement("option");
        option.value = monthLabels[i].value; 
        option.textContent = monthLabels[i].name; 
        selectElement.appendChild(option);
    }
}