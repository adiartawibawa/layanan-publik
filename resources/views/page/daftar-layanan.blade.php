<x-landing-layout>
    <section class="bg-gray-50 dark:bg-gray-900" id="panduan">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:py-16">
            <h2
                class="mb-8 text-center text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl lg:mb-16">
                Daftar Layanan
            </h2>

            {{-- @dd($layanans) --}}
            <div class="mx-auto mb-20 max-w-5xl">
                <div class="flex flex-wrap items-start justify-center gap-2">
                    @forelse ($layanans as $item)

                        <div class="mx-auto flex max-w-xs flex-col overflow-hidden rounded">
                            <a href="#">
                                <img class="w-full shadow-md"
                                    src="https://images.unsplash.com/photo-1562654501-a0ccc0fc3fb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80"
                                    alt="Sunset in the mountains" />
                            </a>
                            <div class="relative m-5 -mt-16 bg-white px-10 pb-16 pt-5 shadow-md">
                                <a href="#" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'detail-layanan-{{ $item->id }}')"
                                    class="mb-2 inline-block text-lg font-semibold uppercase transition duration-500 ease-in-out hover:text-indigo-600">
                                    {{ $item->name }}
                                </a>
                                <p class="text-sm text-gray-500">{{ Str::limit($item->desc, 75, '...') }}</p>
                                <p class="mt-5 text-xs text-gray-600">
                                    Estimasi waktu layanan
                                    <span class="text-xs text-indigo-600 transition duration-500 ease-in-out">
                                        {{ $item->estimasi }}
                                    </span>
                                    Hari
                                </p>
                            </div>
                        </div>

                        <x-modal name="detail-layanan-{{ $item->id }}" focusable>
                            <div class="p-4">
                                <div class="py-4">
                                    <h2 class="mb-4 text-xl font-semibold uppercase">{{ $item->name }}</h2>
                                    <p class="text-sm text-gray-500">{{ $item->desc }}</p>
                                </div>
                                @forelse ($item->ketentuans as $ketentuan)
                                    <div>{{ $ketentuan->name }}</div>
                                @empty
                                    <div>belum ada ketentuan</div>
                                @endforelse
                                <div class="mt-6 flex justify-end">
                                    <x-button type="secondary" size="small" x-on:click="$dispatch('close')">
                                        {{ __('Kembali') }}
                                    </x-button>

                                    <x-button can_submit="true" color="indigo" class="ml-3" size="small">
                                        {{ __('Ajukan Permohonan') }}
                                    </x-button>
                                </div>
                            </div>
                        </x-modal>

                    @empty
                        <div>Belum ada layanan yang tersedia</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>
