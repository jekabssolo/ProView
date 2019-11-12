google.charts.load('current', {'packages':['corechart']});
function budgetChart(budget){

    google.charts.setOnLoadCallback(drawBudgetChart);
    function drawBudgetChart() {

        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        title: 'Šī projekta budžets',
        colors: ['red', 'green']
        };

        var chart = new google.visualization.PieChart(document.getElementById('budgetPie'));

        chart.draw(data, options);
    }
};

function allBudgetChart(budget){
    google.charts.setOnLoadCallback(dravAllBudgetChart);
    function dravAllBudgetChart() {

        var data = google.visualization.arrayToDataTable(budget);

        var options = {
        title: 'Kopējais budžets',
        colors: ['red', 'green']
        };

        var chart = new google.visualization.PieChart(document.getElementById('allBudgetPie'));

        chart.draw(data, options);
    }
};