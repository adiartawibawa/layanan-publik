<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">{{ __('Dashboard') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <section class="mb-8 flex flex-col md:flex-row gap-4">
                <div class="w-2/3">
                    <x-card title="Permohonan Saya">
                        @forelse ($permohonans as $item)
                            <div class="mb-12">
                                <div class="w-full">
                                    <div class="flex flex-row gap-2">
                                        {{--
                                    <img
                                        class="h-32 w-auto"
                                        src="https://upload.wikimedia.org/wikipedia/commons/3/31/MM_QRcode.png"
                                        alt="Kode Permohonan"
                                        srcset=""
                                    />
                                    --}}
                                        <div class="h-32 w-32 object-cover object-center">
                                            {!! QrCode::size(128)->style('round')->generate($item->kode_mohon) !!}
                                        </div>
                                        <div class="max-h-fulll flex w-full flex-col justify-between">
                                            <div class="mb-2 text-xl font-semibold text-gray-800">
                                                {{ $item->layanan_name }}
                                            </div>
                                            <div class="mb-1 text-sm text-gray-600">
                                                Kode Permohonan :
                                                <span class="font-semibold">{{ $item->kode_mohon }}</span>
                                            </div>
                                            <div class="mb-1 text-sm text-gray-600">
                                                Dibuat : {{ $item->created_at->diffForHumans() }}
                                            </div>
                                            <div class="mb-auto text-sm text-gray-600">
                                                Status Terakhir : @switch($item->status_aktivitas)
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
                                            <div class="w-full rounded-full bg-gray-200 dark:bg-gray-700">
                                                @switch($item->status_aktivitas)
                                                    @case(1)
                                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                                            style="width: {{ ($item->status_aktivitas / 3) * 100 }}%">
                                                            {{ round(($item->status_aktivitas / 3) * 100) }} %
                                                        </div>
                                                    @break

                                                    @case(2)
                                                        <div class="rounded-full bg-indigo-600 p-0.5 text-center text-xs font-medium leading-none text-indigo-100"
                                                            style="width: {{ ($item->status_aktivitas / 3) * 100 }}%">
                                                            {{ round(($item->status_aktivitas / 3) * 100) }} %
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
                            </div>
                            @empty
                                <div>Anda belum ada ajuan permohonan layanan</div>
                                <div>
                                    Untuk membuat permohonan layanan Anda dapat mengklik tautan berikut
                                    <a class="text-indigo-800 underline" href="{{ route('permohonan.index') }}">Buat
                                        Permohonan</a>
                                </div>
                            @endforelse
                        </x-card>

                    </div>
                    <div class="w-1/3">
                        Riwayat Permohonan
                    </div>
                </section>

            </div>
        </div>
    </x-app-layout>
