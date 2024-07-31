function validateForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == "" || password == "") {
        alert("Username and Password must be filled out");
        return false;
    }
    return true;
}

// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get the canvas element by its ID
    var ctx = document.getElementById('myPieChart').getContext('2d');

    // Create a new Chart instance
    var myPieChart = new Chart(ctx, {
        type: 'pie', // Specify the chart type
        data: {
            labels: ['No Id', 'Improper Clothing', 'No BSU Logo Pin', 'Earring', 'Skin Tattoo'], // Add your labels
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3], // Add your data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Sample Pie Chart'
                }
            }
        }
    });
});
