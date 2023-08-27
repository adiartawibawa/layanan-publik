<section class="bg-white dark:bg-gray-900" id="panduan">
    <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
        {{-- <h2
            class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
            Panduan</h2> --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 mx-auto text-gray-600">
            <div class="group w-full md:w-1/5">
                <a href="{{ route('daftar.layanan') }}" class="flex flex-col space-y-2 justify-center items-center">
                    <x-icon name="document-text" class="w-14 h-14 group-hover:hover:scale-125 duration-300"></x-icon>
                    <p
                        class="text-center font-bold text-xl bg-clip-text group-hover:text-transparent group-hover:bg-gradient-to-tr group-hover:from-purple-400 group-hover:to-pink-600">
                        Daftar Layanan</p>
                </a>
            </div>
            <div class="group w-full md:w-1/5">
                <a href="{{ route('panduan.registrasi') }}" class="flex flex-col space-y-2 justify-center items-center">
                    <x-icon name="user-circle" class="w-14 h-14 group-hover:hover:scale-125 duration-300"></x-icon>
                    <p
                        class="text-center font-bold text-xl bg-clip-text group-hover:text-transparent group-hover:bg-gradient-to-tr group-hover:from-purple-400 group-hover:to-pink-600">
                        Registrasi</p>
                </a>
            </div>
            <div class="group w-full md:w-1/5">
                <a href="{{ route('panduan.permohonan') }}" class="flex flex-col space-y-2 justify-center items-center">
                    <x-icon name="rocket-launch" class="w-14 h-14 group-hover:hover:scale-125 duration-300"></x-icon>
                    <p
                        class="text-center font-bold text-xl bg-clip-text group-hover:text-transparent group-hover:bg-gradient-to-tr group-hover:from-purple-400 group-hover:to-pink-600">
                        Panduan Permohonan</p>
                </a>
            </div>
            <div class="group w-full md:w-1/5">
                <a href="{{ route('cek.permohonan') }}" class="flex flex-col space-y-2 justify-center items-center">
                    <x-icon name="qr-code" class="w-14 h-14 group-hover:hover:scale-125 duration-300"></x-icon>
                    <p
                        class="text-center font-bold text-xl bg-clip-text group-hover:text-transparent group-hover:bg-gradient-to-tr group-hover:from-purple-400 group-hover:to-pink-600">
                        Cek Permohonan</p>
                </a>
            </div>
            <div class="group w-full md:w-1/5">
                <a href="{{ route('panduan.berkas') }}" class="flex flex-col space-y-2 justify-center items-center">
                    <x-icon name="printer" class="w-14 h-14 group-hover:hover:scale-125 duration-300"></x-icon>
                    <p
                        class="text-center font-bold text-xl bg-clip-text group-hover:text-transparent group-hover:bg-gradient-to-tr group-hover:from-purple-400 group-hover:to-pink-600">
                        Pengambilan Berkas</p>
                </a>
            </div>
        </div>
    </div>
</section>
