<template>
	<div>
		<meta-head title="My Leave" />
		<!-- breadcrumb -->
		<nav class="flex justify-between items-center mb-4 py-1" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
				<li class="pr-4">
					<inertia-link :href="route('staff.dashboard')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					My Leave
				</li>
			</ol>
			<inertia-link :href="route('staff.leaves.create')" class="font-black text-sm text-gray-700"> Apply Now +</inertia-link>
		</nav>
		<div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="overflow-hidden rounded-lg mb-2">
                        <table class="min-w-full divide-y divide-gray-200">
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
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="(leave, index) in leaves" :key="leave.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ index + 1 }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ leave.leave_type }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">
                                            From: ({{ leave.from_date }} - {{ leave.to_date }})
                                        </div>
                                        <div class="text-sm text-gray-900 font-medium">
                                            Total Days: {{ leave.leave_days }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">
                                            {{ leave.reason }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full text-white" :class="{ 'bg-green-500': leave.leave_status == 'Approved', 'bg-red-500': leave.leave_status == 'Rejected',  'bg-yellow-400': leave.leave_status == 'Pending'}">
                                            {{ leave.leave_status }}
                                        </span>
                                    </td>
                                </tr>
                                <tr v-if="leaves.length === 0">
                                    <td colspan="5" class="py-4 text-center font-semibold text-base">
                                        You have not applied for leave.
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
