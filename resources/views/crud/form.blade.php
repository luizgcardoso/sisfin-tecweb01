<x-layout :title="$title">

  <h2 class="mb-4">{{ $title }}</h2>

  <x-form :action="$action" :method="$method" :fields="$fields" :item="$item" />

</x-layout>