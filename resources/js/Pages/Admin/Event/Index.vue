<template>
    <div>
        <meta-head title="Events Overview" />
        <!-- breadcrumb -->
        <nav class="flex items-center justify-between py-4" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
                <li class="pr-4">
                    <inertia-link :href="route('admin.dashboard')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Events Overview
                </li>
            </ol>
            <div class="hidden md:inline-flex flex items-center justify-between space-x-4">
                <div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
                    <icon name="plus-circle" class="h-5 w-5" />
                    <inertia-link :href="route('admin.events.create')">
                        Add New Event
                    </inertia-link>
                </div>
                <div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
                    <icon name="upload" class="h-5 w-5" />
                    <inertia-link :href="route('admin.events.upload')">
                        Upload XLSX
                    </inertia-link>
                </div>
            </div>
        </nav>
        <div class="bg-white p-5 pb-1 rounded-2xl">
            <!-- repeat this -->
            <div v-for="(event, index) in events.data" :key="event.id" class="flex relative justify-start items-start">
                <div class="h-full w-6 absolute inset-0 flex items-center justify-center" :class="{ 'hidden' : index == events.data.length - 1 }">
                    <div class="h-full w-0.5 bg-indigo-600 pointer-events-none"></div>
                </div>
                <div class="flex-shrink-0 w-6 h-6 rounded-full inline-flex items-center justify-center bg-indigo-600 text-white relative z-10 font-medium text-sm">{{ event.id }} </div>
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
                    <div class="space-x-4">
                        <!-- edit -->
                        <inertia-link :href="route('admin.events.edit', event.id)">
                            <span class="text-blue-500 font-bold text-sm">
                                Edit
                            </span>
                        </inertia-link>
                        <!-- delete -->
                        <inertia-link :href="route('admin.events.destroy', event.id)" method="delete" as="button">
                            <span class="text-red-500 font-bold text-sm">
                                Delete
                            </span>
                        </inertia-link>
                    </div>
                </div>
            </div>
            <div v-if="events.data.length === 0" class="pb-4">
                <p>No events found. Try adding a new event by clicking on <span class="font-bold">Add New Event</span> or <span class="font-bold">Bulk Upload button</span>.</p>
            </div>
        </div>
        <pagination :links="events.links" class="mt-4" />
    </div>
</template>
<script>
import AdminLayout from '@/Layout/AdminLayout'
import Pagination from '@/Shared/Pagination'

export default {
    layout: AdminLayout,

    components: {
        Pagination
    },

    props: {
        events: Object,
    },
}

</script>
