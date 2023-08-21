<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-5 pb-8">
                <x-card
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-500 transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <a href="{{ route('admin.pelayanan') }}">
                            <span
                                class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                                <x-icon name="chat-bubble-bottom-center-text"
                                    class="h-10 w-10 text-white transition-all"></x-icon>
                            </span>
                            <div
                                class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                <h2 class="text-xl font-semibold">Layanan Publik</h2>
                                <p>
                                    Mengatur permintaan, memantau status, dan memberikan respons yang cepat untuk
                                    meningkatkan pelayanan dan kepuasan pengguna.
                                </p>
                            </div>
                        </a>
                    </div>
                </x-card>
                <x-card
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full bg-rose-500 transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <a href="{{ route('admin.users.index') }}">
                            <span
                                class="grid h-20 w-20 place-items-center rounded-full bg-rose-500 transition-all duration-300 group-hover:bg-rose-400">
                                <x-icon name="users" class="h-10 w-10 text-white transition-all"></x-icon>
                            </span>
                            <div
                                class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                <h2 class="text-xl font-semibold">Pengguna Aplikasi</h2>
                                <p>
                                    Pusat kontrol bagi admin untuk memverifikasi, mengatur peran, hak akses, dan
                                    mengawasi
                                    aktivitas
                                    pengguna dalam aplikasi layanan publik.
                                </p>
                            </div>
                        </a>
                    </div>
                </x-card>
                <x-card
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full bg-indigo-500 transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <a href="{{ route('admin.setting.update') }}">
                            <span
                                class="grid h-20 w-20 place-items-center rounded-full bg-indigo-500 transition-all duration-300 group-hover:bg-indigo-400">
                                <x-icon name="cog-8-tooth" class="h-10 w-10 text-white transition-all"></x-icon>
                            </span>
                            <div
                                class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                                <p>Halaman untuk mengelola pengaturan aplikasi dengan mudah. Mengubah konfigurasi,
                                    manajemen
                                    fitur, dan menganalisis kinerja untuk optimalisasi dan pengembangan yang efisien.
                                </p>
                            </div>
                        </a>
                    </div>
                </x-card>
            </div>

            <div class="flex flex-col md:flex-row flex-wrap gap-5 pb-8">

            </div>
        </div>
    </div>
</x-app-layout>
