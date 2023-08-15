<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Layanan') }}
</x-nav-link>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Notifikasi') }}
</x-nav-link>
<x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
    {{ __('Profile') }}
</x-nav-link>
