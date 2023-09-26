<div>
    <x-dropdown align="right" width="72">
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
            <div id="dropdownNotification"
                class="w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg dark:bg-gray-800 dark:divide-gray-700"
                aria-labelledby="dropdownNotificationButton">
                <div
                    class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                    Pemberitahuan
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($user->unreadNotifications as $notification)
                        @role('Root')
                            <a href="{{ route('admin.permohonan.notification', ['permohonan' => $notification->data['permohonan'], 'notification' => $notification->id]) }}"
                                class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            @else
                                <a href="{{ route('permohonan.riwayat', ['permohonan' => $notification->data['permohonan'], 'notification' => $notification->id]) }}"
                                    class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                @endrole

                                <div class="w-full pl-3">
                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">Pemberitahuan dari
                                        <span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $notification->data['layanan'] }}</span>
                                        :
                                        @if ($user->hasRole('Admin'))
                                            Anda memiliki sebuah permohonan baru.
                                        @else
                                            <div class="text-xs dark:text-white">
                                                <span class="font-semibold text-gray-900 ">
                                                    [{{ Str::upper($notification->data['keterangan']['status']) }}]
                                                </span>
                                                {{ $notification->data['keterangan']['keterangan'] }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-xs text-blue-600 dark:text-blue-500">
                                        {{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 text-xs mb-1.5 dark:text-gray-400 p-4"> Anda tidak mempunyai
                                pemberitahuan
                                baru </p>
                    @endforelse
                </div>
                {{-- <a href="#"
                    class="block py-2 text-sm font-medium text-center text-gray-900   hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                    <div class="inline-flex items-center ">
                        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                            <path
                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                        Lihat semua
                    </div>
                </a> --}}
            </div>
        </x-slot>
    </x-dropdown>
</div>
