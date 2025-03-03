<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura #{{ $fee->id }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            color: #333333;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .card-header {
            background-color: #f8f9fa;
            color: #333333;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        .card-body {
            padding: 30px;
        }
        .card-body p {
            font-size: 14px;
            margin-bottom: 10px;
        }
        .card-body p strong {
            color: #000000;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 10px;
            text-align: center;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Factura #{{ $fee->id }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Concepto:</strong> {{ $fee->concept }}</p>
                <p><strong>Fecha de emisión:</strong> {{ $fee->issue_date }}</p>
                <p><strong>Importe:</strong> {{ $fee->amount }}</p>
                <p><strong>Estado de pago:</strong> {{ $fee->paid ? 'Pagado' : 'Pendiente' }}</p>
                <p><strong>Fecha de pago:</strong> {{ $fee->payment_date }}</p>
                <p><strong>Notas:</strong> {{ $fee->notes }}</p>
            </div>
            <div class="card-footer">
                <p>Gracias por su pago</p>
            </div>
        </div>
    </div>
</body>
</html>