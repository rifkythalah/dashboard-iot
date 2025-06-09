<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parking Dashboard</title>
    <link rel="icon" href="img/image 2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-dark: #1a2a3a;
            --primary-light: #2c3e50;
            --accent-blue: #3498db;
            --accent-green: #2ecc71;
            --accent-orange: #e67e22;
            --accent-red: #e74c3c;
            --text-light: #ecf0f1;
            --text-muted: #bdc3c7;
        }
        
        body {
            background-color: #ffffff; /* Light background for the main content area */
            color: #333; /* Darker text for readability */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 70px; /* Add padding to the top of the body to offset the fixed navbar */
        }

        .navbar {
            background-color: #ffffff; /* White background for navbar */
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: #333 !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }

        .nav-link {
            color: #555 !important;
            font-weight: 500;
            margin-left: 1.5rem;
        }

        .nav-link:hover {
            color: var(--accent-blue) !important;
        }
        
        .dashboard-container {
            flex: 1; /* Allows container to grow and push footer down */
            padding: 2rem;
            max-width: 1200px; /* Max width for content */
            margin: 0 auto; /* Center the content */
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .stat-card {
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card .icon {
            font-size: 2.5rem;
            opacity: 0.3;
            position: absolute;
            right: 20px;
            top: 20px;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }
        
        .header-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .header-subtitle {
            color: var(--text-muted);
            font-size: 1rem;
        }
        
        .badge-duration {
            padding: 0.35em 0.65em;
            font-weight: 500;
            border-radius: 8px;
        }
        
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table thead {
            background-color: rgba(0,0,0,0.2);
        }
        
        .table th {
            border: none;
            font-weight: 500;
            padding: 1rem;
        }
        
        .table td {
            vertical-align: middle;
            padding: 0.75rem 1rem;
        }
        
        .parking-slot {
            font-weight: 600;
        }

        .footer {
            background-color: #f8f9fa; /* Light background for footer */
            color: #6c757d; /* Muted text for footer */
            padding: 1.5rem 0;
            text-align: center;
            margin-top: auto; /* Push footer to the bottom */
            border-top: 1px solid #e9ecef;
        }

        .footer a {
            color: #6c757d;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <i class="fa-solid fa-car-side me-2"></i>
                Smart Parking System IoT
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2024 SmartPark IoT. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <a href="#" id="back-to-top" class="btn btn-primary rounded-circle shadow-sm" style="display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </a>
    <script>
        // Back to top button functionality
        var backToTopButton = document.getElementById('back-to-top');

        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        };

        backToTopButton.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        };
    </script>
    @stack('scripts')
</body>
</html>