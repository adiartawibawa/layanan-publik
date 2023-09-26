<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Layanan') }}
        </h2>
    </x-slot>

    @foreach ($layanan as $item)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <x-card title="Jenis Layanan">
                    <div class="flex items-start justify-between">
                        <div class="w-full space-y-2">

                            <h3 class="font-semibold text-2xl text-gray-900">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-500">Estimasi waktu layanan : <span
                                    class="text-indigo-500">{{ $item->estimasi }} hari kerja</span></p>
                            <p class="text-sm text-gray-900">{{ $item->desc }}</p>

                        </div>
                        <a href="{{ route('admin.layanan.index') }}"
                            class="inline-flex justify-center items-center space-x-2 text-xs hover:cursor-pointer hover:text-indigo-500">
                            <x-icon name="arrow-left" class="h-4 w-4" />
                            <span>Kembali</span>
                        </a>
                    </div>
                </x-card>

                <x-card title="Formulir Layanan">
                    <x-button color="indigo" icon="plus" size="tiny" class="mb-4" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'formulir-layanan')">
                        Tambah
                    </x-button>

                    <x-table striped="true" divider="thin">
                        <x-slot name="header">
                            <th>Pemohon akan mengisi formulir :</th>
                        </x-slot>
                        @forelse ($item->ketentuans as $ketentuan)
                            @if ($ketentuan->category == 'formulir')
                                <tr>
                                    <td class="flex items-start justify-between">
                                        <div>
                                            <p>
                                                {{ $ketentuan->name }}
                                                @if ($ketentuan->is_required)
                                                    <span class="text-red-500">*</span>
                                                @endif
                                            </p>
                                            <p class="text-xs">
                                                {{ $ketentuan->desc }}
                                            </p>
                                        </div>
                                        <div class="space-x-2">
                                            <form method="POST"
                                                action="{{ route('admin.detail.layanan.destroy', ['layanan' => $item->id, 'ketentuan' => $ketentuan->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.detail.layanan.destroy', ['layanan' => $item->id, 'ketentuan' => $ketentuan->id]) }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                    <x-icon name="trash"
                                                        class="h-4 w-4 text-rose-800 hover:cursor-pointer" />
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <p class="text-sm text-gray-500">Anda belum menginputkan
                                formulir yang dibutuhkan</p>
                        @endforelse
                    </x-table>
                </x-card>

                <x-card title="Syarat Layanan">
                    <x-button color="indigo" icon="plus" size="tiny" class="mb-4" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'syarat-layanan')">
                        Tambah
                    </x-button>

                    <x-table striped="true" divider="thin">
                        <x-slot name="header">
                            <th>Pemohon harus mempersiapkan scan dokumen asli (bukan foto
                                copy) :</th>
                        </x-slot>
                        @forelse ($item->ketentuans as $ketentuan)
                            @if ($ketentuan->category == 'prasyarat')
                                <tr>
                                    <td class="flex items-start justify-between">
                                        <div>
                                            <p>
                                                {{ $ketentuan->name }}
                                                @if ($ketentuan->is_required)
                                                    <span class="text-red-500">*</span>
                                                @endif
                                            </p>
                                            <p class="text-xs">
                                                {{ $ketentuan->desc }}
                                            </p>
                                        </div>
                                        <div class="space-x-2">
                                            <form method="POST"
                                                action="{{ route('admin.detail.layanan.destroy', ['layanan' => $item->id, 'ketentuan' => $ketentuan->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.detail.layanan.destroy', ['layanan' => $item->id, 'ketentuan' => $ketentuan->id]) }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                    <x-icon name="trash"
                                                        class="h-4 w-4 text-rose-800 hover:cursor-pointer" />
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <p class="text-sm text-gray-500">Anda belum menginputkan
                                syarat yang dibutuhkan</p>
                        @endforelse
                    </x-table>
                </x-card>
            </div>
        </div>

        <x-modal name="formulir-layanan" focusable>
            <form method="post" action="{{ route('admin.detail.layanan.add', $item->id) }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Menambahkan Formulir Layanan') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Silahkan tambahkan formulir layanan yang harus disiapkan') }}
                </p>

                <input label="Tipe" name="category" type="hidden" value="formulir" />

                <div class="mt-6">
                    <x-input label="Nama Formulir" name="name" required="true" value="{{ old('name') }}"
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div class="mt-4">
                    <x-textarea label="Deskripsi Formulir" name="desc" required="true" value="{{ old('desc') }}"
                        autofocus />
                    <x-input-error :messages="$errors->get('desc')" class="mt-1" />
                </div>
                <div class="mt-4">
                    <select id="type" name="type"
                        class="border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Tipe Formulir</option>
                        <option value="string">Jawaban singkat</option>
                        <option value="text">Paragraf</option>
                        <option value="foto">Foto</option>
                        <option value="dokumen">Dokumen/pdf</option>
                        <option value="date">Tanggal</option>
                    </select>
                </div>
                <div class="mt-4">
                    <x-toggle label="Wajib" label_position="right" name="is_required"></x-toggle>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button size="small" type="secondary" x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-button>

                    <x-button size="small" color="indigo" can_submit="true" class="ml-3">
                        {{ __('Tambahkan') }}
                    </x-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="syarat-layanan" focusable>
            <form method="post" action="{{ route('admin.detail.layanan.add', $item->id) }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Menambahkan Syarat Layanan') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Silahkan tambahkan syarat layanan yang harus disiapkan') }}
                </p>

                <input label="Tipe" name="category" type="hidden" value="prasyarat" />

                <div class="mt-6">
                    <x-input label="Nama Syarat" name="name" required="true" value="{{ old('name') }}"
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
                <div class="mt-4">
                    <x-textarea label="Deskripsi Syarat" name="desc" required="true" value="{{ old('desc') }}"
                        autofocus />
                    <x-input-error :messages="$errors->get('desc')" class="mt-1" />
                </div>
                <div class="mt-4">
                    <select id="type" name="type"
                        class="border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Tipe Formulir</option>
                        <option value="string">Jawaban singkat</option>
                        <option value="text">Paragraf</option>
                        <option value="foto">Foto</option>
                        <option value="dokumen">Dokumen/pdf</option>
                        <option value="date">Tanggal</option>
                    </select>
                </div>
                <div class="mt-4">
                    <x-toggle label="Wajib" label_position="right" name="is_required"></x-toggle>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button size="small" type="secondary" x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-button>

                    <x-button size="small" color="indigo" can_submit="true" class="ml-3">
                        {{ __('Tambahkan') }}
                    </x-button>
                </div>
            </form>
        </x-modal>
    @endforeach
</x-app-layout>
