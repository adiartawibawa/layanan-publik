<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('admin.pelayanan')" :active="request()->routeIs('admin.pelayanan')">
    {{ __('Pelayanan') }}
</x-nav-link>
<x-nav-link :href="route('admin.setting')" :active="request()->routeIs('admin.setting')">
    {{ __('Notifikasi') }}
</x-nav-link>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Manajemen Pengguna') }}
</x-nav-link>
<x-nav-link :href="route('admin.setting')" :active="request()->routeIs('admin.setting')">
    {{ __('Pengaturan Aplikasi') }}
</x-nav-link>
