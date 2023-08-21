<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('admin.pelayanan')" :active="request()->is('admin/pelayanan*')">
    {{ __('Pelayanan') }}
</x-nav-link>
<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Notifikasi') }}
</x-nav-link>
<x-nav-link :href="route('admin.users.index')" :active="request()->is('admin/users*')">
    {{ __('Manajemen Pengguna') }}
</x-nav-link>
<x-nav-link :href="route('admin.setting.update')" :active="request()->is('admin/setting*')">
    {{ __('Pengaturan Aplikasi') }}
</x-nav-link>
