<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
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
            <div class="card-footer no-print">
                <button onclick="window.print()" class="btn btn-primary">Imprimir</button>
                <a href="{{ route('fees.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>