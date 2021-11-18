

var products = $('#myChart').attr('data-chart');
// console.log(products);
const ten = [],
    sold = [],
    color = [];

var items = (JSON.parse(products));
items.map(item => {
    return ten.push(item.name) && sold.push(item.sold) && color.push(item.color);
})
// console.log(ten);


const labels = ten;
const data = {
    labels: labels,
    datasets: [{
        label: 'Products Sold',
        // backgroundColor: 'rgb(255, 99, 132)',
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
