<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Jenis Layanan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Tambahkan jenis pelayanan yang Anda akan tangani') }}
        </p>
    </header>

    <div class="py-5 flex md:flex-row flex-col gap-5">
        <div class="w-full md:w-1/4">
            <x-button color="purple" icon="plus" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'tambah-layanan')">
                Tambahkan Layanan
            </x-button>
        </div>
        <div class="w-full md:w-3/4">
            <div class="flex flex-col md:flex-row flex-wrap gap-5">
                @forelse ($layanans as $layanan)
                    <a href="{{ route('admin.detail.pelayanan', $layanan->id) }}"
                        class="block hover:shadow-lg hover:shadow-indigo-300">
                        <x-card title="{{ $layanan->name }}">
                            <div class="w-full inline-flex items-center">
                                <x-icon name="trash" class="h-4 w-4 text-red-500"></x-icon>
                            </div>
                            <div
                                class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                <p>{{ Str::limit($layanan->desc, 100, '...') }}
                                </p>
                            </div>
                            <div class="pt-5 text-base font-semibold leading-7">
                                <p class="text-indigo-500 transition-all duration-300">
                                    Selengkapnya
                                    &rarr;
                                </p>
                            </div>
                        </x-card>
                    </a>
                @empty
                    <p>Belum ada jenis layanan yang tersedia</p>
                @endforelse
            </div>
        </div>
    </div>

    <x-modal name="tambah-layanan" focusable>
        <form method="post" action="{{ route('admin.pelayanan.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Menambahkan Pelayanan Baru') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Silahkan tambahkan jenis pelayanan yang akan Anda layani') }}
            </p>

            <div class="mt-6">
                <x-input label="Nama Layanan" name="name" required="true" value="{{ old('name') }}" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input label="Estimasi Waktu Layanan" name="estimasi" suffix="Hari Layanan " numeric="true"
                    required="true" value="{{ old('estimasi') }}" autofocus />
                <x-input-error :messages="$errors->get('estimasi')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-textarea label="Deskripsi Layanan" name="desc" required="true" value="{{ old('desc') }}"
                    autofocus />
                <x-input-error :messages="$errors->get('desc')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-button>

                <x-button can_submit="true" class="ml-3" size="small">
                    {{ __('Tambahkan') }}
                </x-button>
            </div>
        </form>
    </x-modal>

</section>
