<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaturan Aplikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <div class="space-y-2 pb-12 text-gray-900">
                    <h2 class="text-xl font-semibold">Pengguna Aplikasi</h2>
                    <p class="text-sm text-slate-500">
                        Halaman untuk mengubah konfigurasi, manajemen fitur, dan menganalisis kinerja untuk optimalisasi
                        dan pengembangan yang efisien.
                    </p>
                </div>

                <div x-data="{ openTab: 1 }" class="p-6">
                    <ul class="flex border-b">
                        <li @click="openTab = 1" class="-mb-px mr-1">
                            <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold"
                                href="#">Tab 1</a>
                        </li>
                        <li @click="openTab = 2" class="mr-1">
                            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                                href="#">Tab 2</a>
                        </li>
                        <li @click="openTab = 3" class="mr-1">
                            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold"
                                href="#">Tab 3</a>
                        </li>
                    </ul>
                    <div class="w-full pt-4">
                        <div x-show="openTab === 1">Tab #1</div>
                        <div x-show="openTab === 2">Tab #2</div>
                        <div x-show="openTab === 3">Tab #3</div>
                    </div>
                </div>


            </x-card>
            <div class="section-body">
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
                                            <li class="nav-item"><a
                                                    href="{{ url('admin/setting?category=' . $category) }}"
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
            </div>


        </div>
    </div>
</x-app-layout>
