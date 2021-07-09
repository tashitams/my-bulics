<template>
	<div>
		<meta-head title="Staff Dashboard" />
		<figure class="flex items-center mb-8 border-b border-gray-100 pb-4 space-x-5">
			<img class="object-fill w-20 h-20 rounded-full text-xs border-2 border-white shadow-md" :src="'/storage/img/' + user.profile_pic" :alt="user.name">
			<figcaption class="text-base">
				<h3 class="font-black text-lg tracking-wide">Welcome, {{ user.name }}</h3>
				<h3 class="font-black tracking-wide text-gray-600">Logged in as, {{ user.user_role }}</h3>
			</figcaption>
		</figure>
		<div class="grid grid-cols-3 md:grid-cols-8 gap-10 gap-y-12">
			<inertia-link :href="route('staff.school.profile')">
				<div class="flex flex-col items-center">
					<icon name="presentation" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">My School</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.students.index')">
				<div class="flex flex-col items-center">
					<icon name="user-circle" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Students</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.teachers.index')">
				<div class="flex flex-col items-center">
					<icon name="academic-cap" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Teachers</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.index')">
				<div class="flex flex-col items-center">
					<icon name="fire" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Support Staff</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.esp.index')">
				<div class="flex flex-col items-center">
					<icon name="chip" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">ESP/GSP</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.events.index')">
				<div class="flex flex-col items-center">
					<icon name="calendar" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Events</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.timetables.index')">
				<div class="flex flex-col items-center">
					<icon name="clock" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Timetable</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.leaves.index')">
				<div class="flex flex-col items-center">
					<icon name="shield-check" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">My Leave</h3>
				</div>
			</inertia-link>
			 <inertia-link :href="route('staff.leaves.show')" v-if="can.edit_leave">
                <div class="flex flex-col items-center">
                    <icon name="edit" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
                    <h3 class="font-bold text-sm text-center mt-2 text-gray-700">View Leave</h3>
                </div>
            </inertia-link>
			<inertia-link :href="route('staff.profile')" class="hidden md:inline-block w-full">
				<div class="flex flex-col items-center">
					<icon name="user-circle" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">My Profile</h3>
				</div>
			</inertia-link>
			<inertia-link :href="route('staff.logout')" method="delete" as="button" class="hidden md:inline-block w-full">
				<div class="flex flex-col items-center">
					<icon name="logout" class="h-16 w-16 bg-gray-800 rounded-full p-2 text-yellow-400" />
					<h3 class="font-bold text-sm text-center mt-2 text-gray-700">Logout</h3>
				</div>
			</inertia-link>
		</div>
	</div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'

export default {
	layout: AppLayout,

	props: {
		user: Object,
		can: Object
	}
}

</script>
