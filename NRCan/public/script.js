function fetchDataAndPopulateChart() {
    fetch('../Model/fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const labels = data.labels;
            const values = data.data;

            const ctx = document.getElementById('energyChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Times Applicable',
                        data: values,
                        backgroundColor: '#e6ffe6',
                        borderColor: '#000000',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}
