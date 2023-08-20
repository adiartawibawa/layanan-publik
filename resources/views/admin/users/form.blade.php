<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manajemen Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card>
                <div class="space-y-2 pb-12 text-gray-900">
                    <h2 class="text-xl font-semibold">{{ empty($user) ? 'Tambahkan' : 'Sunting' }} Pengguna Aplikasi</h2>
                    <p class="text-sm text-slate-500">
                        {{ empty($user) ? __('Silahkan tambahkan informasi pengguna baru') : __('Silahkan sunting informasi pengguna') }}
                    </p>
                </div>

                <div>
                    @if (empty($user))
                        <form method="POST" action="{{ route('admin.users.store') }}" class="p-6">
                        @else
                            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                @method('PUT')
                    @endif

                    @csrf

                    <div class="mt-6">
                        <x-input label="Nama Pengguna" name="name" required="true"
                            value="{{ old('name', !empty($user) ? $user->name : null) }}" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>
                    <div class="mt-4">
                        <x-input label="Email Pengguna" name="email" type="email" required="true"
                            value="{{ old('email', !empty($user) ? $user->email : null) }}" autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>
                    <div class="mt-4">
                        <x-input label="Password Pengguna" name="password" type="password" required="true"
                            viewable="true" suffix="eye" autofocus />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>
                    <div class="mt-4">
                        <x-input label="Ulangi Password Pengguna" name="password_confirmation" type="password"
                            required="true" viewable="true" suffix="eye" autofocus />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>
                    <div class="mt-4">
                        <x-checkbox name="is_admin" label="Jadikan Admin" value="1" />
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-button tag="a" type="secondary" size="small"
                            href="{{ route('admin.users.index') }}">
                            {{ __('Batal') }}
                        </x-button>

                        <x-button can_submit="true" color="indigo" class="ml-3" size="small">
                            {{ empty($user) ? __('Tambahkan') : __('Sunting') }}
                        </x-button>
                    </div>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>
