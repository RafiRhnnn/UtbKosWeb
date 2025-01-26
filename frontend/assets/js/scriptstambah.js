// Chart.js Example
const ctx = document.getElementById('profitChart').getContext('2d');
const profitChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            label: 'Total Profit',
            data: [12000, 15000, 17000, 14000, 20000],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
});