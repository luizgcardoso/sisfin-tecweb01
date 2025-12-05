@props(['field', 'value' => null])

<label class="form-label fw-semibold">{{ $field['label'] }}</label>
<input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" class="form-control" value="{{ old($field['name'], $value) }}" {{ isset($field['required']) ? 'required' : '' }}>