<footer class="p-4 bg-white sm:p-6 dark:bg-gray-800">
    <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <div class="flex flex-row">
                    <div>
                        <a href="/" class="flex items-center">
                            <img src="{{ $setting['app_logo'] }}" class="mr-3 h-20"
                                alt="{{ $setting['application_name'] }}" />
                        </a>
                    </div>
                    <div class="space-y-2">
                        <h2 class="self-center text-2xl font-semibold hitespace-nowrap dark:text-white">
                            {{ $setting['application_name'] }}</h2>
                        <p class="self-center text-sm font-medium text-slate-500 hitespace-nowrap dark:text-white">
                            {{ $setting['app_description'] }}</p>
                        <div class="self-center text-sm font-medium text-slate-500 hitespace-nowrap dark:text-white">
                            <x-icon name="envelope" class="h-4 w-4"></x-icon>
                            <span>{{ $setting['email_contact'] }}</span>
                        </div>
                        <div class="self-center text-sm font-medium text-slate-500 hitespace-nowrap dark:text-white">
                            <x-icon name="phone" class="h-4 w-4"></x-icon>
                            <span>{{ $setting['phone'] }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                {{-- <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Flowbite</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Tailwind CSS</a>
                        </li>
                    </ul>
                </div> --}}
                {{-- <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline ">Github</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Discord</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a
                    href="#" class="hover:underline">{{ $setting['application_name'] }}</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <p class="text-xs text-gray-500">
                    Made with ❤️ by
                    <a href="#"
                        class="text-gray-500 bg-clip-text hover:text-transparent hover:bg-gradient-to-tr hover:from-purple-400 hover:to-pink-600 dark:hover:text-white">
                        Adi Arta Wibawa
                    </a>
                </p>
                <p class="text-xs text-gray-500">|</p>
                <p class="text-xs text-gray-500 hover:text-gray-900 dark:hover:text-white">ver. 1.0</p>
            </div>
        </div>
    </div>
</footer>
