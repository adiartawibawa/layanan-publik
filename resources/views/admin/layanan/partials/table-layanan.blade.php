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
                <th>Diverifikasi</th>
                <th>Status Terakhir</th>
                <th>Aksi</th>
            </x-slot>
            @forelse ($permohonans as $item)
                <tr>
                    <td>{{ $item->layanan->name }}</td>
                    <td>{{ $item->kode_mohon }}</td>
                    <td>{{ $item->verified_at != null ? 'Telah diverifikasi' : 'Belum diverifikasi' }}</td>
                    <td>
                        <span
                            class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">
                            @switch($item->latestStatus->aktivitas)
                                @case(0)
                                    Dibuat
                                @break

                                @case(1)
                                    Diterima
                                @break

                                @case(2)
                                    Diproses
                                @break

                                @case(3)
                                    Dikembalikan
                                @break

                                @case(4)
                                    Selesai
                                @break

                                @default
                                    Tidak Diketahui
                            @endswitch
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.permohonan.show', $item->id) }}">
                            <x-icon name="eye" class="h-4 w-4"></x-icon>
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>Belum ada permohonan layanan masuk</tr>
                @endforelse
            </x-table>
        </div>

    </section>
