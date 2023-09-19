<x-landing-layout>
    @include('layouts.landing.hero')

    @include('layouts.landing.permohonan')

    @include('layouts.landing.panduan')

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">
                    Mari daftarkan permohonan berkas melalui {{ $setting['application_name'] }}
                </h2>
                <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small
                    enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.
                    Small
                    enough to be simple and quick, but big enough to deliver the scope you want at the pace you need.
                </p>
                <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be
                    simple
                    and quick.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                    alt="office content 2">
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white">Statistik Pelayanan Kami</h2>
                <p class="mb-4 font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nisi nunc,
                    tincidunt id semper a, ultrices id leo. Nam rhoncus urna quam, mollis aliquam mi consequat eget. Ut
                    rhoncus, nulla et ornare aliquam, eros purus vehicula justo, et hendrerit nulla ex eget nulla.
                    Nullam vitae nisi libero. Vivamus varius magna eu nisl sollicitudin feugiat. Phasellus malesuada
                    pulvinar ultricies. Duis elementum magna in nibh pharetra commodo. Aliquam id nibh eu lectus
                    convallis consequat. Phasellus fringilla tempor nibh, non fermentum purus tempus in. Morbi gravida
                    tempor bibendum.
                </p>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg flex flex-col-reverse md:flex-row gap-4 w-full">
                <div class="flex flex-col gap-4 w-full md:w-1/3">
                    @livewire('stats.permohonan-stats')
                    @livewire('stats.permohonan-proses')
                    @livewire('stats.permohonan-selesai')
                </div>
                <div class="w-full md:w-2/3">
                    @livewire('stats.jenis-permohonan')
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h2 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 dark:text-white">
                    Ajukan Permohonan Sekarang
                </h2>
                <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, optio.
                </p>
                <a href="#"
                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                    Ajukan Permohonan
                </a>
            </div>
        </div>
    </section>
</x-landing-layout>
