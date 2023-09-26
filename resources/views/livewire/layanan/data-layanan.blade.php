<div>
    {{-- filter --}}
    <div class="mt-4 flex flex-col md:flex-row w-full items-center justify-center pb-4">
        <div class="w-full md:w-1/2 py-2">
            <div class="flex flex-row items-center justify-start">
                <label for="paginate" class="w-1/6 text-sm font-medium text-gray-700/90 dark:text-white">
                    Per page
                </label>
                <select id="paginate" name="paginate" wire:model="paginate"
                    class="w-1/6 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        <div class="flex flex-row md:flex-row-reverse w-full md:w-1/2 py-2">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="search" wire:model.debounce.500ms="search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                    placeholder="Pecarian berdasarkan nama layanan">
            </div>
        </div>
    </div>
    {{-- end filter --}}

    {{-- selected data  --}}
    <div class="flex w-full items-center justify-between">
        <div class="text-sm text-gray-800">
            @if ($selectPage)
                <div class="mb-4">
                    @if ($selectAll)
                        <div>
                            You have selected all <strong>{{ $layanans->total() }}</strong> items.
                            <a href="#" class="underline text-indigo-800 ml-2" wire:click="unselectAll">Batalkan
                                Semua</a>
                        </div>
                    @else
                        <div>
                            You have selected <strong>{{ count($checked) }}</strong> items, Do you want to
                            Select
                            All
                            <strong>{{ $layanans->total() }}</strong>?
                            <a href="#" class="underline text-indigo-800 ml-2" wire:click="selectAll">Pilih
                                Semua</a>
                        </div>
                    @endif

                </div>
            @endif
        </div>
        <div>
            @if ($checked)
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                            <div>With Checked ({{ count($checked) }})</div>

                            <div class="ml-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="#"
                            onclick="confirm('Are you sure you want to delete these Records?') || event.stopImmediatePropagation()"
                            wire:click="deleteRecords()">
                            Delete
                        </x-dropdown-link>
                        <x-dropdown-link href="#"
                            onclick="confirm('Are you sure you want to export these Records?') || event.stopImmediatePropagation()"
                            wire:click="exportSelected()">
                            Export
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endif
        </div>
    </div>
    {{-- end selected data  --}}

    <div class="relative overflow-x-auto p-1">
        <x-table striped="true" divider="thin" compact="true">
            <x-slot name="header">
                <th><input type="checkbox" wire:model="selectPage"></th>
                <th>
                    Layanan
                    <span wire:click="sortBy('name')" class="cursor-pointer">
                        <x-icon
                            name="{{ $sortColumnName === 'name' && $sortDirection === 'asc' ? 'bars-arrow-up' : 'bars-arrow-down' }}"
                            class="w-4 h-4 " />
                    </span>
                </th>
                <th>
                    Estimasi
                    <span wire:click="sortBy('estimasi')" class="cursor-pointer">
                        <x-icon
                            name="{{ $sortColumnName === 'estimasi' && $sortDirection === 'asc' ? 'bars-arrow-up' : 'bars-arrow-down' }}"
                            class="w-4 h-4" />
                    </span>
                </th>
                <th>
                    Deskripsi
                </th>
                <th>Aksi</th>
            </x-slot>

            <div>
                @forelse ($layanans as $item)
                    <tr>
                        <td><input type="checkbox" value="{{ $item->id }}" wire:model="checked"></td>
                        </td>
                        <td class="w-56">
                            {{ $item->name }}
                        </td>
                        <td class="w-32">{{ $item->estimasi }}</td>
                        <td>{{ Str::limit($item->desc, 150, '...') }}</td>
                        <td class="w-32">
                            <div class="inline-flex items-center justify-center gap-2">
                                <button title="Sunting"
                                    onclick="Livewire.emit('openModal', 'layanan.form-layanan', {{ json_encode(['layanan' => $item->id]) }})">
                                    <x-icon name="pencil-square" class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                </button>
                                <a href="{{ route('admin.detail.layanan', $item->id) }}" title="Detail">
                                    <x-icon name="document-text"
                                        class="h-5 w-5 cursor-pointer hover:text-indigo-800"></x-icon>
                                </a>
                                <button title="Hapus"
                                    onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()"
                                    wire:click="deleteSingleRecord('{{ $item->id }}')">
                                    <x-icon name="trash" class="h-5 w-5 cursor-pointer hover:text-rose-800" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="flex flex-col items-center justify-center">
                                <img src="{{ asset('img/empty.png') }}" class="h-52 w-auto" alt="Empty Data">
                                <p>Anda belum memiliki layanan.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </div>
        </x-table>
    </div>

    <div class="pt-8">
        {!! $layanans->links() !!}
    </div>
</div>
