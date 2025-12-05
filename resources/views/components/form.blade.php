@props([
  'action',
  'method' => 'POST',
  'fields' => [],
  'item' => null,
  'submit' => 'Salvar'
])

<form action="{{ $action }}" method="POST" class="card p-4 shadow-sm border-0">
  @csrf

  @if($method !== 'POST')
    @method($method)
  @endif

  <div class="row g-3">

    {{-- Renderização dinâmica dos campos --}}
    @foreach($fields as $field)
      <div class="col-md-{{ $field['col'] ?? 12 }}">
        @if(($field['type'] ?? 'text') === 'textarea')
          <x-textarea :field="$field" :value="$item?->{$field['name']}" />
        @elseif(($field['type'] ?? 'text') === 'select')
          <x-select :field="$field" :selected="$item?->{$field['name']}" />
        @else
          <x-input :field="$field" :value="$item?->{$field['name']}" />
        @endif
      </div>
    @endforeach

  </div>

  <div class="mt-4 d-flex justify-content-end">
    <x-button>{{ $submit }}</x-button>
  </div>

</form>