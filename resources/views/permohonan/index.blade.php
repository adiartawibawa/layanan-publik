<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Layanan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-start justify-center gap-2">
                @forelse ($layanans as $item)
                    <div class="mx-auto flex max-w-xs flex-col overflow-hidden rounded">
                        <a href="#">
                            <img class="w-full shadow-md"
                                src="https://images.unsplash.com/photo-1562654501-a0ccc0fc3fb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80"
                                alt="Sunset in the mountains" />
                        </a>
                        <div class="relative m-5 -mt-16 bg-white px-10 pb-16 pt-5 shadow-md">
                            <a href="#" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'detail-layanan-{{ $item->id }}')"
                                class="mb-2 inline-block text-lg font-semibold uppercase transition duration-500 ease-in-out hover:text-indigo-600">
                                {{ $item->name }}
                            </a>
                            <p class="text-sm text-gray-500">{{ Str::limit($item->desc, 75, '...') }}</p>
                            <p class="mt-5 text-xs text-gray-600">
                                Estimasi waktu layanan
                                <span class="text-xs text-indigo-600 transition duration-500 ease-in-out">
                                    {{ $item->estimasi }} Hari
                                </span>
                            </p>
                        </div>
                    </div>

                    <x-modal name="detail-layanan-{{ $item->id }}" focusable>
                        <div class="p-4">
                            <div class="py-4">
                                <h2 class="mb-4 text-xl font-semibold uppercase">{{ $item->name }}</h2>
                                <p class="text-sm text-gray-500">{{ $item->desc }}</p>
                            </div>

                            <div x-data="{ activeTab: 1 }">
                                <div class="border-b border-gray-200 dark:border-gray-700">
                                    <ul role="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                                        @keydown.left.prevent.stop="$focus.wrap().prev()"
                                        @keydown.home.prevent.stop="$focus.first()"
                                        @keydown.end.prevent.stop="$focus.last()"
                                        class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                        <li class="mr-2">
                                            <a href="#" id="tab-1"
                                                class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group"
                                                :class="activeTab === 1 ?
                                                    'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                                                    'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                                :tabindex="activeTab === 1 ? 0 : -1" :aria-selected="activeTab === 1"
                                                aria-controls="tabpanel-1" @click="activeTab = 1"
                                                @focus="activeTab = 1">
                                                <svg class="w-4 h-4 mr-2 "
                                                    :class="activeTab === 1 ?
                                                        ' text-blue-600 dark:text-blue-500' :
                                                        'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                                </svg>
                                                Formulir
                                            </a>
                                        </li>
                                        <li class="mr-2">
                                            <a href="#" id="tab-2"
                                                class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group"
                                                :class="activeTab === 2 ?
                                                    'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                                                    'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                                :tabindex="activeTab === 2 ? 0 : -1" :aria-selected="activeTab === 2"
                                                aria-controls="tabpanel-2" @click="activeTab = 2"
                                                @focus="activeTab = 2">
                                                <svg class="w-4 h-4 mr-2 "
                                                    :class="activeTab === 2 ?
                                                        ' text-blue-600 dark:text-blue-500' :
                                                        'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                                </svg>
                                                Prasyarat
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="relative flex flex-col">
                                    <!-- Panel #1 -->
                                    <div id="tabpanel-1" class="p-4 dark:bg-gray-800" x-show="activeTab === 1"
                                        role="tabpanel" aria-labelledby="tab-1"
                                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                                        x-transition:enter-start="opacity-0 -translate-y-8"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-12">

                                        {{-- Content goes here --}}
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <x-table striped="true" divider="thin">
                                                <x-slot name="header">
                                                    <th>Pemohon akan mengisi formulir :</th>
                                                </x-slot>
                                                @forelse ($formulir as $form)
                                                    @if ($form->ketentuan_id == $item->id)
                                                        <tr>
                                                            <td class="flex items-start justify-between">
                                                                <div>
                                                                    <p>
                                                                        {{ $form->name }}
                                                                        @if ($form->is_required)
                                                                            <span class="text-red-500">*</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="text-xs">
                                                                        {{ $form->desc }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <p class="text-sm text-gray-500">
                                                        Informasi formulir belum tersedia
                                                    </p>
                                                @endforelse
                                            </x-table>
                                        </div>
                                    </div>

                                    <!-- Panel #2 -->
                                    <div id="tabpanel-2" class="p-4 dark:bg-gray-800" x-show="activeTab === 2"
                                        role="tabpanel" aria-labelledby="tab-2"
                                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                                        x-transition:enter-start="opacity-0 -translate-y-8"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-12">

                                        {{-- Content goes here --}}
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            <x-table striped="true" divider="thin">
                                                <x-slot name="header">
                                                    <th>Pemohon harus mempersiapkan dokumen berikut sebagai syarat
                                                        pengajuan permohonan :</th>
                                                </x-slot>
                                                @forelse ($syarat as $prasyarat)
                                                    @if ($prasyarat->ketentuan_id == $item->id)
                                                        <tr>
                                                            <td class="flex items-start justify-between">
                                                                <div>
                                                                    <p>
                                                                        {{ $prasyarat->name }}
                                                                        @if ($prasyarat->is_required)
                                                                            <span class="text-red-500">*</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="text-xs">
                                                                        {{ $prasyarat->desc }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <p class="text-sm text-gray-500">
                                                        Informasi persyaratan belum tersedia
                                                    </p>
                                                @endforelse
                                            </x-table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                                    {{ __('Kembali') }}
                                </x-button>

                                <x-button tag="a" href="{{ route('permohonan.show', $item->id) }}"
                                    color="indigo" class="ml-3" size="small">
                                    {{ __('Ajukan Permohonan') }}
                                </x-button>
                            </div>
                        </div>
                    </x-modal>

                @empty
                    <div>Belum ada layanan yang tersedia</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
