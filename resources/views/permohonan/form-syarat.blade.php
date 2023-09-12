@foreach ($layanan->ketentuans as $item)
    @if ($item->category == 'prasyarat')
        @switch($item->type)
            @case('string')
                <x-input type="text" label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('text')
                <x-textarea label="{{ $item->name }}" name="{{ $item->key }}" id="{{ $item->key }}"
                    value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('date')
                <x-datepicker placeholder="{{ $item->name }}" type="single" name="{{ $item->key }}"
                    id="{{ $item->key }}" value="{{ $item[$item->type . '_value'] }}" />
            @break

            @case('file')
                <div class="py-8">
                    <label for="{{ $item->key }}">{{ $item->name }}</label>
                    <x-filepicker name="{{ $item->key }}" id="{{ $item->key }}" />
                </div>
            @break

            @default
        @endswitch
    @endif
@endforeach
