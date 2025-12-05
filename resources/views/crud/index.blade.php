<x-layout :title="$title">

  <div class="d-flex justify-content-between mb-3">
    <h2 class="fw-bold">{{ $title }}</h2>
    <a href="{{ route($route . '.create') }}" class="btn btn-primary">
      <i class="bi bi-plus-circle"></i> Novo
    </a>
  </div>

  <x-crud-table :items="$items" :fields="$fields" :columns="$columns" :route="$route" :pk="$pk" />

</x-layout>