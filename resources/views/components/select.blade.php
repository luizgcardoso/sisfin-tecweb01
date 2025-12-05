@props(['field', 'selected' => null])

<label class="form-label fw-semibold">{{ $field['label'] }}</label>

<select name="{{ $field['name'] }}" class="form-control">
  <option value="">Selecione</option>
  @foreach($field['options'] as $value => $text)
    <option value="{{ $value }}" {{ $value == old($field['name'], $selected) ? 'selected' : '' }}>
      {{ $text }}
    </option>
  @endforeach
</select>