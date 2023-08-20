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
                    <h2 class="text-xl font-semibold">Pengguna Aplikasi</h2>
                    <p class="text-sm text-slate-500">
                        Pusat kontrol bagi admin untuk memverifikasi, mengatur peran, hak akses, dan mengawasi
                        aktivitas
                        pengguna dalam aplikasi layanan publik.
                    </p>
                </div>

                @include('admin.users._filter')

                <x-table striped="true">
                    <x-slot name="header">
                        <th><x-checkbox /></th>
                        <th>Pengguna</th>
                        <th>Terdaftar pada</th>
                        <th>Aksi</th>
                    </x-slot>
                    @forelse ($users as $item)
                        <tr>
                            <td><x-checkbox /></td>
                            <td>
                                <div class="flex flex-row gap-2">
                                    <img class="h-16 w-16"
                                        src="https://www.gravatar.com/avatar/{{ md5($item->email) }}?d=mp"
                                        alt="{{ $item->name }}" />
                                    <div class="flex flex-col justify-center">
                                        <div class="text-base font-semibold text-gray-900">{{ $item->name }}</div>
                                        <div class="text-sm font-light text-slate-500">{{ $item->email }}</div>
                                        <div class="text-xs font-thin text-slate-400">
                                            @foreach ($item->roles as $role)
                                                <span
                                                    class="mr-2 rounded bg-indigo-100 px-2.5 py-0.5 text-sm font-medium text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300">
                                                    {{ $role->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="inline-flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.show', $item->id) }}">
                                        <x-icon name="eye" class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                    </a>
                                    @if ($item->show_edit_remove_btn)
                                        <a href="{{ route('admin.users.edit', $item->id) }}">
                                            <x-icon name="pencil-square"
                                                class="h-5 w-5 cursor-pointer hover:text-indigo-800" />
                                        </a>
                                        <a href="{{ route('admin.users.destroy', ['user' => $item->id]) }}"
                                            onclick="event.preventDefault(); if (confirm('Do you want to remove this?')) {
                                                document.getElementById('delete-role-{{ $item->id }}').submit();
                                            }">
                                            <x-icon name="trash" class="h-5 w-5 cursor-pointer hover:text-rose-800" />
                                        </a>
                                        <form id="delete-role-{{ $item->id }}"
                                            action="{{ url('admin/users/' . $item->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>Belum ada pengguna yang terdaftar</p>
                    @endforelse
                </x-table>
                <div class="pt-8">{!! $users->withQueryString()->links() !!}</div>
            </x-card>
        </div>
    </div>
</x-app-layout>
