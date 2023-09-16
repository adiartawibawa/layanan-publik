<div>
    <x-card>
        @forelse ($details as $detail)
            <div class="p-6 text-xl font-extrabold leading-tight text-gray-900 dark:text-white">
                {{ $detail->layanan->name }}
            </div>
            <div class="flex md:flex-row flex-col gap-4">
                <div class="p-6 md:w-1/2 w-full">
                    <div class="flex flex-row gap-4">
                        <div class="h-32 w-32 object-cover object-center">
                            {!! QrCode::size(128)->style('round')->generate($detail->kode_mohon) !!}
                        </div>
                        <div class="max-h-fulll flex w-full flex-col justify-between">
                            <div class="mb-1 text-sm text-gray-600">
                                Kode Permohonan :
                                <span class="font-semibold">{{ $detail->kode_mohon }}</span>
                            </div>
                            <div class="hidden md:block mb-1 text-sm text-gray-600">
                                Dibuat : {{ $detail->created_at->diffForHumans() }}
                            </div>
                            <div class="mb-1 text-sm text-gray-600">
                                Status Terakhir : @switch($detail->status_aktivitas)
                                    @case(1)
                                        <span>Permohonan telah diterima</span>
                                    @break

                                    @case(2)
                                        <span>Permohonan telah diproses</span>
                                    @break

                                    @case(3)
                                        <span class="text-red-600">Permohonan dikembalikan</span>
                                    @break

                                    @case(4)
                                        <span>Permohonan selesai</span>
                                    @break

                                    @default
                                        <span>Permohonan baru dibuat</span>
                                @endswitch
                            </div>
                            <div class="mb-auto text-sm text-gray-600">
                                <button @click="isDetail = !isDetail" wire:click="detail('{{ $detail->id }}')"
                                    class="text-indigo-700 font-semibold">
                                    Selengkapnya
                                </button>
                            </div>
                            <div class="w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                @switch($detail->status_aktivitas)
                                    @case(1)
                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                            style="width: {{ ($detail->status_aktivitas / 3) * 100 }}%">
                                            {{ round(($detail->status_aktivitas / 3) * 100) }} %
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                            style="width: {{ ($detail->status_aktivitas / 3) * 100 }}%">
                                            {{ round(($detail->status_aktivitas / 3) * 100) }} %
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="rounded-full bg-red-600 p-0.5 text-center text-xs font-medium leading-none text-red-100"
                                            style="width: 100%">
                                            100 %
                                        </div>
                                    @break

                                    @case(4)
                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                            style="width: 100%">
                                            100 %
                                        </div>
                                    @break

                                    @default
                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                            style="width: 0%">
                                            0%
                                        </div>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @forelse ($detail->statuses as $item)
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-indigo-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-indigo-900">
                                    @if ($item->aktivitas == 3)
                                        <x-icon name="x-circle" class="w-5 h-5 text-rose-800 dark:text-rose-300" />
                                    @else
                                        <x-icon name="check-circle"
                                            class="w-5 h-5 text-indigo-800 dark:text-indigo-300" />
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
                                <time
                                    class="block mb-2 text-xs font-normal leading-none text-gray-400 dark:text-gray-500">Dibuat
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
                </div>
                @empty
                    <div class="flex flex-col items-center justify-center animate-pulse ">
                        <img class="h-auto w-96 object-cover object-center"
                            src="https://opendoodles.s3-us-west-1.amazonaws.com/clumsy.png" alt="permohonan tidak ditemukan">
                        <div
                            class="p-6 text-sm md:text-md xl:text-xl md:font-extrabold leading-tight text-gray-600/90 dark:text-white text-center">
                            Kode permohonan {{ $kodePermohonan }} tidak ditemukan
                        </div>
                    </div>
                @endforelse
            </x-card>
        </div>
