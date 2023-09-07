<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="mb-8">
                <div class="w-2/3">
                    <x-card title="Permohonan Saya">
                        @forelse ($permohonans as $item)
                            <div class="mb-12">
                                <div class="w-full">
                                    <div class="flex flex-row gap-2">
                                        <img class="h-32 w-auto"
                                            src="https://upload.wikimedia.org/wikipedia/commons/3/31/MM_QRcode.png"
                                            alt="Kode Permohonan" srcset="">
                                        <div class="w-full flex flex-col max-h-fulll justify-between">
                                            <div class="text-xl font-semibold text-gray-800 mb-2">
                                                {{ $item->layanan_name }}
                                            </div>
                                            <div class="text-sm text-gray-600 mb-1">Kode Permohonan :
                                                <span class="font-semibold">{{ $item->kode_mohon }}</span>
                                            </div>
                                            <div class="text-sm text-gray-600 mb-1">Dibuat :
                                                {{ $item->created_at->diffForHumans() }}</div>
                                            <div class="mb-auto text-sm text-gray-600">Status Terakhir :
                                                @switch($item->status_aktivitas)
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
                                            <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                                                @switch($item->status_aktivitas)
                                                    @case(1)
                                                        <div class="bg-indigo-600 text-xs font-medium text-indigo-100 text-center p-0.5 leading-none rounded-full"
                                                            style="width: {{ ($item->status_aktivitas / 3) * 100 }}%">
                                                            {{ round(($item->status_aktivitas / 3) * 100) }} %</div>
                                                    @break

                                                    @case(2)
                                                        <div class="bg-indigo-600 text-xs font-medium text-indigo-100 text-center p-0.5 leading-none rounded-full"
                                                            style="width: {{ ($item->status_aktivitas / 3) * 100 }}%">
                                                            {{ round(($item->status_aktivitas / 3) * 100) }} %</div>
                                                    @break

                                                    @case(3)
                                                        <div class="bg-red-600 text-xs font-medium text-red-100 text-center p-0.5 leading-none rounded-full"
                                                            style="width: 100%">100 %</div>
                                                    @break

                                                    @case(4)
                                                        <div class="bg-indigo-600 text-xs font-medium text-indigo-100 text-center p-0.5 leading-none rounded-full"
                                                            style="width: 100%"> 100 %</div>
                                                    @break

                                                    @default
                                                        <div class="bg-indigo-600 text-xs font-medium text-indigo-100 text-center p-0.5 leading-none rounded-full"
                                                            style="width: 0%"> 0%</div>
                                                @endswitch

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div>Anda belum ada ajuan permohonan layanan</div>
                                <div>Untuk membuat permohonan layanan Anda dapat mengklik tautan berikut <a
                                        class="text-indigo-800 underline" href="{{ route('permohonan.index') }}">Buat
                                        Permohonan</a></div>
                            @endforelse
                        </x-card>
                    </div>
                </section>

                <section class="mb-8">
                    <x-card>
                    </x-card>
                </section>
            </div>
        </div>
    </x-app-layout>
