// Importar la biblioteca Chart.js
import Chart from 'chart.js/auto';

// Datos iniciales para las gráficas (puedes obtener estos datos de tu base de datos)
const data1 = [10, 20, 30, 40, 50];
const data2 = [5, 15, 25, 35, 45];
const data3 = [15, 25, 35, 45, 55];

// Crear gráficas iniciales
const ctx1 = document.getElementById('chart1').getContext('2d');
const chart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            label: 'Gráfica 1',
            data: data1,
            backgroundColor: 'rgba(0, 123, 255, 0.5)'
        }]
    }
});

const ctx2 = document.getElementById('chart2').getContext('2d');
const chart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            label: 'Gráfica 2',
            data: data2,
            borderColor: 'rgba(255, 99, 132, 0.5)',
            fill: false
        }]
    }
});

const ctx3 = document.getElementById('chart3').getContext('2d');
const chart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            data: data3,
            backgroundColor: ['red', 'green', 'blue', 'yellow', 'purple']
        }]
    }
});

// Función para actualizar los datos de una gráfica
function updateChart(chartNum) {
    // Aquí deberías obtener los nuevos datos de tu base de datos y actualizar los datos de la gráfica correspondiente
    // Por ahora, generaremos datos aleatorios como ejemplo
    const newData = generateRandomData();
    
    if (chartNum === 1) {
        chart1.data.datasets[0].data = newData;
    } else if (chartNum === 2) {
        chart2.data.datasets[0].data = newData;
    } else if (chartNum === 3) {
        chart3.data.datasets[0].data = newData;
    }

    // Actualizar la gráfica
    chart1.update();
    chart2.update();
    chart3.update();
}

// Función para generar datos aleatorios
function generateRandomData() {
    return Array.from({ length: 5 }, () => Math.floor(Math.random() * 50));
}
