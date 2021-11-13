@extends('admin.layout')
@section('admin')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Best Sale</h4>
                        </div>
                        <div id="ambarchart2" data-chart="{{ $data }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
//     if ($('#ambarchart2').length) {
//     console.log(1);
//     var chart = AmCharts.makeChart("ambarchart2", {
//         "type": "serial",
//         "addClassNames": true,
//         "theme": "light",
//         "autoMargins": false,
//         "marginLeft": 30,
//         "marginRight": 8,
//         "marginTop": 10,
//         "marginBottom": 26,
//         "balloon": {
//             "adjustBorderColor": false,
//             "horizontalPadding": 10,
//             "verticalPadding": 8,
//             "color": "#ffffff"
//         },

//         "dataProvider": [{
//             "name": 'test1',//product's name
//             "sold": 22, //quantity sold
//             // "expenses": 21.1,
//             "color": "#7474f0"
//         },
//         {
//             "name": 'test1',//product's name
//             "sold": 22, //quantity sold
//             // "expenses": 21.1,
//             "color": "#7474f0"
//         },
//         {
//             "name": 'test1',//product's name
//             "sold": 22, //quantity sold
//             // "expenses": 21.1,
//             "color": "#7474f0"
//         },
//         {
//             "name": 'test1',//product's name
//             "sold": 22, //quantity sold
//             // "expenses": 21.1,
//             "color": "#7474f0"
//         } ],
//         "valueAxes": [{
//             "axisAlpha": 0,
//             "position": "left"
//         }],
//         "startDuration": 1,
//         "graphs": [{
//             "alphaField": "alpha",
//             "balloonText": "<span style='font-size:12px;'>[[title]] of [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
//             "fillAlphas": 1,
//             "fillColorsField": "color",
//             "title": "quantity sold",
//             "type": "column",
//             "valueField": "sold",
//             "dashLengthField": "dashLengthColumn"
//         }, {
//             "id": "graph2",
//             "balloonText": "<span style='font-size:12px;'>[[title]] of [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
//             "bullet": "round",
//             "lineThickness": 3,
//             "bulletSize": 7,
//             "bulletBorderAlpha": 1,
//             "bulletColor": "#FFFFFF",
//             "lineColor": "#AA59FE",
//             "useLineColorForBulletBorder": true,
//             "bulletBorderThickness": 3,
//             "fillAlphas": 0,
//             "lineAlpha": 1,
//             "title": "Expenses",
//             "valueField": "expenses",
//             "dashLengthField": "dashLengthLine"
//         }],
//         "categoryField": "name",
//         "categoryAxis": {
//             "gridPosition": "start",
//             "axisAlpha": 0,
//             "tickLength": 0
//         },
//         "export": {
//             "enabled": false
//         }
//     });
// }
</script>

@endsection
