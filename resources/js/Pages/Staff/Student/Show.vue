<template>
    <div>
        <meta-head title="Students Overview" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-xl">
                <li class="pr-4">
                    <inertia-link :href="route('staff.students.index')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    {{ class_name }}
                </li>
            </ol>
        </nav>
        <div class="px-2 pt-2">
            <ul>
                <li v-for="(student, index) in students" :key="student.id" class="pb-3.5 mb-3.5 border-b border-gray-200" :class="{ 'border-none pb-0' : index == students.length - 1 }">
                    <div class="flex justify-between items-center">
                        <inertia-link :href="route('staff.students.profile', student.id)">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 h-14 w-14">
                                    <img class="object-cover h-14 w-14 rounded-full text-xs" :src="'/storage/img/' + student.profile_pic" :alt="student.name">
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ student.name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Roll No. {{ index + 1 }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ student.student_code }}
                                    </div>
                                </div>
                            </div>
                        </inertia-link>
                        <div v-if="can.edit_student">
                            <inertia-link :href="route('staff.students.edit', student.id)" class="inline-flex items-center px-3 py-2 rounded-md shadow-sm text-sm font-medium text-gray-100 bg-gray-700 focus:outline-none">
                                <icon name="edit" class="h-4 w-5 mr-1" />
                                Edit
                            </inertia-link>
                        </div>
                    </div>
                </li>
                <li v-if="students.length === 0" class="p-4 bg-white">
                    <p>No students found.</p>
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
        students: Array,
        can: Object,
        class_name: String
    },
}

</script>
