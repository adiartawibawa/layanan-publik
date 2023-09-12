<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">{{ __('Permohonan Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <section class="mb-8 flex flex-col md:flex-row gap-4">
                @livewire('permohonan.permohonan-masuk', ['permohonan' => $permohonan])
            </section>
        </div>
    </div>

</x-app-layout>
