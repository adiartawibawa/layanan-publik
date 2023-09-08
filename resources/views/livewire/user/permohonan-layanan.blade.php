{{-- @forelse ($permohonans as $item)
    <ul>
        <li class="relative border-b border-gray-200" x-data="{ selected: @json($loop->first) }">
            <button type="button" class="w-full px-8 py-6 text-left"
                @click="selected !== 1 ? selected = 1 : selected = null">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-gray-800">
                        {{ $item->layanan_name }}
                    </div>
                    <span x-bind:class="{ 'rotate-180 duration-700': selected, 'duration-700': !selected }">
                        <x-icon name="chevron-down" class="h-4 w-4" />
                    </span>
                </div>
            </button>

            <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container1"
                x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                <div class="p-6">
                    <div class="flex flex-row gap-4">
                        <div class="h-32 w-32 object-cover object-center">
                            {!! QrCode::size(128)->style('round')->generate($item->kode_mohon) !!}
                        </div>
                        <div class="max-h-fulll flex w-full flex-col justify-between">
                            <div class="mb-1 text-sm text-gray-600">
                                Kode Permohonan :
                                <span class="font-semibold">{{ $item->kode_mohon }}</span>
                            </div>
                            <div class="mb-1 text-sm text-gray-600">
                                Dibuat : {{ $item->created_at->diffForHumans() }}
                            </div>
                            <div class="mb-1 text-sm text-gray-600">
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
                            <div class="mb-auto text-sm text-gray-600">
                                <button @click="isDetail = !isDetail"
                                    class="text-indigo-700 font-semibold">Detail</button>
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
        </li>
    </ul>
    @empty
        <div>Anda belum ada ajuan permohonan layanan</div>
        <div> Untuk membuat permohonan layanan Anda dapat mengklik tautan berikut
            <a class="text-indigo-800 underline" href="{{ route('permohonan.index') }}">
                Buat Permohonan
            </a>
        </div>
    @endforelse --}}
