<x-layout title="Dashboard">

  <h2 class="fw-bold mb-4">Dashboard</h2>

  <div class="row g-4">

    {{-- Card 1 --}}
    <div class="col-md-3">
      <div class="card sys-card shadow-sm">
        <h6 class="text-muted">Total de Membros</h6>
        <h3 class="fw-bold text-primary">{{ $totalMembros ?? 0 }}</h3>
      </div>
    </div>

    {{-- Card 2 --}}
    <div class="col-md-3">
      <div class="card sys-card shadow-sm">
        <h6 class="text-muted">Saldo do Caixa</h6>
        <h3 class="fw-bold text-success">R$ {{ number_format($saldoAtual ?? 0, 2, ',', '.') }}</h3>
      </div>
    </div>

    {{-- Card 3 --}}
    <div class="col-md-3">
      <div class="card sys-card shadow-sm">
        <h6 class="text-muted">Recebimentos</h6>
        <h3 class="fw-bold text-primary">R$ {{ number_format($totalRecebimentos ?? 0, 2, ',', '.') }}</h3>
      </div>
    </div>

    {{-- Card 4 --}}
    <div class="col-md-3">
      <div class="card sys-card shadow-sm">
        <h6 class="text-muted">Pagamentos</h6>
        <h3 class="fw-bold text-danger">R$ {{ number_format($totalPagamentos ?? 0, 2, ',', '.') }}</h3>
      </div>
    </div>

  </div>

</x-layout>