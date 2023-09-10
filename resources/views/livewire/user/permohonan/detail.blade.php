<div>
    <ol class="relative border-l border-gray-200 dark:border-gray-700">
        @forelse ($riwayat as $item)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-indigo-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-indigo-900">
                    @if ($item->aktivitas == 3)
                        <x-icon name="x-circle" class="w-5 h-5 text-rose-800 dark:text-rose-300" />
                    @else
                        <x-icon name="check-circle" class="w-5 h-5 text-indigo-800 dark:text-indigo-300" />
                    @endif
                </span>
                <h3
                    class="flex items-center mb-1 text-base font-semibold {{ $item->aktivitas == 3 ? 'text-rose-900 dark:text-rose-900' : 'text-gray-900 dark:text-white' }}">
                    @switch($item->aktivitas)
                        @case(1)
                            Permohonan layanan Anda sudah diterima
                        @break

                        @case(2)
                            Permohonan layanan Anda sedang diproses
                        @break

                        @case(3)
                            Permohonan layanan Anda dikembalikan
                        @break

                        @case(4)
                            Permohonan layanan Anda telah selesai
                        @break

                        @default
                            Permohonan layanan baru Anda buat
                    @endswitch
                    @if ($loop->first)
                        <span
                            class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300 ml-3">
                            Terbaru
                        </span>
                    @endif
                </h3>
                <time class="block mb-2 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">Dibuat
                    pada {{ $item->created_at->format('l, j F Y H:i:s') }}</time>
                <p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{ $item->keterangan }}
                </p>
            </li>
            @empty
                <p>Belum ada data riwayat</p>
            @endforelse
        </ol>
    </div>
