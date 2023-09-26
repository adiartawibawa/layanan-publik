<div>
    <div class="py-8 px-6">
        <form>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $updateLayanan ? __('Sunting Pelayanan') : __('Menambahkan Pelayanan Baru') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ $updateLayanan ? __('Silahkan sunting jenis pelayanan yang akan Anda perbaharui') : __('Silahkan tambahkan jenis pelayanan yang akan Anda layani') }}
            </p>

            <div class="mt-6">
                <x-input wire:model="name" label="Nama Layanan" name="name" required="true" value="{{ old('name') }}"
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input wire:model="estimasi" label="Estimasi Waktu Layanan" name="estimasi" suffix="Hari Layanan "
                    numeric="true" required="true" value="{{ old('estimasi') }}" autofocus />
                <x-input-error :messages="$errors->get('estimasi')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-textarea wire:model="desc" label="Deskripsi Layanan" name="desc" required="true"
                    value="{{ old('desc') }}" autofocus />
                <x-input-error :messages="$errors->get('desc')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button type="secondary" size="small" wire:click.prevent="cancel()">
                    {{ __('Batal') }}
                </x-button>

                @if (!$updateLayanan)
                    <x-button wire:click.prevent="store()" class="ml-3" size="small">
                        {{ __('Tambahkan') }}
                    </x-button>
                @else
                    <x-button wire:click.prevent="update()" class="ml-3" size="small">
                        {{ __('Sunting') }}
                    </x-button>
                @endif
            </div>
        </form>
    </div>
</div>
