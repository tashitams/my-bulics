<template>
	<div>
		<meta-head title="Admin Dashboard" />
		<figure class="flex items-center mb-10">
			<figcaption class="text-base">
				<h3 class="font-black text-lg tracking-wide">Welcome, {{ user.name }}</h3>
				<h3 class="font-black tracking-wide text-gray-600">
					Logged in as, Administrator
				</h3>
			</figcaption>
		</figure>
		<div class="grid grid-cols-3 md:grid-cols-6 gap-10 gap-y-12">
			<inertia-link :href="route('admin.staff.index')">
				<div class="flex flex-col items-center">
					<icon name="academic-cap" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Staff</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.classes.index')">
				<div class="flex flex-col items-center">
					<icon name="fire" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Classes</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.students.index')">
				<div class="flex flex-col items-center">
					<icon name="user-circle" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Students</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.esp.index')">
				<div class="flex flex-col items-center">
					<icon name="chip" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">ESP/GSP</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.events.index')">
				<div class="flex flex-col items-center">
					<icon name="calendar" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Events</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.timetables.index')">
				<div class="flex flex-col items-center">
					<icon name="clock" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Timetable</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.password')">
				<div class="flex flex-col items-center">
					<icon name="edit" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Change Password</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('admin.logout')" method="delete" as="button">
				<div class="flex flex-col items-center">
					<icon name="logout" class="h-10 w-10 md:h-14 md:w-14 text-gray-800" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Logout</h3>
				</div>
			</inertia-link>
		</div>
	</div>
</template>
<script>
import AdminLayout from '@/Layout/AdminLayout'

export default {
	layout: AdminLayout,

	props: {
		user: Object,
	}
}

</script>
