<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibiste un pedido - Kanbai</title>
</head>
<body style="margin:0;padding:20px;background:#F8FAFC;font-family:Arial,sans-serif;color:#1E293B;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width:640px;margin:0 auto;background:#fff;border:1px solid #E2E8F0;border-radius:16px;">
        <tr>
            <td style="padding:24px;text-align:center;">
                <img src="{{ asset('images/logo/logo-kanbai-color.png') }}" alt="Kanbai" width="110">
            </td>
        </tr>
        <tr>
            <td style="padding:0 24px 24px 24px;">
                <p style="font-size:12px;font-weight:bold;color:#10B981;text-transform:uppercase;margin:0 0 12px 0;">Recibiste un pedido</p>
                <h1 style="margin:0 0 12px 0;font-size:24px;">Hola, {{ $commerceName }}</h1>
                <p style="margin:0 0 20px 0;line-height:1.5;">Has recibido un nuevo pedido, te pedimos lo proceses en el menor tiempo posible. A continuación podrás encontrar información del pedido.</p>

                <p style="margin:0 0 16px 0;"><strong>Número del pedido:</strong> #{{ $project->id }}</p>

                <h3 style="margin:0 0 10px 0;font-size:16px;">Resumen de los productos comprados</h3>
                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-bottom:16px;">
                    @foreach($products as $product)
                        <tr>
                            <td style="padding:10px;border:1px solid #E2E8F0;">
                                <strong>{{ $product['name'] }}</strong><br>
                                Cantidad: {{ $product['quantity'] }}<br>
                                Precio unitario: ${{ number_format($product['price'], 0, ',', '.') }}
                                @if(!empty($product['extras']))
                                    <div style="margin-top:8px;font-size:13px;">
                                        Extras:
                                        <ul style="margin:6px 0 0 18px;padding:0;">
                                            @foreach($product['extras'] as $extra)
                                                <li>{{ $extra['name'] }} x{{ $extra['quantity'] }} - ${{ number_format($extra['price'], 0, ',', '.') }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>

                <p style="margin:0 0 20px 0;"><strong>Dirección de destino del pedido:</strong> {{ $destinationAddress }}</p>

                <p style="text-align:center;margin:24px 0;">
                    <a href="{{ $panelUrl }}" style="background:#6366F1;color:#fff;text-decoration:none;padding:12px 20px;border-radius:10px;display:inline-block;font-weight:bold;">Ir al panel</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
