google.charts.load('current', {'packages':['corechart']});
function budgetChart(budget){

    google.charts.setOnLoadCallback(drawBudgetChart);
    function drawBudgetChart() {

        var data = google.visualization.arrayToDataTable(budget);
        var options = {
            // title: 'Šī projekta budžets',
            sliceVisibilityThreshold: .01,
            pieResidueSliceLabel: "Budžets ir pārak mazs, lai tiktu attēlots",
            colors: ['#EB5757', '#27AE60'],
            legend: {position: 'bottom'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('budgetPie'));

        chart.draw(data, options);
    }
};

function allBudgetChart(budget){
    google.charts.setOnLoadCallback(drawAllBudgetChart);
    function drawAllBudgetChart() {
        var data = google.visualization.arrayToDataTable(budget);

        var options = {
            // title: 'Projekta budžets no visas sekcijas budžeta',        
            sliceVisibilityThreshold: .01,
            pieResidueSliceLabel: "Budžets ir pārak mazs, lai tiktu attēlots",
            colors: ['#EB5757', '#27AE60'],
            legend: { position: 'bottom' }
        };

        var chart = new google.visualization.PieChart(document.getElementById('allBudgetPie'));

        chart.draw(data, options);
    }
};

function budgetBySection(budget){
    google.charts.setOnLoadCallback(drawBudgetBySection);
    function drawBudgetBySection() {
        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        // title: 'Budžeta sadalījums pēc vidēja termiņa prioritātēm',
            colors: ['red', 'green', 'purple', 'orange', 'brown'],
            legend: {position: 'left'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('budgetBySection'));

        chart.draw(data, options);
    }
};

function projectsByFinancier(budget){
    google.charts.setOnLoadCallback(drawProjectsByFinancier);
    function drawProjectsByFinancier() {
        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        // title: 'Projektu sadalījums pēc finansētāja',
            legend: { position: 'none' }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('projectsByFinancier'));

        chart.draw(data, options);
    }
};

function moneyByFinancier(budget){
    google.charts.setOnLoadCallback(drawMoneyByFinancier);
    function drawMoneyByFinancier() {
        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        // title: 'Finansējuma apjoms pēc finansētāja',
            legend: { position: 'none' }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('moneyByFinancier'));

        chart.draw(data, options);
    }
};

function projectsInSection(budget){
    google.charts.setOnLoadCallback(drawProjectsInSection);
    function drawProjectsInSection() {
        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        // title: 'Projektu daudzums pēc vidēja termiņa prioritātēm',
            legend: { position: 'none' }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('projectsInSection'));

        chart.draw(data, options);
    }projectsInSection
};