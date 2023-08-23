<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaturan Aplikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <div class="space-y-2 pb-8 text-gray-900">
                    <h2 class="text-xl font-semibold">Pengaturan Aplikasi</h2>
                    <p class="text-sm text-slate-500">
                        Halaman untuk mengubah konfigurasi, manajemen fitur, dan menganalisis kinerja untuk optimalisasi
                        dan pengembangan yang efisien.
                    </p>
                </div>

                <div x-data="{ activeTab: 1 }">
                    <div class="border-b border-gray-200 dark:border-gray-700">
                        @if ($categories)
                            <ul role="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                                @keydown.left.prevent.stop="$focus.wrap().prev()"
                                @keydown.home.prevent.stop="$focus.first()" @keydown.end.prevent.stop="$focus.last()"
                                class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                @foreach ($categories as $category)
                                    <?php $index = ++$loop->index; ?>
                                    <li class="mr-2">
                                        <a href="{{ url('admin/setting?category=' . $category) }}"
                                            id="tab-{{ $index }}"
                                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg group"
                                            :class="activeTab === {{ $index }} ?
                                                'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                                                'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                            :tabindex="activeTab === {{ $index }} ? 0 : -1"
                                            :aria-selected="activeTab === {{ $index }}"
                                            aria-controls="tabpanel-{{ $index }}" @click="activeTab = 1"
                                            @focus="activeTab = 1">
                                            <svg class="w-4 h-4 mr-2 "
                                                :class="activeTab === {{ $index }} ?
                                                    ' text-blue-600 dark:text-blue-500' :
                                                    'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                            </svg>{{ ucwords($category) }}
                                        </a>
                                    </li>
                                @endforeach
                                {{-- <li class="mr-2">
                                <a href="#" id="tab-2"
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg group"
                                    :class="activeTab === 2 ?
                                        'text-blue-600 border-blue-600 dark:text-blue-500 dark:border-blue-500' :
                                        'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300'"
                                    :tabindex="activeTab === 2 ? 0 : -1" :aria-selected="activeTab === 2"
                                    aria-controls="tabpanel-2" @click="activeTab = 2" @focus="activeTab = 2">
                                    <svg class="w-4 h-4 mr-2"
                                        :class="activeTab === 2 ? ' text-blue-600 dark:text-blue-500' :
                                            'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300'"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 18">
                                        <path
                                            d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                                    </svg>Dashboard
                                </a>
                            </li> --}}
                            </ul>
                        @endif
                    </div>

                    <div class="relative flex flex-col">
                        <!-- Panel #1 -->
                        <div id="tabpanel-1" class="p-4 dark:bg-gray-800" x-show="activeTab === 1" role="tabpanel"
                            aria-labelledby="tab-1"
                            x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                            x-transition:enter-start="opacity-0 -translate-x-8"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 translate-x-12">

                            {{-- Content goes here --}}
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <form action="{{ url('admin/setting') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="">
                                        <div class="pb-6">
                                            <h4 class="font-semibold">{{ ucwords($currentCategory) }} Settings</h4>
                                        </div>
                                        <div class="">
                                            @foreach ($settings as $setting)
                                                <div class="">
                                                    @include('admin.setting.setting_field', [
                                                        'setting' => $setting,
                                                    ])
                                                </div>
                                                @if ($setting->setting_type == 'file' && get_setting($setting->setting_key, false))
                                                    <div
                                                        class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 md:h-80 mb-8">
                                                        <img src="{{ get_setting($setting->setting_key, false) }}"
                                                            alt=""
                                                            class="absolute inset-0 h-full w-full object-none object-center transition duration-200 group-hover:scale-110">
                                                        <div
                                                            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                                                        </div>
                                                        <div class="relative ml-4 mb-3 inline-block md:ml-5">
                                                            <x-button tag="a" color="red"
                                                                href="{{ url('admin/setting/remove/' . $setting->id) }}"
                                                                size="tiny">Remove</x-button>
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="flex flex-row justify-end items-center gap-2 mt-6">
                                            <x-button size="small" color="indigo" can_submit="true"
                                                id="save-btn">Simpan</x-button>
                                            <x-button size="small" type="secondary" id="reset-btn">Reset</x-button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- Panel #2 -->
                        {{-- <div id="tabpanel-2" class="p-4 dark:bg-gray-800" x-show="activeTab === 2" role="tabpanel"
                            aria-labelledby="tab-2"
                            x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 transform order-first"
                            x-transition:enter-start="opacity-0 -translate-x-8"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-300 transform absolute"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 translate-x-12"> --}}

                        {{-- Content goes here --}}
                        {{-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the
                                <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                                    content</strong>. Clicking another tab will toggle the visibility of this one for
                                the next. The tab JavaScript swaps classes to control the content visibility and
                                styling.
                            </p> --}}
                    </div>
                </div>
        </div>



        </x-card>
        {{-- <div class="section-body">
            <h2 class="section-title">All About Settings</h2>
            <p class="section-lead">
                You can adjust all settings here
            </p>
            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">
                            @if ($categories)
                                <ul class="nav nav-pills flex-column">
                                    @foreach ($categories as $category)
                                        @php
                                            $activeClass = $category == $currentCategory ? 'active' : '';
                                        @endphp
                                        <li class="nav-item"><a href="{{ url('admin/setting?category=' . $category) }}"
                                                class="nav-link {{ $activeClass }}">{{ ucwords($category) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ url('admin/setting') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>{{ ucwords($currentCategory) }} Settings</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($settings as $setting)
                                    <div class="form-group row align-items-center">
                                        <label for="{{ $setting->key }}"
                                            class="form-control-label col-sm-3 text-md-right">{{ $setting->name }}</label>
                                        <div class="col-sm-6 col-md-9">
                                            @include('admin.setting.setting_field', [
                                                'setting' => $setting,
                                            ])
                                        </div>
                                    </div>
                                    @if ($setting->setting_type == 'file' && get_setting($setting->setting_key, false))
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">&nbsp;</label>
                                            <div class="col-sm-6 col-md-6">
                                                <img src="{{ get_setting($setting->setting_key, false) }}"
                                                    alt="" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-3 col-md-3">
                                                <a href="{{ url('admin/setting/remove/' . $setting->id) }}"
                                                    class="btn btn-danger">Remove</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}


    </div>
    </div>
</x-app-layout>
