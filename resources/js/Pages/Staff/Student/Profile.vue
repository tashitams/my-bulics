<template>
    <div>
        <meta-head title="Student Profile" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-xl">
                <li class="pr-4">
                    <inertia-link :href="route('staff.students.show', student.grade_id)">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Student Profile
                </li>
            </ol>
        </nav>
        <div class="pt-2">
            <!-- call to action -->
            <div class="flex flex-col justify-center items-center space-y-4 mb-5">
                <div>
                    <img class="object-cover shadow h-24 w-24 rounded-full text-xs border-2 border-gray-200" :src="'/storage/img/' + student.profile_pic" :alt="student.name">
                </div>
                <figcaption class="font-medium space-y-1 text-base text-center">
                    <div class="text-gray-700 text-lg font-bold">
                        {{ student.name }}
                    </div>
                    <div class="text-gray-600 text-sm">
                        {{ student.gender }}
                    </div>
                    <div class="text-gray-600 text-sm">
                        {{ student.dob }} <span class="text-xs text-gray-800 font-black">(DOB)</span>
                    </div>
                </figcaption>
                <div v-if="!student.phone" class="md:hidden flex space-x-8 font-bold">
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <div class="text-sm text-gray-500 h-12 w-12 rounded-full bg-blue-500 border border-blue-500 flex items-center justify-center">
                            <a :href="`tel:${student.phone_no}`" class="focus:outline-none">
                                <icon name="phone" class="h-6 w-6 text-white" />
                            </a>
                        </div>
                        <div class="text-sm text-gray-600">Call Now</div>
                    </div>
                    <div class="flex flex-col items-center justify-center space-y-2">
                        <div class="text-sm text-gray-500 h-12 w-12 rounded-full bg-green-500 border border-green-500 flex items-center justify-center">
                            <a :href="`sms:${student.phone_no}`" class="focus:outline-none">
                                <icon name="message" class="h-6 w-6 text-white" />
                            </a>
                        </div>
                        <div class="text-sm text-gray-600">Message</div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <ul class="flex mb-0 list-none flex-wrap pb-4 flex-row space-x-2">
                    <li class="flex-auto text-center">
                        <a class="cursor-pointer text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal border border-indigo-600" @click="toggleTabs(1)" :class="{'text-indigo-600 bg-white': openTab !== 1, 'text-white bg-indigo-600': openTab === 1}">
                            Profile
                        </a>
                    </li>
                    <li class="flex-auto text-center">
                        <a class="cursor-pointer text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal border border-indigo-600" @click="toggleTabs(2)" :class="{'text-indigo-600 bg-white': openTab !== 2, 'text-white bg-indigo-600': openTab === 2}">
                            Health
                        </a>
                    </li>
                    <li class="flex-auto text-center">
                        <a class="cursor-pointer text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal border border-indigo-600" @click="toggleTabs(3)" :class="{'text-indigo-600 bg-white': openTab !== 3, 'text-white bg-indigo-600': openTab === 3}">
                            Disciplinary
                        </a>
                    </li>
                </ul>
                <div class="relative flex flex-col min-w-0 break-words bg-white">
                    <div class="flex-auto">
                        <div class="tab-content tab-space">
                            <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto">
                                        <div class="align-middle inline-block min-w-full">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full">
                                                    <tbody>
                                                        <tr class="bg-gray-50">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="academic-cap" class="h-5 w-5" />
                                                                    <span>Student Code</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                {{ student.student_code }}
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-white">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="shield-check" class="h-5 w-5" />
                                                                    <span>Citizen ID</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                <span v-if="student.cid_no">{{ student.cid_no }}</span>
                                                                <span v-else>N/A</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-gray-50">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="fire" class="h-5 w-5" />
                                                                    <span>Student Type</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                <div class="text-sm text-gray-500">
                                                                    {{ student.is_boarder }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-white">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="address" class="h-5 w-5" />
                                                                    <span>Address</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                <div class="text-sm text-gray-500">Village: {{ student.village }}</div>
                                                                <div class="text-sm text-gray-500">Gewog: {{ student.gewog }} </div>
                                                                <div class="text-sm text-gray-500">Dzongkhag: {{ student.dzongkhag }} </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-gray-50">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="user-circle" class="h-5 w-5" />
                                                                    <span>Parent's Name</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                <div class="text-sm text-gray-500">
                                                                    <span v-if="student.father_name">
                                                                        Father: {{ student.father_name }}
                                                                    </span>
                                                                    <span v-else>N/A</span>
                                                                </div>
                                                                <div class="text-sm text-gray-500">
                                                                    <span v-if="student.mother_name">
                                                                        Mother: {{ student.mother_name }}
                                                                    </span>
                                                                    <span v-else>N/A</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-white">
                                                            <td class="pl-4 py-5 whitespace-nowrap text-sm text-gray-500 font-bold">
                                                                <div class="flex justify-start space-x-2">
                                                                    <icon name="phone" class="h-5 w-5" />
                                                                    <span>Contact Number</span>
                                                                </div>
                                                            </td>
                                                            <td class="py-5 whitespace-nowrap text-sm text-gray-500">
                                                                <span v-if="student.phone_no">{{ student.phone_no }}</span>
                                                                <span v-else>N/A</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">
                                <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                                    <div class="w-full px-1">
                                        <div class="flex flex-row items-center justify-between mb-6">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-light text-gray-500">Till now</div>
                                                <div class="text-sm font-bold"><span>Health Record</span></div>
                                            </div>
                                            <inertia-link :href="route('staff.students.health', student.id)" class="p-2 rounded font-bold text-xs bg-gray-800 focus:outline-none text-white"> Add Record +</inertia-link>
                                        </div>
                                        <div class="flex flex-row w-full">
                                            <div class="flex flex-col w-full">
                                                <!-- repeat this -->
                                                <div v-for="(health, index) in student.healths" :key="health.id" class="flex relative justify-start items-start">
                                                    <div class="h-full w-6 absolute inset-0 flex items-center justify-center" :class="{ 'hidden' : index == student.healths.length - 1 }">
                                                        <div class="h-full w-0.5 bg-gray-600 pointer-events-none"></div>
                                                    </div>
                                                    <div class="flex-shrink-0 w-6 h-6 rounded-full inline-flex items-center justify-center bg-gray-800 text-white relative z-10 font-medium text-sm">{{ index + 1 }} </div>
                                                    <div class="mb-8 ml-5">
                                                        <div class="flex flex-col w-full space-y-2">
                                                            <div class="text-sm font-bold flex items-center space-x-2">
                                                                <icon name="shield-check" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ health.title }}</span>
                                                            </div>
                                                            <div class="text-sm flex items-center space-x-2">
                                                                <icon name="calendar" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ health.created_at }} by </span> 
                                                                <span class="font-bold"> {{ health.staff_name }} </span>
                                                            </div>
                                                            <div class="text-sm flex space-x-2">
                                                                <icon name="edit" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ health.description }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-if="student.healths.length === 0" class="border-t py-4">
                                                    No health record found.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                                <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                                    <div class="w-full px-1">
                                        <div class="flex flex-row items-center justify-between mb-6">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-light text-gray-500">Till now</div>
                                                <div class="text-sm font-bold text-gray">Disciplinary Record</div>
                                            </div>
                                            <inertia-link :href="route('staff.students.discipline', student.id)" class="p-2 rounded font-bold text-xs bg-gray-800 focus:outline-none text-white"> Add Record +</inertia-link>
                                        </div>
                                        <div class="flex flex-row w-full">
                                            <div class="flex flex-col w-full">
                                                <!-- repeat this -->
                                                <div v-for="(discipline, index) in student.disciplines" :key="discipline.id" class="flex relative justify-start items-start">
                                                    <div class="h-full w-6 absolute inset-0 flex items-center justify-center" :class="{ 'hidden' : index == student.disciplines.length - 1 }">
                                                        <div class="h-full w-0.5 bg-gray-600 pointer-events-none"></div>
                                                    </div>
                                                    <div class="flex-shrink-0 w-6 h-6 rounded-full inline-flex items-center justify-center bg-gray-800 text-white relative z-10 font-medium text-sm">{{ index + 1 }} </div>
                                                    <div class="mb-8 ml-5">
                                                        <div class="flex flex-col w-full space-y-2">
                                                            <div class="text-sm font-bold flex items-center space-x-2">
                                                                <icon name="shield-check" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ discipline.title }}</span>
                                                            </div>
                                                            <div class="text-sm flex items-center space-x-2">
                                                                <icon name="calendar" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ discipline.created_at }} by</span>
                                                                <span class="font-bold">{{ discipline.staff_name }} </span>
                                                            </div>
                                                            <div class="text-sm flex space-x-2">
                                                                <icon name="edit" class="h-4 w-4 text-gray-600" />
                                                                <span>{{ discipline.description }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div v-if="student.disciplines.length === 0" class="border-t py-4">
                                                    No disciplinary record found.
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'

export default {
    layout: AppLayout,

    props: {
        student: Object,
    },

    data() {
        return {
            openTab: 1
        }
    },

    methods: {
        toggleTabs: function(tabNumber) {
            this.openTab = tabNumber
        }
    },
}

</script>
