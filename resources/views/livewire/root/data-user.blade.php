<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <x-card>
            <div class="space-y-2 pb-12 text-gray-900">
                <h2 class="text-xl font-semibold">Pengguna Aplikasi</h2>
                <p class="text-sm text-slate-500">
                    Pusat kontrol bagi admin untuk memverifikasi, mengatur peran, hak akses, dan mengawasi
                    aktivitas
                    pengguna dalam aplikasi layanan publik.
                </p>
            </div>

            {{-- filter --}}
            <div class="flex flex-col space-y-4 md:flex-row w-full items-center justify-between pb-4">
                <div class="flex flex-col md:items-center gap-4 md:flex-row w-full md:w-1/2 md:space-x-8">
                    <div class="inline-flex">
                        <label for="paginate" class="block mr-2 text-sm font-medium text-gray-900 dark:text-white">
                            Per page
                        </label>
                        <select id="paginate" name="paginate" wire:model="paginate"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="inline-flex">
                        <label for="selectedRole"
                            class="block mr-2 text-sm font-medium text-gray-900 dark:text-white">FilterBy Role</label>
                        <select id="selectedRole" name="selectedRole" wire:model="selectedRole"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Semua Roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <label for="search" class="sr-only">Search</label>

                <div class="flex md:flex-row-reverse w-full md:w-1/2">
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
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items by name, email and role...">
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
                                    You have selected all <strong>{{ $users->total() }}</strong> items.
                                    <a href="#" class="underline text-indigo-800 ml-2"
                                        wire:click="unselectAll">Batalkan Semua</a>
                                </div>
                            @else
                                <div>
                                    You have selected <strong>{{ count($checked) }}</strong> items, Do you want to
                                    Select
                                    All
                                    <strong>{{ $users->total() }}</strong>?
                                    <a href="#" class="underline text-indigo-800 ml-2"
                                        wire:click="selectAll">Pilih Semua</a>
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

            <x-table striped="true" divider="thin">

                <x-slot name="header">
                    <th><input type="checkbox" wire:model="selectPage"></th>
                    <th>
                        Pengguna
                        <span wire:click="sortBy('name')" class="cursor-pointer">
                            <x-icon
                                name="{{ $sortColumnName === 'name' && $sortDirection === 'asc' ? 'bars-arrow-up' : 'bars-arrow-down' }}"
                                class="w-4 h-4 " />
                        </span>
                    </th>
                    <th>
                        Terdaftar pada
                        <span wire:click="sortBy('created_at')" class="cursor-pointer">
                            <x-icon
                                name="{{ $sortColumnName === 'created_at' && $sortDirection === 'asc' ? 'bars-arrow-up' : 'bars-arrow-down' }}"
                                class="w-4 h-4" />
                        </span>
                    </th>
                    <th>Aksi</th>
                </x-slot>

                <div>
                    @forelse ($users as $item)
                        <tr>
                            <td><input type="checkbox" value="{{ $item->id }}" wire:model="checked"></td>
                            </td>
                            <td>
                                <div class="flex flex-row gap-2">
                                    <img class="h-16 w-16"
                                        src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=mp"
                                        alt="{{ $item->name }}" />
                                    <div class="flex flex-col justify-center">
                                        <div class="text-base font-semibold text-gray-900">{{ $item->name }}</div>
                                        <div class="text-sm font-light text-slate-500">{{ $item->email }}</div>
                                        <div class="text-xs font-thin text-slate-400">
                                            @foreach ($item->roles as $role)
                                                <span
                                                    class="mr-2 rounded bg-indigo-100 px-2.5 py-0.5 text-sm font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="inline-flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.show', $item->id) }}">
                                        <x-icon name="eye" class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                    </a>
                                    @if ($item->show_edit_remove_btn)
                                        <a href="{{ route('admin.users.edit', $item->id) }}">
                                            <x-icon name="pencil-square"
                                                class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                        </a>
                                        <a href="{{ route('admin.users.destroy', ['user' => $item->id]) }}"
                                            onclick="event.preventDefault(); if (confirm('Do you want to remove this?')) {
                                            document.getElementById('delete-role-{{ $item->id }}').submit();
                                        }">
                                            <x-icon name="trash"
                                                class="h-5 w-5 cursor-pointer hover:text-rose-800" />
                                        </a>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="confirm('Are you sure you want to delete this record?') || event.stopImmediatePropagation()"
                                            wire:click="deleteSingleRecord({{ $item->id }})"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="flex flex-col items-center justify-center">
                                    <img src="{{ asset('img/empty.png') }}" class="h-52 w-auto" alt="Empty Data">
                                    <p>Aplikasi belum memiliki users.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </div>

            </x-table>

            <div class="pt-8">
                {!! $users->links() !!}
            </div>

        </x-card>
    </div>
</div>
