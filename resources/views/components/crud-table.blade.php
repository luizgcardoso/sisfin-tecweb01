@props(['items', 'fields', 'columns', 'route', 'pk'])

<div class="card shadow-sm">
  <div class="card-body">

    <table class="table table-striped align-middle">
      <thead>
        <tr>
          @foreach($columns as $col)
            <th>{{ $col }}</th>
          @endforeach
          <th width="140">Ações</th>
        </tr>
      </thead>

      <tbody>
        @foreach($items as $item)
          <tr>
            @foreach($fields as $field)
              <td>
                {{ data_get($item, $field) }}
              </td>
            @endforeach

            <td>
              <a href="{{ route($route . '.edit', $item->$pk) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil"></i>
              </a>

              <form action="{{ route($route . '.destroy', $item->$pk) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Excluir registro?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-3">
      {{ $items->links() }}
    </div>

  </div>
</div>