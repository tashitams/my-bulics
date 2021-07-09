<template>
    <div>
        <meta-head title="Select a class" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-xl">
                <li class="pr-4">
                    <inertia-link :href="route('staff.dashboard')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Select a class
                </li>
            </ol>
        </nav>
        <div class="px-2 pt-2">
            <ul>
                <li v-for="(grade, index) in grades" :key="grade.id" class="pb-3.5 mb-3">
                    <inertia-link :href="route('staff.students.show', grade.id)">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="object-cover h-14 w-14 rounded-full shadow-lg text-xs" :src="'/storage/img/' + grade.profile_pic" :alt="grade.class_teacher">
                            </div>
                            <div class="pb-2.5 border-b border-gray-200 w-full" :class="{ 'border-none pb-0' : index == grades.length - 1 }">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ grade.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ grade.class_teacher }}
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                </li>
                <li v-if="grades.length === 0">
                    <p>No classes found.</p>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'

export default {
    layout: AppLayout,

    props: {
        grades: Array,
    },
}

</script>
