<template>
	<div>
		<meta-head title="Manage Leave" />
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
					Manage Leave
				</li>
			</ol>
		</nav>
		<div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="overflow-hidden rounded-lg mb-2">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-indigo-700 text-white">
                                <tr class="font-black text-left text-sm uppercase tracking-wider">
                                    <th scope="col" class="px-6 py-4">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Reason
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-4">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="(leave, index) in leaves" :key="leave.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700">
                                            {{ index + 1 }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-base text-gray-900 font-medium">
                                            {{ leave.staff_name }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-700">
                                            {{ leave.leave_type }} Leave
                                        </div>                                        
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700 font-medium">
                                            From: {{ leave.from_date }} -  {{ leave.to_date }}
                                        </div>
                                        <div class="text-sm text-gray-700 font-medium">
                                            Total Days: {{ leave.leave_days }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700 font-medium">
                                            {{ leave.reason }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-white" :class="{ 'bg-green-500': leave.leave_status == 'Approved', 'bg-red-500': leave.leave_status == 'Rejected',  'bg-yellow-400': leave.leave_status == 'Pending'}">
                                            {{ leave.leave_status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <inertia-link :href="route('staff.leaves.edit', leave.id)" class="text-indigo-600 hover:text-indigo-900 text-sm font-bold">
                                            Edit
                                        </inertia-link>
                                    </td>
                                </tr>
                                <tr v-if="leaves.length === 0">
                                    <td colspan="6" class="py-4 text-center font-semibold text-base">
                                        No one have applied for leave.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
		leaves: Array,
	},
}

</script>
