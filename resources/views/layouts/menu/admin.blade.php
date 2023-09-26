<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('admin.permohonan.index')" :active="request()->is('admin/permohonan*') || request()->is('admin/permohonan*')">
    {{ __('Permohonan') }}
</x-nav-link>
<x-nav-link :href="route('admin.layanan.index')" :active="request()->is('admin/layanan*')">
    {{ __('Layanan') }}
</x-nav-link>
<x-nav-link :href="route('admin.users.index')" :active="request()->is('admin/users*')">
    {{ __('Manajemen Pengguna') }}
</x-nav-link>
<x-nav-link :href="route('admin.setting.update')" :active="request()->is('admin/setting*')">
    {{ __('Pengaturan') }}
</x-nav-link>
<x-nav-link :href="route('admin.panduan')" :active="request()->is('admin/panduan*') || request()->is('admin/panduan*')">
    {{ __('Panduan') }}
</x-nav-link>
