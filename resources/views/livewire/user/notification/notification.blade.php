<div>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <div
                class="relative inline-flex cursor-pointer items-center justify-center rounded-md border border-transparent bg-white p-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                <x-icon name="bell" class="h-6 w-6" />
                @if ($user->unreadNotifications->count() !== 0)
                    <div
                        class="absolute -right-0.5 -top-0.5 inline-flex h-5 w-5 items-center justify-center rounded-full border-2 border-white bg-red-500 text-xs font-bold text-white dark:border-gray-900">
                        {{ $user->unreadNotifications->count() }}
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="content">
            @forelse ($user->unreadNotifications as $notification)
                <x-dropdown-link href="#">
                    <h4 class="font-medium text-base text-gray-800 mb-2">{{ $notification->data['status'] }}</h4>
                    <p class="font-normal text-sm text-gray-600 mb-2">{{ $notification->data['keterangan'] }}</p>
                    <p class="font-normal text-xs text-gray-500 mb-2">{{ $notification->created_at->diffForHumans() }}
                    </p>
                </x-dropdown-link>
            @empty
                <x-dropdown-link href="#"> Anda tidak mempunyai pemberitahuan baru </x-dropdown-link>
            @endforelse
        </x-slot>
    </x-dropdown>
</div>
