<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaturan Aplikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-statistic number="34,500,100" label="Total payments">
                <x-slot name="icon">
                    <x-icon name="pencil" class="h-16 w-16 text-white rounded-full bg-blue-500"></x-icon>
                </x-slot>
            </x-statistic>
        </div>
    </div>
</x-app-layout>
