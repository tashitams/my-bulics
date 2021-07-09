<template>
	<div>
		<meta-head title="Esp Profile" />
		<!-- breadcrumb -->
		<nav class="mb-4 py-1" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
				<li class="pr-4">
					<inertia-link :href="route('staff.esp.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					{{ user.name }}
				</li>
			</ol>
		</nav>
		<div class="px-2">
			<!-- call to action -->
			<div class="md:hidden flex flex-col justify-center items-center px-8 mb-10 space-y-4 border-b pb-3.5">
				<div>
					<img class="object-cover shadow h-24 w-24 rounded-full text-xs border-2 border-gray-200" :src="'/storage/img/' + user.profile_pic" :alt="user.name">
				</div>
				<div class="flex space-x-8 font-bold">
					<a :href="`tel:${user.phone_no}`" class="text-center space-y-1.5">
						<icon name="phone" class="h-6 w-6 mx-auto" />
						<p class="text-sm text-gray-700">Call</p>
					</a>
					<a :href="`sms:${user.phone_no}`" class="text-center space-y-1.5">
						<icon name="message" class="h-6 w-6 mx-auto" />
						<p class="text-sm text-gray-700">Message</p>
					</a>
				</div>
			</div>
			<!-- content -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-20 gap-y-8 md:py-2">
				<!-- designation -->
				<div class="flex space-x-4 text-gray-800">
					<div>
						<icon name="shield-check" class="h-5 w-5" />
					</div>
					<div class="flex flex-col w-full">
						<label class="form-label pl-0.5">Designation</label>
						<input type="text" :value="user.designation" class="form-input border-b text-gray-700 font-semibold text-base" disabled />
					</div>
				</div>
				<!-- phone -->
				<div class="flex space-x-4 text-gray-800">
					<div>
						<icon name="phone" class="h-5 w-5" />
					</div>
					<div class="flex flex-col w-full">
						<label class="form-label pl-0.5">Phone Number</label>
						<input type="text" :value="user.phone_no" class="form-input border-b text-gray-700 font-semibold text-base" disabled />
					</div>
				</div>
				<!-- cid no -->
				<div class="flex space-x-4 text-gray-800">
					<div>
						<icon name="shield-check" class="h-5 w-5" />
					</div>
					<div class="flex flex-col w-full">
						<label class="form-label pl-0.5">Citizen ID</label>
						<input type="text" :value="user.cid_no" class="form-input border-b text-gray-700 font-semibold text-base" disabled />
					</div>
				</div>
				<!-- address -->
				<div class="flex space-x-4 text-gray-800">
					<div>
						<icon name="address" class="h-5 w-5" />
					</div>
					<div class="flex flex-col w-full">
						<label class="form-label pl-0.5">Address</label>
						<input type="text" :value="user.address" class="form-input border-b text-gray-700 font-semibold text-base" disabled />
					</div>
				</div>
				<!-- joining date -->
				<div class="flex space-x-4 text-gray-800">
					<div>
						<icon name="calendar" class="h-5 w-5" />
					</div>
					<div class="flex flex-col w-full">
						<label class="form-label pl-0.5"> Joining Date <span class="text-xs font-bold text-blue-600">(current school)</span></label>
						<input type="text" :value="user.joining_date" class="form-input border-b text-gray-700 font-semibold text-base" :class="{ 'border-none' : !user.school_role}" disabled />
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
		user: Object,
	},
}

</script>
