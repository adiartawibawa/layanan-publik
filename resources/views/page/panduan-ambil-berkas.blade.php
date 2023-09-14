<x-landing-layout>
    <section class="bg-gray-50 dark:bg-gray-900" id="panduan">
        <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
            <h2
                class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                Panduan Pengambilan Berkas</h2>

            <div class="mx-auto mb-20 max-w-5xl">
                @forelse ($panduanAmbilBerkas as $item)
                    @if ($loop->first)
                        <div class="flex flex-col-reverse w-full md:flex-row-reverse items-start justify-end gap-4">
                            <div
                                class="flex w-full md:w-1/2 items-start gap-4  bg-white px-6 pt-6 pb-10 rounded-lg shadow-xl">
                                <div class="rounded-full bg-indigo-500 px-4 py-2 text-white">{{ $item->step }}</div>
                                <div class="text-slate-600">
                                    <div class="text-2xl font-bold">{{ $item->title }}</div>
                                    <p class="text-sm text-slate-500">{{ $item->content }}</p>
                                    @if ($item->file != null)
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-indigo-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                            <x-icon name="document-arrow-down" class="w-8 h-8 mr-2.5" />
                                            Panduan {{ $item->title }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="w-full md:w-1/2">
                                <img class="h-64 w-full rounded-lg object-cover shadow-xl" src="{{ $item->image }}"
                                    alt="{{ $item->step }}" />
                            </div>
                        </div>
                    @else
                        @if ($item->step % 2 == 0)
                            <!-- left to right -->
                            <div class="mx-auto my-4 h-32 max-w-xs md:max-w-3xl">
                                <div class="flex h-full flex-row-reverse">
                                    <div
                                        class="mt-[62px] h-16 w-1/2 rounded-tr-lg border-r-2 border-t-2 border-dashed border-gray-300">
                                    </div>
                                    <div
                                        class="h-16 w-1/2 rounded-bl-lg border-b-2 border-l-2 border-dashed border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <!-- direction flex row  -->
                            <div class="flex flex-col-reverse w-full md:flex-row items-start justify-end gap-4">
                                <div
                                    class="flex w-full md:w-1/2 items-start gap-4  bg-white px-6 pt-6 pb-10 rounded-lg shadow-xl">
                                    <div class="rounded-full bg-indigo-500 px-4 py-2 text-white">{{ $item->step }}
                                    </div>
                                    <div class="text-slate-600">
                                        <div class="text-2xl font-bold">{{ $item->title }}</div>
                                        <p class="text-sm text-slate-500">{{ $item->content }}</p>
                                        @if ($item->file != null)
                                            <a href="#"
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-indigo-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                                <x-icon name="document-arrow-down" class="w-8 h-8 mr-2.5" />
                                                Panduan {{ $item->title }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <img class="h-64 w-full rounded-lg object-cover shadow-xl"
                                        src="{{ $item->image }}" alt="{{ $item->title }}" />
                                </div>
                            </div>
                        @else
                            <!-- right to left -->
                            <div class="mx-auto my-4 h-32 max-w-xs md:max-w-3xl">
                                <div class="grid h-full grid-cols-2">
                                    <div
                                        class="mt-[62px] h-16 rounded-tl-lg border-l-2 border-t-2 border-dashed border-gray-300">
                                    </div>
                                    <div class="h-16 rounded-br-lg border-b-2 border-r-2 border-dashed border-gray-300">
                                    </div>
                                </div>
                            </div>

                            <!-- direction flex row reverse  -->
                            <div class="flex flex-col-reverse w-full md:flex-row-reverse items-start justify-end gap-4">
                                <div
                                    class="flex w-full md:w-1/2 items-start gap-4  bg-white px-6 pt-6 pb-10 rounded-lg shadow-xl">
                                    <div class="rounded-full bg-indigo-500 px-4 py-2 text-white">{{ $item->step }}
                                    </div>
                                    <div class="text-slate-600">
                                        <div class="text-2xl font-bold">{{ $item->title }}</div>
                                        <p class="text-sm text-slate-500">{{ $item->content }}</p>
                                        @if ($item->file != null)
                                            <a href="#"
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-indigo-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                                <x-icon name="document-arrow-down" class="w-8 h-8 mr-2.5" />
                                                Panduan {{ $item->title }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <img class="h-64 w-full rounded-lg object-cover shadow-xl"
                                        src="{{ $item->image }}" alt="{{ $item->title }}" />
                                </div>
                            </div>
                        @endif
                    @endif
                @empty
                    belum ada panduan
                @endforelse
            </div>
        </div>
    </section>
</x-landing-layout>
