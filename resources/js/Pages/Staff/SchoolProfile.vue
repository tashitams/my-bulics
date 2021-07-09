<template>
	<div>
		<meta-head title="My Profile" />
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
					School Profile
				</li>
			</ol>
		</nav>
		
		<div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-white border-b-4 border-gray-900 text-gray-800 font-bold">
                            <tr class="font-black text-left text-base tracking-wider">
                                <th scope="col" class="py-2 pr-20">
                                    Class Teacher
                                </th>
                                <th scope="col" class="py-2 pr-20">
                                    Boarder Students
                                </th>
                                <th scope="col" class="py-2 pr-20">
                                    Dayscholar Students
                                </th>
                                <th scope="col" class="py-2 pr-20">
                                    Total Students
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <tr v-for="grade in grades" :key="grade.id">
                                <td class="py-4 pr-16 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0 h-14 w-14">
                                            <img class="object-cover h-14 w-14 rounded-full text-xs" :src="'/storage/img/' + grade.profile_pic" :alt="grade.name">
                                        </div>
                                        <div>
                                            <div class="text-gray-500">
                                                {{ grade.name }}
                                            </div>
                                            <div class="text-gray-600 font-semibold">
                                                {{ grade.class_teacher }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 whitespace-nowrap font-normal">
                                    <div class="text-gray-900">
                                        Boys: {{ grade.boarder_boys }}
                                    </div>
                                    <div class="text-gray-900">
                                        Girls: {{ grade.boarder_girls }}
                                    </div>
                                    <div class="text-gray-900 font-semibold">
                                        Total: {{ grade.boarder_girls + grade.boarder_boys }}
                                    </div>
                                </td>
                                <td class="py-4 whitespace-nowrap font-normal">
                                    <div class="text-gray-900">
                                        Boys: {{ grade.dayscholar_boys }}
                                    </div>
                                    <div class="text-gray-900">
                                        Girls: {{ grade.dayscholar_girls }}
                                    </div>
                                    <div class="text-gray-900 font-semibold">
                                        Total: {{ grade.dayscholar_girls + grade.dayscholar_boys }}
                                    </div>
                                </td>
                                <td class="py-4 whitespace-nowrap font-normal">
                                    <div class="text-gray-900">
                                        Boys: {{ grade.boarder_boys + grade.dayscholar_boys }}
                                    </div>
                                    <div class="text-gray-900">
                                        Girls: {{ grade.boarder_girls + grade.dayscholar_girls }}
                                    </div>
                                    <div class="text-gray-900 font-semibold">
                                        Total: {{ grade.boarder_girls + grade.dayscholar_girls + grade.dayscholar_boys + grade.boarder_boys }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
		grades: Array,
	},

}

</script>
