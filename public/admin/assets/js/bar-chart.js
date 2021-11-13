
if ($('#ambarchart2').length) {

    var test = $('#ambarchart2').attr('data-chart');
    console.log(test);

    var chart = AmCharts.makeChart("ambarchart2", {
        "type": "serial",
        "addClassNames": true,
        "theme": "light",
        "autoMargins": false,
        "marginLeft": 30,
        "marginRight": 8,
        "marginTop": 10,
        "marginBottom": 26,
        "balloon": {
            "adjustBorderColor": false,
            "horizontalPadding": 10,
            "verticalPadding": 8,
            "color": "#ffffff"
        },

        // "dataProvider": [{"name":"aaaa","sold":10,"color":"#7474f0"}],
        // "dataProvider": test,
        "dataProvider": [],

        "valueAxes": [{
            "axisAlpha": 0,
            "position": "left"
        }],
        "startDuration": 1,
        "graphs": [{
            "alphaField": "alpha",
            "balloonText": "<span style='font-size:12px;'>[[title]] of [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
            "fillAlphas": 1,
            "fillColorsField": "color",
            "title": "quantity sold",
            "type": "column",
            "valueField": "sold",
            "dashLengthField": "dashLengthColumn"
        }, {
            "id": "graph2",
            "balloonText": "<span style='font-size:12px;'>[[title]] of [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
            "bullet": "round",
            "lineThickness": 3,
            "bulletSize": 7,
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "lineColor": "#AA59FE",
            "useLineColorForBulletBorder": true,
            "bulletBorderThickness": 3,
            "fillAlphas": 0,
            "lineAlpha": 1,
            "title": "Expenses",
            "valueField": "expenses",
            "dashLengthField": "dashLengthLine"
        }],
        "categoryField": "name",
        "categoryAxis": {
            "gridPosition": "start",
            "axisAlpha": 0,
            "tickLength": 0
        },
        "export": {
            "enabled": false
        }
    });

    // forEach(test, function (element) {
    //     chart.dataProvider = a = [
    //         { "name": element['name'], "sold": element['sold'], "color": element['color'] }
    //     ]
    // });
    // console.log(a);
    // var json = [
    //     { 'red': '#f00' },
    //     { 'green': '#0f0' },
    //     { 'blue': '#00f' }
    //    ];
    // test.forEach(item => console.log(item));
    chart.validateData();
}
