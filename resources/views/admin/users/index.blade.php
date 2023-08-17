<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card>
                <div class="space-y-2 pb-12 text-gray-900">
                    <h2 class="text-xl font-semibold">Pengguna Aplikasi</h2>
                    <p class="text-sm text-slate-500">
                        Pusat kontrol bagi admin untuk memverifikasi, mengatur peran, hak akses, dan mengawasi aktivitas
                        pengguna dalam aplikasi layanan publik.
                    </p>
                </div>

                <div class="flex flex-row items-center justify-between bg-white pb-8 dark:bg-gray-800">
                    <div>
                        <x-button color="indigo" icon="user-plus" size="small" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'tambah-pengguna')">Tambahkan
                            Pengguna</x-button>
                    </div>
                    <div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="block w-80 rounded-md border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Search for items" />
                        </div>
                    </div>
                </div>

                <x-table striped="true">
                    <x-slot name="header">
                        <th><x-checkbox /></th>
                        <th>Pengguna</th>
                        <th>Terdaftar pada</th>
                        <th>Aksi</th>
                    </x-slot>
                    @forelse ($users as $item)
                        <tr>
                            <td><x-checkbox /></td>
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
                                    <button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-pengguna')">
                                        <x-icon name="pencil-square"
                                            class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                    </button>
                                    <button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'lihat-pengguna')">
                                        <x-icon name="eye" class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                    </button>
                                    <form action="{{ route('admin.users.destroy', ['user' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-transparent">
                                            <x-icon name="trash" class="h-5 w-5 cursor-pointer hover:text-rose-800" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>Belum ada pengguna yang terdaftar</p>
                    @endforelse
                </x-table>
                <div class="pt-8">{!! $users->withQueryString()->links() !!}</div>
            </x-card>
        </div>
    </div>

    <x-modal name="tambah-pengguna" focusable>
        <form method="post" action="{{ route('admin.users.store') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Menambahkan Pengguna Baru') }}</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Silahkan tambahkan informasi pengguna baru') }}
            </p>

            <div class="mt-6">
                <x-input label="Nama Pengguna" name="name" required="true" value="{{ old('name') }}" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input label="Email Pengguna" name="email" type="email" required="true"
                    value="{{ old('email') }}" autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input label="Password Pengguna" name="password" type="password" required="true" viewable="true"
                    suffix="eye" value="{{ old('password') }}" autofocus />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-button>

                <x-button can_submit="true" color="indigo" class="ml-3" size="small">
                    {{ __('Tambahkan') }}
                </x-button>
            </div>
        </form>
    </x-modal>

    {{-- <x-modal name="edit-pengguna" focusable>
        <form method="post" action="{{ route('admin.users.update') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Sunting Pengguna') }}</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Menyunting data pengguna aplikasi') }}
            </p>

            <div class="mt-6">
                <x-input label="Nama Pengguna" name="name" required="true" value="{{ old('name') }}"
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input label="Email Pengguna" name="email" type="email" required="true"
                    value="{{ old('email') }}" autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>
            <div class="mt-4">
                <x-input label="Password Pengguna" name="password" type="password" required="true" viewable="true"
                    suffix="eye" value="{{ old('password') }}" autofocus />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-button>

                <x-button can_submit="true" color="indigo" class="ml-3" size="small">
                    {{ __('Sunting') }}
                </x-button>
            </div>
        </form>
    </x-modal> --}}

    {{-- <x-modal name="edit-pengguna" focusable>
        <form method="post" action="{{ route('admin.users.show') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Informasi Pengguna') }}</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Detail informasi pengguna aplikasi') }}
            </p>



            <div class="mt-6 flex justify-end">
                <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-button>

                <x-button can_submit="true" color="indigo" class="ml-3" size="small">
                    {{ __('Tambahkan') }}
                </x-button>
            </div>
        </form>
    </x-modal> --}}
</x-app-layout>
