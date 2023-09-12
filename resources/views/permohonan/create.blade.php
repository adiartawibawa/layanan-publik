<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ajuan Permohonan') }} {{ $layanan->name }}
            </h2>
            <div class="text-xs text-gray-600">
                <a href="{{ route('permohonan.index') }}">
                    <x-icon class="h-6 w-6" name="arrow-left-circle"></x-icon>
                    <span>Kembali</span>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg pb-10">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div x-data="{ activeTab: 1 }">
                        <div class="border-b border-gray-200 dark:border-gray-700">
                            <ul role="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                                @keydown.left.prevent.stop="$focus.wrap().prev()"
                                @keydown.home.prevent.stop="$focus.first()" @keydown.end.prevent.stop="$focus.last()"
                                class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                <li class="mr-2">
                                    <a href="#" id="tab-1"
                                        class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group"
                                        :class="activeTab === 1 ?
                                            'text-indigo-600 border-indigo-600 dark:text-indigo-500 dark:border-indigo-500' :
                                            'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                        :tabindex="activeTab === 1 ? 0 : -1" :aria-selected="activeTab === 1"
                                        aria-controls="tabpanel-1" @click="activeTab = 1" @focus="activeTab = 1">
                                        <svg class="w-4 h-4 mr-2 "
                                            :class="activeTab === 1 ?
                                                ' text-indigo-600 dark:text-indigo-500' :
                                                'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
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
                                            'text-indigo-600 border-indigo-600 dark:text-indigo-500 dark:border-indigo-500' :
                                            'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                        :tabindex="activeTab === 2 ? 0 : -1" :aria-selected="activeTab === 2"
                                        aria-controls="tabpanel-2" @click="activeTab = 2" @focus="activeTab = 2">
                                        <svg class="w-4 h-4 mr-2 "
                                            :class="activeTab === 2 ?
                                                ' text-indigo-600 dark:text-indigo-500' :
                                                'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                        </svg>
                                        Prasyarat
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="relative flex flex-col">
                            <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input label="Layanan Id" name="layanan_id" type="hidden"
                                    value="{{ $layanan->id }}" />
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
                                            @include('permohonan.form-formulir', [$layanan])
                                            <div class="flex items-center justify-end w-full gap-2">
                                                <x-button size="small" type="secondary"
                                                    @click="activeTab = 2">selanjutnya</x-button>
                                            </div>
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
                                            @include('permohonan.form-syarat', [$layanan])
                                            <div class="flex items-center justify-end w-full gap-2">
                                                <x-button size="small" type="secondary"
                                                    @click="activeTab = 1">sebelumnya</x-button>
                                                <x-button size="small" can_submit="true"
                                                    color="indigo">Ajukan</x-button>
                                            </div>
                                        </x-table>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
