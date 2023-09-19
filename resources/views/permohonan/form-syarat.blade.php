@foreach ($layanan->ketentuans as $item)
    @if ($item->category == 'prasyarat')
        @switch($item->type)
            @case('string')
                <x-input type="text" label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" required="{{ $item->is_required ? 'true' : 'false' }}" />
            @break

            @case('text')
                <x-textarea label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" required="{{ $item->is_required ? 'true' : 'false' }}" />
            @break

            @case('date')
                <x-datepicker placeholder="{{ $item->name }}" type="single" name="{{ $item->key }}"
                    id="{{ $item->key }}" required="{{ $item->is_required ? 'true' : 'false' }}"
                    value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('foto')
                <div class="py-8">
                    <label for="{{ $item->key }}">{{ $item->name }}</label>
                    <x-filepicker name="{{ $item->key }}" id="{{ $item->key }}"
                        required="{{ $item->is_required ? 'true' : 'false' }}" max_file_size="2" accepted_file_types="image/*" />
                </div>
            @break

            @case('dokumen')
                <div class="py-8">
                    <label for="{{ $item->key }}">{{ $item->name }}</label>
                    <x-filepicker name="{{ $item->key }}" id="{{ $item->key }}"
                        required="{{ $item->is_required ? 'true' : 'false' }}" max_file_size="2" accepted_file_types=".pdf" />
                </div>
            @break

            @default
        @endswitch
    @endif
@endforeach
