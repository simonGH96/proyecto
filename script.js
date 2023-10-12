// Cargar datos (simulados) desde una fuente (base de datos o archivo JSON)
const data = {
    labels: ['Estudiante 1', 'Estudiante 2', 'Estudiante 3', 'Estudiante 4'],
    datasets: [{
        label: 'Desempeño',
        data: [80, 75, 90, 85], // Datos simulados
        backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(54, 162, 235, 0.6)'],
        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)'],
        borderWidth: 1
    }]
};

const chartOptions = {
    scales: {
        y: {
            beginAtZero: true,
            max: 100 // Ajusta el valor máximo según tus necesidades
        }
    }
};

const ctx = document.getElementById('performance-chart').getContext('2d');
const performanceChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: chartOptions
});
