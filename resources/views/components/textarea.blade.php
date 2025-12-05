@props(['field', 'value' => null])

<label class="form-label fw-semibold">{{ $field['label'] }}</label>
<textarea name="{{ $field['name'] }}" class="form-control" rows="4">{{ old($field['name'], $value) }}</textarea>