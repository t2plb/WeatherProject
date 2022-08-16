<div class="row gif-yellow row-yellow">
    <div class="col-50 date-form">
        <input type="text" class="DatePicker" id="dpFrom"/>
        <input type="text" class="DatePicker" id="dpTo"/>
        <button type="button" id="btnSearch">Recherche</button>
    </div>
    <div class="col-50 text-end"></div>
         <img src="/lib/gif/meteo.gif" id="GifMeteo">
    </div>
</div>
<div class="row flex">
    <div class="col-50">
        <canvas id="chartTemp" width="200" height="400"></canvas>
    </div>
    <div class="col-50">
        <canvas id="chartHumid" width="200" height="400"></canvas>
    </div>
</div>

<script src="lib/js/jquery/jquery-3.6.0.min.js"></script>
<script src="lib/js/chartjs/chart.min.js"></script>
<script src="lib/js/momentjs/momentjs.js"></script>
<script src="https://momentjs.com/downloads/moment-timezone-with-data.min.js"></script>
<script src="lib/js/jquery/jquery.datetimepicker.js"></script>
<script src="lib/js/script/meteo.js"></script>