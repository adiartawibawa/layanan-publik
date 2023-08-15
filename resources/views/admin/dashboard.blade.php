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
                        <span
                            class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                            <x-icon name="chat-bubble-bottom-center-text"
                                class="h-10 w-10 text-white transition-all"></x-icon>
                        </span>
                        <div
                            class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                            <p>Perfect for learning how the framework works, prototyping a new idea, or creating a
                                demo to share
                                online.</p>
                        </div>
                        <div class="pt-5 text-base font-semibold leading-7">
                            <p>
                                <a href="#"
                                    class="text-sky-500 transition-all duration-300 group-hover:text-white">Selengkapnya
                                    &rarr;
                                </a>
                            </p>
                        </div>
                    </div>
                </x-card>
                <x-card
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full bg-indigo-500 transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <span
                            class="grid h-20 w-20 place-items-center rounded-full bg-indigo-500 transition-all duration-300 group-hover:bg-indigo-400">
                            <x-icon name="ticket" class="h-10 w-10 text-white transition-all"></x-icon>
                        </span>
                        <div
                            class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                            <p>Perfect for learning how the framework works, prototyping a new idea, or creating a
                                demo to share
                                online.</p>
                        </div>
                        <div class="pt-5 text-base font-semibold leading-7">
                            <p>
                                <a href="#"
                                    class="text-indigo-500 transition-all duration-300 group-hover:text-white">Selengkapnya
                                    &rarr;
                                </a>
                            </p>
                        </div>
                    </div>
                </x-card>
                <x-card
                    class="group relative cursor-pointer overflow-hidden bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                    <span
                        class="absolute top-10 z-0 h-20 w-20 rounded-full bg-rose-500 transition-all duration-300 group-hover:scale-[10]"></span>
                    <div class="relative z-10 mx-auto max-w-md">
                        <span
                            class="grid h-20 w-20 place-items-center rounded-full bg-rose-500 transition-all duration-300 group-hover:bg-rose-400">
                            <x-icon name="users" class="h-10 w-10 text-white transition-all"></x-icon>
                        </span>
                        <div
                            class="space-y-6 pt-5 text-base leading-7 text-gray-600 transition-all duration-300 group-hover:text-white/90">
                            <p>Perfect for learning how the framework works, prototyping a new idea, or creating a
                                demo to share
                                online.</p>
                        </div>
                        <div class="pt-5 text-base font-semibold leading-7">
                            <p>
                                <a href="#"
                                    class="text-rose-500 transition-all duration-300 group-hover:text-white">Selengkapnya
                                    &rarr;
                                </a>
                            </p>
                        </div>
                    </div>
                </x-card>
            </div>

            <div class="grid grid-cols-1 pb-8">
                <x-card title="Grafik" has_shadow="true">
                    <x-slot name="header"></x-slot>
                    <div x-data="app()" x-cloak class="px-4">
                        <div class="w-full mx-auto py-24">
                            <div class="p-6 bg-white">
                                <div class="md:flex md:justify-between md:items-center">
                                    <div>
                                        <h2 class="text-xl text-gray-800 font-bold leading-tight">Product Sales</h2>
                                        <p class="mb-2 text-gray-600 text-sm">Monthly Average</p>
                                    </div>

                                    <!-- Legends -->
                                    <div class="mb-4">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
                                            <div class="text-sm text-gray-700">Sales</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="line my-8 relative">
                                    <!-- Tooltip -->
                                    <template x-if="tooltipOpen == true">
                                        <div x-ref="tooltipContainer"
                                            class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                                            :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`">
                                            <div class="shadow-xs rounded-lg bg-white p-2">
                                                <div class="flex items-center justify-between text-sm">
                                                    <div>Sales:</div>
                                                    <div class="font-bold ml-2">
                                                        <span x-html="tooltipContent"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>


                                    <!-- Bar Chart -->
                                    <div class="flex -mx-2 items-end mb-2">
                                        <template x-for="data in chartData">

                                            <div class="px-2 w-1/6">
                                                <div :style="`height: ${data}px`"
                                                    class="transition ease-in duration-200 bg-blue-600 hover:bg-blue-400 relative"
                                                    @mouseenter="showTooltip($event); tooltipOpen = true"
                                                    @mouseleave="hideTooltip($event)">
                                                    <div x-text="data"
                                                        class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm">
                                                    </div>
                                                </div>
                                            </div>

                                        </template>
                                    </div>

                                    <!-- Labels -->
                                    <div class="border-t border-gray-400 mx-auto"
                                        :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
                                    <div class="flex -mx-2 items-end">
                                        <template x-for="data in labels">
                                            <div class="px-2 w-1/6">
                                                <div class="bg-red-600 relative">
                                                    <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto"
                                                        style="width: 1px"></div>
                                                    <div x-text="data"
                                                        class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function app() {
                            return {
                                chartData: [112, 10, 225, 134, 101, 80, 50, 100, 200],
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                                tooltipContent: '',
                                tooltipOpen: false,
                                tooltipX: 0,
                                tooltipY: 0,
                                showTooltip(e) {
                                    console.log(e);
                                    this.tooltipContent = e.target.textContent
                                    this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
                                    this.tooltipY = e.target.clientHeight + e.target.clientWidth;
                                },
                                hideTooltip(e) {
                                    this.tooltipContent = '';
                                    this.tooltipOpen = false;
                                    this.tooltipX = 0;
                                    this.tooltipY = 0;
                                }
                            }
                        }
                    </script>
                    <x-slot name="footer">
                        <div class="flex justify-between p-4">
                            <div class="flex space-x-4">
                                <x-icon name="heart" class="h-8 w-8...k" />
                                <x-icon name="chat-bubble-oval-left-ellipsis" class="h-8 w-8...k" />
                                <x-icon name="arrow-uturn-left" class="h-8 w-8...k" />
                            </div>
                        </div>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
