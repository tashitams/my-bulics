<template>
	<div>
		<meta-head title="Add New Event" />
		<!-- breadcrumb -->
		<nav class="py-4" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
				<li class="pr-4">
					<inertia-link :href="route('admin.events.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					Add New Event
				</li>
			</ol>
		</nav>
		<div class="bg-white p-8 rounded-2xl">
			<form @submit.prevent="store" autocomplete="off">
				<div class="space-y-6">
					<div class="grid grid-cols-1 gap-20 gap-y-8">
						<!-- title -->
						<div>
							<label for="title" class="form-label">Event Title</label>
							<input v-model="form.title" type="text" placeholder="Enter event title" class="form-input" :class="{ 'has-error': errors.title }" id="title" required />
							<div v-if="errors.title" class="form-error">{{ errors.title }}</div>
						</div>
						<!-- date -->
						<div>
							<label for="event_date" class="form-label">Event Date</label>
							<input v-model="form.event_date" type="date" :min="form.event_date" placeholder="Select from date" class="form-input" :class="{ 'has-error': errors.event_date }" id="event_date" required />
							<div v-if="errors.event_date" class="form-error">{{ errors.event_date }}</div>
						</div>
					</div>
					<div>
						<loading-button :loading="form.processing" class="form-btn" type="submit">
							<span>Add New Event </span>
						</loading-button>
					</div>
				</div>
			</form>
		</div>
	</div>
</template>
<script>
import AdminLayout from '@/Layout/AdminLayout'
import LoadingButton from '@/Shared/LoadingButton'

export default {
	layout: AdminLayout,

	props: {
		errors: Object,
	},

	components: {
		LoadingButton,
	},

	data() {
		return {
			form: this.$inertia.form({
				title: null,
                event_date: new Date().toISOString().substr(0, 10),
			}),
		}
	},
	methods: {
		store() {
			this.form.post(this.route('admin.events.store'))
		},
	},
}

</script>
