<template>
	<div>
		<meta-head title="My Profile" />
		<!-- breadcrumb -->
		<nav class="flex items-center justify-between mb-4 py-1" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
				<li class="pr-4">
					<inertia-link :href="route('staff.dashboard')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					My Profile
				</li>
			</ol>
			<div class="flex items-center justify-between text-red-500 font-bold text-sm">
				<inertia-link :href="route('staff.password')">
					Reset Password
				</inertia-link>
			</div>
		</nav>
		<div class="bg-white p-2 rounded-2xl">
			<form @submit.prevent="update">
				<div class="mb-5 text-center md:text-left">
					<avatar-input v-model="form.profile_pic" :default-src="'/storage/img/' + user.profile_pic" class="h-24 w-24 rounded-full"></avatar-input>
					<h3 class="text-lg leading-6 font-medium text-gray-900">
						Profile Picture
					</h3>
					<p class="mt-1 text-sm text-gray-500 break-normal">
						Max Image Size 1 MB.
					</p>
					<div v-if="errors.profile_pic" class="form-error">{{ errors.profile_pic }}</div>
				</div>
				<div class="space-y-6">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-20 gap-y-8">
						<!-- name -->
						<div>
							<label for="name" class="form-label">Name</label>
							<input v-model="form.name" type="text" placeholder="Enter Staff Name" class="form-input" :class="{ 'has-error': errors.name }" id="name" required />
							<div v-if="errors.name" class="form-error">{{ errors.name }}</div>
						</div>
						<!-- designation -->
						<div>
							<label for="designation" class="form-label">Designation</label>
							<input v-model="form.designation" type="text" placeholder="Teacher/Store Incharge" class="form-input" :class="{ 'has-error': errors.designation }" id="designation" required />
							<div v-if="errors.designation" class="form-error">{{ errors.designation }}</div>
						</div>
						<!-- employee id -->
						<div>
							<label for="employee_id" class="form-label">Employee ID</label>
							<input v-model="form.employee_id" type="text" placeholder="202******" class="form-input" :class="{ 'has-error': errors.employee_id }" id="employee_id" required />
							<div v-if="errors.employee_id" class="form-error">{{ errors.employee_id }}</div>
						</div>
						<!-- cid no -->
						<div>
							<label for="cid_no" class="form-label">CID Number</label>
							<input v-model="form.cid_no" type="text" maxlength="11" minlength="11" placeholder="111****" class="form-input" :class="{ 'has-error': errors.cid_no }" id="cid_no" required />
							<div v-if="errors.cid_no" class="form-error">{{ errors.cid_no }}</div>
						</div>
						<!-- contact no -->
						<div>
							<label for="phone_no" class="form-label">Contact Number</label>
							<input v-model="form.phone_no" type="text" maxlength="8" minlength="8" placeholder="17****** or 77******" class="form-input" :class="{ 'has-error': errors.phone_no }" id="phone_no" required />
							<div v-if="errors.phone_no" class="form-error">{{ errors.phone_no }}</div>
						</div>
						<!-- qualification -->
						<div>
							<label for="qualification" class="form-label">Qualification</label>
							<input v-model="form.qualification" type="text" maxlength="30" placeholder="PgDE / B.Ed / Masters" class="form-input" :class="{ 'has-error': errors.qualification }" id="qualification" required />
							<div v-if="errors.qualification" class="form-error">{{ errors.qualification }}</div>
						</div>
						<!-- address -->
						<div>
							<label for="address" class="form-label">Address</label>
							<input v-model="form.address" type="text" maxlength="30" placeholder="Village / Dzongkhag" class="form-input" :class="{ 'has-error': errors.address }" id="address" required />
							<div v-if="errors.address" class="form-error">{{ errors.address }}</div>
						</div>
						<!-- joining date -->
						<div>
							<label for="joining_date" class="form-label">Joining Date <span class="text-xs text-indigo-600">(current school)</span></label>
							<input v-model="form.joining_date" type="date" class="form-input" :class="{ 'has-error': errors.joining_date }" id="joining_date" required />
							<div v-if="errors.joining_date" class="form-error">{{ errors.joining_date }}</div>
						</div>
						<!-- school roles & responsibilities -->
						<div>
							<label for="school_role" class="text-sm font-bold text-gray-700 tracking-wide pl-0.5">Roles &amp; Responsibilities</label>
							<textarea v-model="form.school_role" id="school_role" maxlength="200" placeholder="Write your roles &amp; responsibilites at school..." class="form-input"></textarea>
							<p class="w-full text-right text-xs pt-1 text-gray-500 dark:text-gray-400">Character Limit: 200</p>
							<div v-if="errors.school_role" class="form-error">{{ errors.school_role }}</div>
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
import AppLayout from '@/Layout/AppLayout'
import AvatarInput from '@/Shared/AvatarInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
	layout: AppLayout,

	components: {
		LoadingButton,
		AvatarInput,
	},

	props: {
		user: Object,
		errors: Object,
	},

	data() {
		return {
			form: this.$inertia.form({
				_method: 'PUT',
				name: this.user.name,
				designation: this.user.designation,
				employee_id: this.user.employee_id,
				cid_no: this.user.cid_no,
				phone_no: this.user.phone_no,
				qualification: this.user.qualification,
				address: this.user.address,
				school_role: this.user.school_role,
				joining_date: this.user.joining_date,
				profile_pic: null
			}),
		}
	},

	methods: {
		update() {
			this.form.post(this.route('staff.profile.update'))
		}
	},
}

</script>
