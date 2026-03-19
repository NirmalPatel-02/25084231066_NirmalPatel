<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task Manager</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            color: #1e293b;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.95);
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: #93c5fd;
        }

        .page-wrapper {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(6px);
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
            padding: 24px;
            border-radius: 16px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
        }

        .hero h1,
        .hero h2 {
            margin: 0 0 8px 0;
        }

        .hero p {
            margin: 0;
            opacity: 0.95;
            line-height: 1.6;
        }

        .section-title {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .sub-text {
            color: #475569;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            text-decoration: none;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .alert-success,
        .alert-danger {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-weight: 500;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border-left: 5px solid #22c55e;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }

        .form-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 24px;
            border-radius: 16px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #334155;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
            background: white;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.10);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 14px;
            margin-top: 18px;
            background: white;
        }

        thead {
            background: #0f172a;
            color: white;
        }

        th, td {
            padding: 16px 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: top;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-completed {
            background: #dcfce7;
            color: #166534;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .details-card {
            background: linear-gradient(180deg, #ffffff, #f8fafc);
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 24px;
        }

        .details-card p {
            margin: 14px 0;
            line-height: 1.7;
            font-size: 15px;
        }

        .details-card strong {
            color: #0f172a;
            min-width: 110px;
            display: inline-block;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            color: #64748b;
        }

        .footer-note {
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            font-size: 14px;
        }

        ul {
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 16px 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .nav-links a {
                margin-left: 0;
                margin-right: 16px;
            }

            .hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .container {
                padding: 20px;
            }

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 14px;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                overflow: hidden;
                background: white;
            }

            td {
                border-bottom: 1px solid #e2e8f0;
            }

            td:last-child {
                border-bottom: none;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .actions .btn {
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="brand">Task Manager</div>
        <div class="nav-links">
            <a href="{{ route('tasks.index') }}">Dashboard</a>
            <a href="{{ route('tasks.create') }}">Create Task</a>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="container">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

            <div class="footer-note">
                Laravel Practical Project • Advanced Framework Features Demo
            </div>
        </div>
    </div>

</body>
</html>