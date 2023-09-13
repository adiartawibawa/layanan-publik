<div class="w-full">
    <x-card title="Permohonan {{ $permohonan->layanan->name }}">
        <div x-data="{ activeTab: 1 }">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul role="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                    @keydown.left.prevent.stop="$focus.wrap().prev()" @keydown.home.prevent.stop="$focus.first()"
                    @keydown.end.prevent.stop="$focus.last()"
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
                    <input label="Permohonan" name="permohonan" type="hidden" value="{{ $permohonan->id }}" />
                    <!-- Panel #1 -->
                    <div id="tabpanel-1" class="p-4 dark:bg-gray-800" x-show="activeTab === 1" role="tabpanel"
                        aria-labelledby="tab-1"
                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                        x-transition:enter-start="opacity-0 -translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-12">

                        {{-- Content goes here --}}
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            @foreach ($permohonan->detail as $item)
                                @if ($item->category == 'formulir')
                                    @switch($item->mohon_type)
                                        @case('string')
                                            <x-input type="text" label="{{ $item->name }}" name="{{ $item->mohon_key }}"
                                                id="{{ $item->mohon_key }}" value="{{ $item[$item->mohon_type . '_value'] }}" />
                                        @break

                                        @case('text')
                                            <x-textarea label="{{ $item->name }}" name="{{ $item->mohon_key }}"
                                                id="{{ $item->mohon_key }}"
                                                selected_value="{{ $item[$item->mohon_type . '_value'] }}" />
                                        @break

                                        @case('date')
                                            <x-datepicker placeholder="{{ $item->name }}" type="single"
                                                name="{{ $item->mohon_key }}" id="{{ $item->mohon_key }}"
                                                default_date="{{ $item[$item->mohon_type . '_value'] }}" />
                                        @break

                                        @case('file')
                                            <div class="py-8">
                                                <label for="{{ $item->mohon_key }}">{{ $item->name }}</label>
                                                <x-filepicker name="{{ $item->mohon_key }}" id="{{ $item->mohon_key }}" />
                                            </div>
                                        @break

                                        @default
                                    @endswitch
                                @endif
                            @endforeach
                            <div class="flex items-center justify-end w-full gap-2">
                                <x-button size="small" type="secondary" @click="activeTab = 2">selanjutnya</x-button>
                            </div>
                        </div>
                    </div>

                    <!-- Panel #2 -->
                    <div id="tabpanel-2" class="p-4 dark:bg-gray-800" x-show="activeTab === 2" role="tabpanel"
                        aria-labelledby="tab-2"
                        x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                        x-transition:enter-start="opacity-0 -translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-12">

                        {{-- Content goes here --}}
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            @foreach ($permohonan->detail as $item)
                                @if ($item->category == 'prasyarat')
                                    @if ($item->mohon_type == 'file')
                                        <div
                                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 md:h-80 mb-8">
                                            <img src="{{ $item[$item->mohon_type . '_value'] }}"
                                                alt="{{ $item->mohon_key }}"
                                                class="absolute inset-0 h-full w-full object-none object-center transition duration-200 group-hover:scale-110">
                                            <div
                                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                                            </div>
                                            <div class="relative ml-4 mb-3 inline-block md:ml-5">
                                                <x-button tag="a" color="red"
                                                    href="{{ $item[$item->mohon_type . '_value'] }}" target="_blank"
                                                    size="tiny">View</x-button>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            <div class="flex items-center justify-end w-full gap-2">
                                <x-button size="small" type="secondary"
                                    @click="activeTab = 1">Sebelumnya</x-button>
                                @if ($permohonan->verified_at == null)
                                    @if (!$permohonan->is_valid)
                                        <x-button size="small" color="green"
                                            wire:click="isValid(true)">Valid</x-button>
                                        <x-button size="small" color="red" wire:click="isValid(false)">Tidak
                                            Valid</x-button>
                                    @else
                                        <x-button size="small" color="indigo" wire:click="proses()">
                                            Proses
                                        </x-button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </x-card>
</div>
