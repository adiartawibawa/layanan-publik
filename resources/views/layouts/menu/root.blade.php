<x-nav-link :href="route('root.dashboard')" :active="request()->routeIs('root.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('root.manage.user')" :active="request()->is('root/manage-user*')">
    {{ __('Manage User') }}
</x-nav-link>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Manage Role') }}
</x-nav-link>
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Setting Apps') }}
</x-nav-link>
