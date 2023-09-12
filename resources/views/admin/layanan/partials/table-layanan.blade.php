<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Permohonan Layanan') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Halaman yang digunakan untuk pengelolaan layanan publik secara efisien. Mengatur
                                                                                                                                                                        permintaan, memantau status, dan memberikan respons yang cepat untuk meningkatkan
                                                                                                                                                                        pelayanan dan kepuasan pengguna.') }}
        </p>
    </header>

    <div class="py-5">

        <x-table divider="thin" striped="true">
            <x-slot name="header">
                <th>Jenis</th>
                <th>ID Permohonan</th>
                <th>Status</th>
                <th>Aksi</th>
            </x-slot>
            @forelse ($permohonans as $item)
                <tr>
                    <td>{{ $item->layanan->name }}</td>
                    <td>{{ $item->kode_mohon }}</td>
                    <td>{{ $item->is_valid ? 'Valid' : 'Tidak Valid' }}</td>
                    <td>
                        <a href="{{ route('admin.permohonan.show', $item->id) }}">
                            <x-icon name="eye" class="h-4 w-4"></x-icon>
                        </a>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete-layanan')">
                            <x-icon name="trash" class="h-4 w-4"></x-icon>
                        </button>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'proses-layanan')">
                            <x-icon name="pencil-square" class="h-4 w-4"></x-icon>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>Belum ada permohonan layanan masuk</tr>
            @endforelse
        </x-table>
    </div>

    {{-- <x-modal name="view-layanan" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('View Layanan') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal> --}}

    <x-modal name="delete-layanan" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Hapus Layanan?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <x-modal name="proses-layanan" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Proses Layanan?') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</section>
