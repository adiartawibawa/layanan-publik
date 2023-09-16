<x-landing-layout>
    <div>
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 dark:text-white">
                        Pantau Permohonan Anda
                    </h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                        Silahkan masukkan kode permohonan Anda
                    </p>
                    <form action="{{ route('check.permohonan') }}" method="GET">
                        <x-input name="kode"
                            label="{{ $kodePermohonan != '' ? 'Kode Permohonan Anda' : 'Masukan Kode Permohonan Anda' }}"
                            selected_value="{{ $kodePermohonan }}" />
                    </form>
                </div>
            </div>
        </section>

        @if ($kodePermohonan != null)
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
                    <div class="mx-auto w-full">
                        @livewire('permohonan.riwayat', ['kodePermohonan' => $kodePermohonan])
                    </div>
                </div>
            </section>
        @endif
    </div>
</x-landing-layout>
