$('#DatePicker').datetimepicker({
    //option
});
$(document).ready(function(){
    const ctxtemp = $("#ChartTemp");
    const ctxhumi = $("#ChartHumi");
    let from='2022-04-12 18:23:00'; //timestamp
    let to='2022-04-12 20:02:00'; //timestamp
    console.log('Getting data');
    $.get(`/reader.php?from=${from}&to=${to}`, function(values){
        console.log(values);
        //TODO charjs
        let datas = jQuery.parseJSON(values);
        console.log(datas.map(d => d.date));
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
    });
});