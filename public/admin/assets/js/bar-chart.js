

var products = $('#myChart').attr('data-chart');
const ten = [],
    sold = [],
    color = [];
var items = (JSON.parse(products));
items.map(item => {
    return ten.push(item.name) && sold.push(item.sold) && color.push(item.color);
})

const labels = ten;
const data = {
    labels: labels,
    datasets: [{
        label: 'Products Sold',
        backgroundColor: color,
        borderColor: 'rgb(255, 99, 132)',
        data: sold,

    }]
};
const config = {
    type: 'bar',
    data: data,
    options: {

    }
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);



var billChart = $('#billChart').attr('data-chart');
const date = [],
    total = [];
var itemBill = (JSON.parse(billChart));
itemBill.map(item => {
    return date.push(item.date) && total.push(item.total);
})

const labelsBill = date;
const dataBill = {
    labels: labelsBill,
    datasets: [{
        label: 'Total of month',
        backgroundColor: '#7474f0',
        borderColor: 'rgb(255, 99, 132)',
        data: total,

    }]
};
const configBill = {
    type: 'bar',
    data: dataBill,
    options: {

    }
};
const myChartBill = new Chart(
    document.getElementById('billChart'),
    configBill
);
