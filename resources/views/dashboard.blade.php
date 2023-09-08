<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">{{ __('Dashboard') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <section class="mb-8 flex flex-col md:flex-row gap-4" x-data="{ isDetail: false }">
                <div class="w-full md:w-2/3">
                    <x-card title="Permohonan Saya">
                        @livewire('user.permohonan-layanan')
                    </x-card>
                </div>
                <div class="w-full md:w-1/3" x-show="isDetail"
                    x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300"
                    x-transition:enter-start="opacity-0 -translate-x-8"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 -translate-x-12">

                    <x-card>
                        <div class="flex flex-row items-center justify-between w-full">
                            <div class="uppercase tracking-wide text-xs text-gray-500/90 mb-2">Riwayat Permohonan</div>
                            <button @click="isDetail = !isDetail"
                                :class="isDetail ? 'rotate-0 duration-500' : 'rotate-90 duration-500'">
                                <x-icon class="h-6 w-6 text-gray-500/90 cursor-pointer" name="x-mark"></x-icon>
                            </button>

                        </div>
                        {{-- @livewire('permohonan-timeline', ['permohonan' => $permohonan]) --}}
                    </x-card>
                </div>
            </section>

        </div>
    </div>

    <script>
        function sendDataToLivewire() {
            // Ambil nilai permohonan dari x-data
            const permohonanValue = this.permohonan;

            // Kirim nilai permohonan ke komponen Livewire
            Livewire.emit('updatePermohonan', permohonanValue);
        }
    </script>

</x-app-layout>
