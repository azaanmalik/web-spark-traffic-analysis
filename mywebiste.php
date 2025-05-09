<?php include 'track.php'; ?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_spark";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['email'])) {
    echo "Unauthorized access";
    exit;
}

$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT Id FROM register WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "User not found";
    exit;
}

$row = $result->fetch_assoc();
$user_id = $row['Id'];

// Fetch websites
$query = "SELECT * FROM websites WHERE Id = '$user_id'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Websites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <style>
        .chart-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .chart-box {
            width: 100px;
            height: 100px;
        }
        .card-analysis {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .table-sm td, .table-sm th {
            padding: 0.3rem;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Analyze Traffic</h2>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>Website Name</th>
                <th>URL</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><a href="<?= htmlspecialchars($row['url']) ?>" target="_blank"><?= htmlspecialchars($row['url']) ?></a></td>
                    <td><?= htmlspecialchars($row['description']) ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary analyze-btn" data-url="<?= htmlspecialchars($row['url']) ?>">Analyze</button>
                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="<?= $row['web_id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        <div id="traffic-result" style="display: none;"></div>

    <?php else: ?>
        <p>No websites found. <a href="addwebiste.php">Add a new website</a>.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $('.delete-btn').click(function () {
        const webId = $(this).data('id');
        const row = $(this).closest('tr');

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete this website?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete_website.php',
                    type: 'POST',
                    data: { id: webId },
                    success: function (response) {
                        const res = JSON.parse(response);
                        if (res.status === 'success') {
                            row.fadeOut(500, function () { $(this).remove(); });
                            Swal.fire('Deleted!', res.message, 'success');
                        } else {
                            Swal.fire('Error!', res.message, 'error');
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function () {
    $('.analyze-btn').click(function () {
        const siteUrl = $(this).data('url');
        const apiUrl = `http://localhost/cgi-bin/analyze_traffic.py?website_url=${encodeURIComponent(siteUrl)}`;
        const userEmail = "<?= $_SESSION['email'] ?>"; // Make sure session is active

        // Step 1: Check analyze limit before analyzing
        fetch('check_analyze_limit.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `email=${encodeURIComponent(userEmail)}`
        })
        .then(res => res.json())
        .then(check => {
            if (check.status === 'limit_exceeded') {
                Swal.fire({
                    title: "Limit Reached",
                    text: "You have reached the maximum of 3 analyses. Please go to the payment page.",
                    icon: "warning",
                    confirmButtonText: "Go to Payment"
                }).then(result => {
                    if (result.isConfirmed) {
                        window.location.href = "payment.php";
                    }
                });
                return;
            }

            // Step 2: Continue with traffic analysis
            return fetch(apiUrl)
                .then(response => {
                    if (!response.ok) throw new Error("Network response was not ok");
                    return response.json();
                })
                .then(data => {
                    $('#traffic-result').html(`
                        <div class="card-analysis">
                            <h4 class="mb-3 text-center">Traffic Analysis</h4>
                            <p><strong>Total Visitors:</strong> ${data.total}</p>

                            <h6 class="mt-3">Fake vs Real Traffic Criteria</h6>
                            <table class="table table-sm table-bordered mt-2">
                                <thead class="table-secondary"><tr><th>Criteria</th><th>Description</th></tr></thead>
                                <tbody>
                                    <tr><td>IP Location</td><td>Blocked/suspicious regions</td></tr>
                                    <tr><td>User-Agent</td><td>Known bot/crawler strings</td></tr>
                                    <tr><td>Request Frequency</td><td>Abnormal request patterns</td></tr>
                                </tbody>
                            </table>

                            <p><strong>Real Users:</strong> ${data.real}</p>
                            <p><strong>Fake Users:</strong> ${data.fake}</p>

                            <div class="chart-container mt-4 d-flex justify-content-around">
                                <div class="ms-5">
                                    <canvas id="pieChart" width="300" height="300"></canvas>
                                    <p class="text-center small">Pie Chart</p>
                                </div>
                                <div class="ms-5">
                                    <canvas id="lineChart" width="300" height="300"></canvas>
                                    <p class="text-center small">Line Graph</p>
                                </div>
                            </div>
                        </div>
                    `).show();

                    const pieCtx = document.getElementById('pieChart').getContext('2d');
                    const lineCtx = document.getElementById('lineChart').getContext('2d');

                    if (window.pieChartInstance) window.pieChartInstance.destroy();
                    if (window.lineChartInstance) window.lineChartInstance.destroy();

                    window.pieChartInstance = new Chart(pieCtx, {
                        type: 'pie',
                        data: {
                            labels: ['Real Traffic', 'Fake Traffic'],
                            datasets: [{
                                data: [data.real, data.fake],
                                backgroundColor: ['#28a745', '#dc3545']
                            }]
                        },
                        options: {
                            responsive: false,
                            plugins: {
                                legend: { position: 'top' },
                                title: { display: true, text: 'Traffic Pie' }
                            }
                        }
                    });

                    window.lineChartInstance = new Chart(lineCtx, {
                        type: 'line',
                        data: {
                            labels: ['Total', 'Real', 'Fake'],
                            datasets: [{
                                label: 'Visitors',
                                data: [data.total, data.real, data.fake],
                                borderColor: '#007bff',
                                backgroundColor: 'rgba(0,123,255,0.2)',
                                fill: true,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: false,
                            scales: {
                                y: { beginAtZero: true }
                            },
                            plugins: {
                                legend: { display: false },
                                title: { display: true, text: 'Visitor Trends' }
                            }
                        }
                    });
                });
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Failed to analyze traffic.");
        });
    });
});
});

</script>

</body>
</html>
