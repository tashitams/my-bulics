<template>
    <div class="flex flex-col h-screen">
        <header class="p-5 bg-blue-800 text-white">
            <div class="container mx-auto flex items-center justify-between">
                <inertia-link :href="route('admin.dashboard')" class="text-xl font-bold">Buli Central School </inertia-link>
                <span class="text-sm font-bold text-white">(version 2)</span>
            </div>
        </header>
        <main class="p-5 flex-1 overflow-y-auto bg-white">
            <div class="container mx-auto">
                <slot />
            </div>
        </main>
        <flash-message />
    </div>
</template>
<script>
import FlashMessage from '@/Shared/FlashMessage'
export default {
    components: {
        FlashMessage,
    },
}

</script>
