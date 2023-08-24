<div class="flex flex-row items-center justify-between bg-white pb-8 dark:bg-gray-800">
    <div>
        <x-button tag="a" href="{{ route('admin.users.create') }}" color="indigo" icon="user-plus" size="small">
            Tambahkan Pengguna
        </x-button>
    </div>
    <div>
        <form method="GET" action="{{ route('admin.users.index') }}">
            <label for="search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="search" name="search" value="{{ !empty($search) ? $search : '' }}"
                    class="block w-80 rounded-md border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Search for items" />
            </div>
        </form>
    </div>
</div>
