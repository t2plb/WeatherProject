function initChart(){
    const ctxtemp = $("#ChartTemp");
    const ctxhumi = $("#ChartHumi");
    window.myChart = new Chart(ctxtemp, {
        type: 'line',
        data: {
            datasets: [
                {
                    label: 'Température',
                    borderColor: 'rgb(250,0,0)'
                }
            ]
        }
    });
    window.ChartHumi = new Chart(ctxhumi, {
        type: 'line',
        data: {
            datasets: [
                {
                    label: 'Humidité',
                    borderColor: 'rgb(252,219,5)',
                }
            ]
        }
    });
}

function getData(){
    let from=moment.tz($('#dpFrom').datetimepicker('getValue'), 'Europe/Paris').unix(); //timestamp
    let to=moment.tz($('#dpTo').datetimepicker('getValue'), 'Europe/Paris').unix(); //timestamp

    console.log(`/reader.php?from=${from}&to=${to}`);
    $.get(`/reader.php?from=${from}&to=${to}`, function(values){
        console.log(values);
        //TODO charjs
        let datas = jQuery.parseJSON(values);

        removeData(window.myChart);
        removeData(window.ChartHumi);
        addData(window.myChart, datas.map(d => d.date), datas.map(d => d.temperature));
        addData(window.ChartHumi, datas.map(d => d.date), datas.map(d => d.humidite));
        /*
        datas.forEach(function(d){
            addData(window.myChart, d.date, d.temperature);
        });
         */

        /*
        let myChart = new Chart(ctxtemp, {
            type: 'line',
            data: {
                labels: datas.map(d => d.date),
                datasets: [
                    {
                        label: 'Température',
                        data: datas.map(d => d.temperature),
                        borderColor: 'rgb(250,0,0)'
                    }
                ]
            }
        });
        let ChartHumi = new Chart(ctxhumi, {
            type: 'line',
            data: {
                labels: datas.map(d => d.date),
                datasets: [
                    {
                        label: 'Humidité',
                        data: datas.map(d => d.humidite),
                        borderColor: 'rgb(252,219,5)',
                    }
                ]
            }
        });
         */
    });
}

function addData(chart, label, value) {
    console.log(label);
    console.log(value);
    if(typeof label === 'string' && typeof value === 'string'){
        chart.data.labels.push(label);
        chart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
        });
    }
    if(Array.isArray(label) && Array.isArray(value)){
        chart.data.labels = label;
        chart.data.datasets[0].data = value;
    }
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

$(document).ready(function(){

    $.datetimepicker.setDateFormatter('moment');

    $('.DatePicker').datetimepicker({
        lang: 'fr',
        ownerDocument: document,
        contentWindow: window,

        value: '',
        rtl: false,

        format: 'DD/MM/YYYY HH:mm',
        formatTime: 'HH:mm',
        formatDate: 'DD/MM/YYYY',
    });
    $('#dpFrom').datetimepicker('setOptions', {
        onChangeDateTime:function (dp, input){
            const format = 'DD/MM/YYYY';
            let minDate = moment(input.val() , 'DD/MM/YYYY HH:mm').add(1, 'days').format(format);
            $('#dpTo').datetimepicker('setOptions', {
                minDate: minDate,
                formatDate: format,
            });
        }
    });

    $('#btnSearch').on('click',getData);

    initChart();

});