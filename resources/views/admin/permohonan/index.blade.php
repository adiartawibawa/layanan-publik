<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permohonan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-full">
                    <section>
                        <header class="mb-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Permohonan Layanan') }}</h2>

                            <p class="mt-4 text-sm text-gray-500/90 dark:text-gray-400">
                                {{ __('Halaman yang digunakan untuk pengelolaan layanan publik secara efisien. Mengatur permintaan, memantau status, dan memberikan respons yang cepat untuk meningkatkan pelayanan dan kepuasan pengguna.') }}
                            </p>
                        </header>

                        <div class="py-5">
                            <div class="flex items-center justify-between pb-4">
                                <div>
                                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                        type="button">
                                        <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 mr-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                                        </svg>
                                        Last 30 days
                                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="dropdownRadio"
                                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                                        data-popper-reference-hidden="" data-popper-escaped=""
                                        data-popper-placement="top"
                                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownRadioButton">
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-1" type="radio" value=""
                                                        name="filter-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-1"
                                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                        day</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input checked="" id="filter-radio-example-2" type="radio"
                                                        value="" name="filter-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-2"
                                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                        7 days</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-3" type="radio" value=""
                                                        name="filter-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-3"
                                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                        30 days</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-4" type="radio" value=""
                                                        name="filter-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-4"
                                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                        month</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="filter-radio-example-5" type="radio" value=""
                                                        name="filter-radio"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="filter-radio-example-5"
                                                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Last
                                                        year</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search"
                                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for items">
                                </div>
                            </div>

                            <x-table divider="thin" striped="true">
                                <x-slot name="header">
                                    <th>
                                        Jenis
                                        <x-icon name="bars-arrow-down" class="w-4 h-4" />
                                        <x-icon name="bars-arrow-up" class="w-4 h-4" />
                                    </th>
                                    <th>ID Permohonan</th>
                                    <th>Diverifikasi</th>
                                    <th>Status Terakhir</th>
                                    <th>Aksi</th>
                                </x-slot>
                                @forelse ($permohonans as $item)
                                    <tr>
                                        <td>{{ $item->layanan->name }}</td>
                                        <td>{{ $item->kode_mohon }}</td>
                                        <td>{{ $item->verified_at != null ? 'Telah diverifikasi' : 'Belum diverifikasi' }}
                                        </td>
                                        <td>
                                            <span
                                                class="mr-2 rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                                                @switch($item->latestStatus->aktivitas)
                                                    @case(0)
                                                        Dibuat
                                                    @break

                                                    @case(1)
                                                        Diterima
                                                    @break

                                                    @case(2)
                                                        Diproses
                                                    @break

                                                    @case(3)
                                                        Dikembalikan
                                                    @break

                                                    @case(4)
                                                        Selesai
                                                    @break

                                                    @default
                                                        Tidak Diketahui
                                                @endswitch
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.permohonan.show', $item->id) }}">
                                                <x-icon name="eye" class="h-4 w-4"></x-icon>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="flex flex-col items-center justify-center">
                                                    <img src="{{ asset('img/empty.png') }}" class="h-52 w-auto"
                                                        alt="Empty Data">
                                                    <p>Belum ada permohonan masuk.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </x-table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
