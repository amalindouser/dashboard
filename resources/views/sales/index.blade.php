<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #1f2937;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
            z-index: 100;
            color: white;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 30px auto;
            padding-bottom: 40px;
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border-left: 5px solid #667eea;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }

        .stat-label {
            font-size: 14px;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Card */
        .card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }

        h1, h2, h3 {
            margin-bottom: 14px;
            font-size: 26px;
            font-weight: 700;
            color: #1f2937;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        /* Filter form */
        .filter-box {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            align-items: flex-end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-box label {
            font-size: 13px;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-box input {
            padding: 12px 14px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            width: 200px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .filter-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        button {
            padding: 12px 28px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        button:active {
            transform: translateY(0);
        }

        /* Table */
        .table-wrapper {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 18px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 3px solid #667eea;
        }

        td {
            border-bottom: 1px solid #f3f4f6;
            color: #374151;
        }

        tr:hover td {
            background: #f9fafb;
            transition: background 0.2s ease;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Chart */
        .chart-container {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            margin-top: 30px;
        }

        .chart-wrapper {
            position: relative;
            height: 350px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
                font-size: 20px;
            }

            .container {
                width: 98%;
                margin: 15px auto;
            }

            .filter-box {
                flex-direction: column;
            }

            .filter-box input {
                width: 100%;
            }

            button {
                width: 100%;
                justify-content: center;
            }

            th, td {
                padding: 12px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <i class="fas fa-chart-line"></i> Dashboard Penjualan
    </div>

    <div class="container">

        <!-- Total Penjualan Card -->
        <div class="stat-card">
            <div class="stat-label">💰 Total Penjualan</div>
            <div class="stat-value">Rp {{ number_format($total, 0, ',', '.') }}</div>
        </div>

        <!-- Filter -->
        <div class="card">
            <h3>🔍 Filter Penjualan</h3>
            <form method="GET" class="filter-box">

                <div class="filter-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}">
                </div>

                <div class="filter-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}">
                </div>

                <button type="submit">
                    <i class="fas fa-search"></i> Terapkan Filter
                </button>

            </form>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-box"></i> Produk</th>
                        <th><i class="fas fa-calendar"></i> Tanggal</th>
                        <th><i class="fas fa-cubes"></i> Jumlah</th>
                        <th><i class="fas fa-tag"></i> Harga</th>
                        <th><i class="fas fa-money-bill"></i> Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $s)
                        <tr>
                            <td><strong>{{ $s->product_name }}</strong></td>
                            <td>{{ \Carbon\Carbon::parse($s->sale_date)->format('d M Y') }}</td>
                            <td>{{ $s->quantity }}</td>
                            <td>Rp {{ number_format($s->price, 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($s->quantity * $s->price, 0, ',', '.') }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Chart -->
        <div class="chart-container">
            <h3><i class="fas fa-chart-line"></i> Tren Penjualan</h3>
            <div class="chart-wrapper">
                <canvas id="chart"></canvas>
            </div>
        </div>

    </div>

    <script>
        const ctx = document.getElementById('chart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($sales->pluck('sale_date')),
                datasets: [{
                    label: "Jumlah Terjual",
                    data: @json($sales->pluck('quantity')),
                    borderWidth: 3,
                    borderColor: "#667eea",
                    backgroundColor: "rgba(102, 126, 234, 0.08)",
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: "#667eea",
                    pointBorderColor: "#fff",
                    pointBorderWidth: 2,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            color: '#374151',
                            padding: 20
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
