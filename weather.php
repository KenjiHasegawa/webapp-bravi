<?php
require_once('layout_header.php');

$appid = 'b14838bca17736e892facc7bb05046d2';
if(isset($_GET) and isset($_GET['input'])){
    $city = $_GET['input'];
    echo "<script>
            appid = '".$appid."'
            city =  '".$city."'
            $.getJSON('http://api.openweathermap.org/data/2.5/weather?units=metric&APPID='+appid+'&q='+city, function ( data ) {
                console.log(data);
                html = '<tr><td>City, Country</td><td>'+data['name']+', '+data['sys'].country+'</td></tr>';
                html += '<tr><td>Conditions</td><td> With '+data['weather'][0].description+'</td></tr>';
                html += '<tr><td>Current Temperature</td><td>'+data['main'].temp+'&deg;C</td></tr>';
                html += '<tr><td>Max / Min</td><td>'+data['main'].temp_max+'&deg;C / '+data['main'].temp_min+'&deg;C</td></tr>';
                html += '<tr><td>Humidity</td><td>'+data['main'].humidity+' %</td></tr>';
                html += '<tr><td>Wind Speed</td><td>'+data['wind'].speed+' m/s</td></tr>';
    
                document.getElementById('result_body').innerHTML = html;
    
            }); 
         </script>";
}
?>


    <div class='page-header'>
        <h1>Current Weather</h1>
    </div>

    <form name="weather" method="get" action="">
        <div class="col-md-5">
            <textarea class="form-control" rows="1" id="input" name="input"></textarea>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Show me the weather!</button>
        </div>
        <div class="col-md-5"></div>
    </form>

    <hr/><br><br>

    <div id="result">
        <table class="table table-striped table-bordered">
            <tbody id="result_body">

            </tbody>
        </table>
    </div>

<?php



require_once('layout_footer.php');
?>