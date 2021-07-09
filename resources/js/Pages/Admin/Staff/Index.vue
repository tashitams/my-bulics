<template>
	<div>
		<meta-head title="Staff Overview" />
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
					Staff Overview
				</li>
			</ol>
			<div class="hidden md:inline-flex flex items-center justify-between space-x-4">
				<div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
					<icon name="plus-circle" class="h-5 w-5" />
					<inertia-link :href="route('admin.staff.create')"> 
						Add New Staff
					</inertia-link>
				</div>
				<div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
					<icon name="upload" class="h-5 w-5" />
					<inertia-link :href="route('admin.staff.upload')"> 
						Upload XLSX
					</inertia-link>
				</div>
			</div>
		</nav>
		<div class="bg-white p-5 pb-1 rounded-2xl">
			<ul>
				<li v-for="(user, index) in users.data" :key="user.id" class="mb-5">
					<inertia-link :href="route('admin.staff.edit', user.id)">
						<div class="flex items-center space-x-4">
							<div class="flex-shrink-0">
								<img class="object-cover h-14 w-14 rounded-full shadow-lg text-xs" :src="'/storage/img/' + user.profile_pic" :alt="user.name">
							</div>
							<div class="pb-2.5 border-b border-gray-200 w-full" :class="{ 'border-none pb-0' : index == users.data.length - 1 }">
								<div class="text-sm font-normal text-gray-600">
									User ID: {{ user.id }}
								</div>
								<div class="text-base font-semibold text-gray-600">
									{{ user.name }}
								</div>
							</div>
						</div>
					</inertia-link>
				</li>
				<li v-if="users.data.length === 0" class="pb-4">
					<p>No staff found. Try adding a new staff by clicking on <span class="font-bold">Add New Staff</span> or <span class="font-bold">Bulk Upload button</span>.</p>
				</li>
			</ul>
		</div>
		<pagination :links="users.links" class="mt-4" />
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
		users: Object,
	},
}

</script>
