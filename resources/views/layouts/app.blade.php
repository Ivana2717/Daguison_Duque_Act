<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-bg: #f8fafc;
            --border-color: #e2e8f0;
            --text-muted: #64748b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: var(--shadow-md);
            border: none;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
        }

        .nav-link {
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: 0.375rem;
            margin: 0 0.25rem;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-1px);
        }

        .container {
            max-width: 1200px;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
            background: white;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            border-radius: 0.75rem 0.75rem 0 0 !important;
            font-weight: 600;
        }

        .btn {
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-outline-primary {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .btn-outline-danger {
            border: 1px solid var(--danger-color);
            color: var(--danger-color);
        }

        .btn-outline-danger:hover {
            background-color: var(--danger-color);
            transform: translateY(-1px);
        }

        .table {
            background: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table thead th {
            background-color: #f8fafc;
            border: none;
            font-weight: 600;
            color: var(--text-muted);
            padding: 1rem;
        }

        .table tbody td {
            border: none;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .badge {
            border-radius: 0.375rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
        }

        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            padding: 0.75rem;
            transition: all 0.2s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .alert {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
        }

        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
        }

        .empty-state i {
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .icon-circle-sm {
            width: 40px;
            height: 40px;
        }

        .icon-circle-lg {
            width: 80px;
            height: 80px;
        }

        .page-header {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .page-subtitle {
            color: var(--text-muted);
            margin: 0.5rem 0 0 0;
        }

        .stats-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s ease;
        }

        .stats-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stats-label {
            color: var(--text-muted);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }
            
            .page-header {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('categories.index') }}">
                <i class="fas fa-book me-2"></i>Library System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">
                            <i class="fas fa-tags me-1"></i>Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">
                            <i class="fas fa-book me-1"></i>Books
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('members.index') }}">
                            <i class="fas fa-users me-1"></i>Members
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow-records.index') }}">
                            <i class="fas fa-exchange-alt me-1"></i>Borrow Records
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
