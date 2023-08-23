@switch($setting->setting_type)
    @case('string')
        <x-input type="text" label="{{ $setting->name }}" name="{{ $setting->setting_key }}" id="{{ $setting->setting_key }}"
            value="{{ $setting[$setting->setting_type . '_value'] }}" />
    @break

    @case('file')
        <div class="py-8">
            <x-filepicker name="{{ $setting->setting_key }}" id="{{ $setting->setting_key }}" />
        </div>
    @break

    @default
@endswitch
