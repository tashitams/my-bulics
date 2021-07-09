<template>
	<div>
		<meta-head title="Update Class Details" />
		<!-- breadcrumb -->
		<nav class="flex items-center justify-between py-4" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
				<li class="pr-4">
					<inertia-link :href="route('admin.classes.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					{{ grade.name }}
				</li>
			</ol>
			<div class="hidden md:inline-flex flex items-center justify-between space-x-4 text-white font-semibold">
				<div class="flex items-center justify-between space-x-2 bg-red-500 px-4 py-2 rounded shadow">
					<icon name="trash" class="h-5 w-5" />
					<inertia-link :href="route('admin.classes.delete', grade.id)" method="delete" as="button"> 
						Delete Class
					</inertia-link>
				</div>
			</div>
		</nav>
		<div class="bg-white p-8 rounded-2xl">
			<form @submit.prevent="update" autocomplete="off">
				<div class="space-y-6">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-20 gap-y-8">
						<!-- name -->
						<div>
							<label for="name" class="form-label">Class Name</label>
							<input v-model="form.name" type="text" placeholder="Enter class name eg. Class 7 A" class="form-input" :class="{ 'has-error': errors.name }" id="name" required />
							<div v-if="errors.name" class="form-error">{{ errors.name }}</div>
						</div>
						<!-- user id -->
						<div>
							<label for="user_id" class="form-label">Select Teacher</label>
							<select v-model="form.user_id" id="user_id" class="appearance-none form-input" required>
								<option value="" disabled>Select a class teacher</option>
								<option v-for="user in users" :value="user.id">
									{{ user.name }}
								</option>
							</select>
						</div>
						<!-- boarder_boys -->
						<div>
							<label for="boarder_boys" class="form-label">Boarder Boys</label>
							<input v-model="form.boarder_boys" type="number" placeholder="Enter total number of boarder boys" class="form-input" :class="{ 'has-error': errors.boarder_boys }" id="boarder_boys" required />
							<div v-if="errors.boarder_boys" class="form-error">{{ errors.boarder_boys }}</div>
						</div>
						<!-- boarder_girls -->
						<div>
							<label for="boarder_girls" class="form-label">Boarder Girls</label>
							<input v-model="form.boarder_girls" type="number" placeholder="Enter total number of boarder girls" class="form-input" :class="{ 'has-error': errors.boarder_girls }" id="boarder_girls" required />
							<div v-if="errors.boarder_girls" class="form-error">{{ errors.boarder_girls }}</div>
						</div>
						<!-- dayscholar_boys -->
						<div>
							<label for="dayscholar_boys" class="form-label">Dayscholar Boys</label>
							<input v-model="form.dayscholar_boys" type="number" placeholder="Enter total number of dayscholar boys" class="form-input" :class="{ 'has-error': errors.dayscholar_boys }" id="dayscholar_boys" required />
							<div v-if="errors.dayscholar_boys" class="form-error">{{ errors.dayscholar_boys }}</div>
						</div>
						<!-- dayscholar_girls -->
						<div>
							<label for="dayscholar_girls" class="form-label">Dayscholar Girls</label>
							<input v-model="form.dayscholar_girls" type="number" placeholder="Enter total number of dayscholar girls" class="form-input" :class="{ 'has-error': errors.dayscholar_girls }" id="dayscholar_girls" required />
							<div v-if="errors.dayscholar_girls" class="form-error">{{ errors.dayscholar_girls }}</div>
						</div>
					</div>
					<div>
						<loading-button :loading="form.processing" class="form-btn" type="submit">
							<span>Update Now </span>
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
		grade: Object,
		users: Array
	},

	components: {
		LoadingButton,
	},

	data() {
		return {
			form: this.$inertia.form({
				_method: 'put',
				name: this.grade.name,
				user_id: this.grade.user_id,
				boarder_boys: this.grade.boarder_boys,
				boarder_girls: this.grade.boarder_girls,
				dayscholar_boys: this.grade.dayscholar_boys,
				dayscholar_girls: this.grade.dayscholar_girls,
			}),
		}
	},
	methods: {
		update() {
			this.form.post(this.route('admin.classes.update', this.grade.id))
		},
	},
}

</script>
