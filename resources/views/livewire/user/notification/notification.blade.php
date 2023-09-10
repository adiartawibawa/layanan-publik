<div>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <div
                class="relative inline-flex cursor-pointer items-center justify-center rounded-md border border-transparent bg-white p-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                <x-icon name="bell" class="h-6 w-6" />
                <div
                    class="absolute -right-0.5 -top-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full border-2 border-white bg-red-500 text-xs font-bold text-white dark:border-gray-900">
                    8
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link href="#"> Notifikasi </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>
