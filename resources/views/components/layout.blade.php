@props(['title' => ''])

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>{{ $title ? $title . ' | SISFIN' : 'SISFIN' }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Ícones Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    body {
      background: #f7f9fc;
    }

    .sidebar {
      width: 260px;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: #0d6efd;
      color: white;
      padding-top: 30px;
    }

    .sidebar a {
      color: white;
      font-size: 16px;
      display: block;
      padding: 12px 20px;
      text-decoration: none;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background: rgba(255, 255, 255, 0.15);
    }

    .content {
      margin-left: 260px;
      padding: 20px 30px;
    }

    .card {
      border-radius: 12px;
    }
  </style>
</head>

<body>

  {{-- SIDEBAR --}}
  <div class="sidebar">
    <h4 class="text-center mb-4">SISFIN</h4>

    <a href="{{ url('/') }}"><i class="bi bi-house"></i> Dashboard</a>

    <hr class="border-light">

    <a href="{{ route('estados.index') }}">Estados</a>
    <a href="{{ route('cidades.index') }}">Cidades</a>
    <a href="{{ route('pessoas.index') }}">Pessoas</a>
    <a href="{{ route('membros.index') }}">Membros</a>
    <a href="{{ route('fornecedores.index') }}">Fornecedores</a>
    <a href="{{ route('recebimentos.index') }}">Recebimentos</a>
    <a href="{{ route('pagamentos.index') }}">Pagamentos</a>
    <a href="{{ route('despesas.index') }}">Despesas</a>
    <a href="{{ route('caixas.index') }}">Caixas</a>
    <a href="{{ route('itens-caixa.index') }}">Itens do Caixa</a>
  </div>

  {{-- MAIN CONTENT --}}
  <div class="content">
    {{ $slot }}
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>