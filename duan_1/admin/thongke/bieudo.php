<div class="row">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
    google.charts.load('current',{packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    // Set Data
    const data = google.visualization.arrayToDataTable([
    ['Month', 'Bookings'],
    <?php 
        foreach($listBieuDo as $bieuDo) {
            extract($bieuDo);
            echo "['".$bieudo['month']."', '".$bieuDo['total_orders']."'],";
        }
    ?>

    
    ]);
    // Set Options
    const options = {
    title: 'Monthly Bookings',
    hAxis: {title: 'Month'},
    vAxis: {title: 'Bookings'},
    legend: 'none'
    };
    // Draw
    const chart = new google.visualization.LineChart(document.getElementById('myChart'));
    chart.draw(data, options);
    }
</script>
</div>