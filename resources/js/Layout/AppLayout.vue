<template>
    <div class="flex flex-col h-screen">
        <header class="p-5 bg-blue-800 text-white">
            <div class="container mx-auto flex items-center justify-between">
                <inertia-link :href="route('staff.dashboard')" class="text-xl font-bold">Buli Central School </inertia-link>
                <span class="text-sm font-bold text-white">(version 2)</span>
            </div>
        </header>
        <main class="p-5 flex-1 overflow-y-auto bg-white">
            <div class="container mx-auto">
                <slot />
            </div>
        </main>
        <footer class="md:hidden bg-gray-900 px-4">
            <div class="container mx-auto flex justify-between text-xs font-bold">
                <inertia-link :href="route('staff.dashboard')" class="px-5 py-3 text-gray-400" :class="route().current('staff.dashboard') ? 'text-yellow-400' : ''">
                    <icon name="home" class="h-5 w-5 mb-1 mx-auto" /> Home
                </inertia-link>
                <inertia-link :href="route('staff.profile')" class="px-5 py-3 text-gray-400" :class="route().current('staff.profile') ? 'text-yellow-400' : ''">
                    <icon name="user-circle" class="h-5 w-5 mb-1 mx-auto" /> My Profile
                </inertia-link>
                <inertia-link :href="route('staff.notification')" class="px-5 py-3 text-gray-400" :class="route().current('staff.notification') ? 'text-yellow-400' : ''">
                    <icon name="notification" class="h-5 w-5 mb-1 mx-auto" /> Notification
                </inertia-link>
                <inertia-link :href="route('staff.logout')" method="delete" as="button" class="font-bold px-5 py-3 text-gray-400">
                    <icon name="logout" class="h-5 w-5 mb-1 mx-auto" /> Logout
                </inertia-link>
            </div>
        </footer>
        <flash-message />
    </div>
</template>
<script>
import FlashMessage from '@/Shared/FlashMessage'
export default {
    components: {
        FlashMessage,
    },
    methods: {
        isUrl(...urls) {
            let currentUrl = this.$page.url.substr(1)
            if (urls[0] === '') {
                return currentUrl === ''
            }
            return urls.filter(url => currentUrl.startsWith(url)).length
        },
    }
}

</script>
