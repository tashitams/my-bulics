<template>
    <div>
        <meta-head title="Events Overview" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
                <li class="pr-4">
                    <inertia-link :href="route('staff.dashboard')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Events List
                </li>
            </ol>
        </nav>
        <div class="p-4">
            <!-- repeat this -->
            <div v-for="(event, index) in events" :key="event.id" class="flex relative justify-start items-start">
                <div class="h-full w-6 absolute inset-0 flex items-center justify-center" :class="{ 'hidden' : index == events.length - 1 }">
                    <div class="h-full w-0.5 bg-gray-600 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-6 h-6 rounded-full inline-flex items-center justify-center bg-gray-800 text-white relative z-10 font-medium text-sm">{{ index + 1 }} </div>
                <div class="mb-8 ml-5">
                    <div class="flex flex-col space-y-1.5 mb-1">
                        <div class="text-sm flex items-center space-x-2 text-indigo-600">
                            <icon name="calendar" class="h-4 w-4" />
                            <span>{{ event.event_date}}</span>
                        </div>
                        <div class="text-sm flex items-center space-x-6">
                            <span class="text-gray-700 text-base">{{ event.title }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="events.length === 0" class="pb-4">
                <p>No events found. </p>
            </div>
        </div>
    </div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'

export default {
    layout: AppLayout,

    props: {
        events: Array,
    },
}

</script>
