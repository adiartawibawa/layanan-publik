@foreach ($layanan->ketentuans as $item)
    @if ($item->category == 'formulir')
        @switch($item->type)
            @case('text')
                <x-input type="text" label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('textarea')
                <x-textarea label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('file')
                <div class="py-8">
                    <x-filepicker name="{{ $item->key }}" id="{{ $item->key }}" />
                </div>
            @break

            @default
        @endswitch
    @endif
@endforeach