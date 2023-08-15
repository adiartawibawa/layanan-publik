<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Detail Layanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    <div class="pb-8 text-gray-800">
                        <h2 class="text-2xl font-semibold">{{ $layanan->name }}</h2>
                        <p class="text-xs text-gray-500 mt-2">Estimasi waktu layanan : {{ $layanan->estimasi }} Hari</p>
                        <p class="text-xs text-gray-500 mt-2">{{ $layanan->desc }}</p>
                    </div>
                    <div x-data="{ activeTab: 1 }">
                        <div class="flex flex-col md:flex-row gap-5">
                            <!-- Buttons -->
                            <div class="flex flex-col">
                                <div role="tablist"
                                    class="max-w-full md:w-1/3 inline-flex flex-wrap items-start p-1 mb-8"
                                    @keydown.right.prevent.stop="$focus.wrap().next()"
                                    @keydown.left.prevent.stop="$focus.wrap().prev()"
                                    @keydown.home.prevent.stop="$focus.first()"
                                    @keydown.end.prevent.stop="$focus.last()">
                                    <!-- Button #1 -->
                                    <button id="tab-1"
                                        class="flex-1 text-lg block font-medium h-12 px-4 whitespace-nowrap focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150 ease-in-out"
                                        :class="activeTab === 1 ?
                                            'bg-white border-l-4 border-l-indigo-800 text-slate-900' :
                                            'text-slate-600 hover:text-slate-900 hover:border-l-4 hover:border-l-indigo-800  border-l-4 border-transparent'"
                                        :tabindex="activeTab === 1 ? 0 : -1" :aria-selected="activeTab === 1"
                                        aria-controls="tabpanel-1" @click="activeTab = 1" @focus="activeTab = 1">
                                        Formulir
                                    </button>
                                    <!-- Button #2 -->
                                    <button id="tab-2"
                                        class="flex-1 text-lg block font-medium h-12 px-4 whitespace-nowrap focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 transition-colors duration-150 ease-in-out"
                                        :class="activeTab === 2 ? 'bg-white border-l-4 border-l-indigo-800 text-slate-900' :
                                            'text-slate-600 hover:text-slate-900 hover:border-l-4 hover:border-l-indigo-800 border-l-4 border-transparent'"
                                        :tabindex="activeTab === 2 ? 0 : -1" :aria-selected="activeTab === 2"
                                        aria-controls="tabpanel-2" @click="activeTab = 2" @focus="activeTab = 2">
                                        Prasyarat
                                    </button>
                                </div>
                            </div>
                            <!-- Tab panels -->
                            <div class="max-w-full md:w-3/4">
                                <div class="relative flex flex-col">
                                    <!-- Panel #1 -->
                                    <article id="tabpanel-1"
                                        class="w-full bg-white md:flex items-stretch focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300"
                                        role="tabpanel" tabindex="0" aria-labelledby="tab-1" x-show="activeTab === 1"
                                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                                        x-transition:enter-start="opacity-0 -translate-y-8"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-12">

                                        <x-card class="w-full !shadow-none">
                                            <x-slot name="header">
                                                <h2 class="text-xl text-gray-800">Formulir</h2>
                                                <p class="text-xs text-gray-500 mt-2">
                                                    Tambahkan formulir yang harus
                                                    dilengkapi oleh
                                                    pengguna layanan
                                                </p>
                                            </x-slot>
                                            <div class="my-8">
                                                <x-button size="small" color="purple">Tambah</x-button>
                                            </div>
                                            <x-slot name="footer">

                                                <x-table striped="true" divider="thin">
                                                    <x-slot name="header">
                                                        <th>Pemohon akan mengisi formulir :</th>
                                                    </x-slot>
                                                    {{-- @forelse ($collection as $item)
                                                        <tr>
                                                            <td>
                                                                <p>Tempat Lahir <span class="text-red-500">*</span></p>
                                                                <p class="text-xs">Silahkan masukan tempat lahir pemohon
                                                                    sesuai KTP</p>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p class="text-sm text-gray-500">Anda belum menginputkan
                                                            formulir yang dibutuhkan</p>
                                                    @endforelse --}}
                                                </x-table>
                                            </x-slot>
                                        </x-card>

                                    </article>
                                    <!-- Panel #2 -->
                                    <article id="tabpanel-2"
                                        class="w-full bg-white md:flex items-stretch focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300"
                                        role="tabpanel" tabindex="0" aria-labelledby="tab-2" x-show="activeTab === 2"
                                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                                        x-transition:enter-start="opacity-0 -translate-y-8"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-12">
                                        <x-card class="w-full !shadow-none">
                                            <x-slot name="header">
                                                <h2 class="text-xl text-gray-800">Prasyarat</h2>
                                                <p class="text-xs text-gray-500 mt-2">
                                                    Tambahkan syarat yang harus
                                                    disiapkan oleh
                                                    pemohon
                                                </p>
                                            </x-slot>
                                            <div class="my-8">
                                                <x-button size="small" color="purple">Tambah</x-button>
                                            </div>
                                            <x-slot name="footer">

                                                <x-table striped="true" divider="thin">
                                                    <x-slot name="header">
                                                        <th>Pemohon harus mempersiapkan scan dokumen asli (bukan foto
                                                            copy) :</th>
                                                    </x-slot>
                                                    {{-- @forelse ($collection as $item)
                                                        <tr>
                                                            <td>
                                                                <p>Tempat Lahir <span class="text-red-500">*</span></p>
                                                                <p class="text-xs">Silahkan masukan tempat lahir pemohon
                                                                    sesuai KTP</p>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p class="text-sm text-gray-500">Anda belum menginputkan
                                                            formulir yang dibutuhkan</p>
                                                    @endforelse --}}
                                                </x-table>
                                            </x-slot>
                                        </x-card>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8">
                        <x-button tag="a" type="secondary" icon="arrow-left" size="small"
                            href="{{ route('admin.pelayanan') }}">
                            Kembali</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
