<template>
	<div>
		<meta-head title="Add New Staff" />
		<!-- breadcrumb -->
		<nav class="py-4" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
				<li class="pr-4">
					<inertia-link :href="route('admin.esp.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					Add New Staff
				</li>
			</ol>
		</nav>
		<div class="bg-white p-8 rounded-2xl">
			<form @submit.prevent="store" autocomplete="off">
				<div class="space-y-6">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-20 gap-y-8">
						<!-- name -->
						<div>
							<label for="name" class="form-label">Staff Name</label>
							<input v-model="form.name" type="text" placeholder="Enter Staff Name" class="form-input" :class="{ 'has-error': errors.name }" id="name" required />
							<div v-if="errors.name" class="form-error">{{ errors.name }}</div>
						</div>
						<!-- designation -->
						<div>
							<label for="designation" class="form-label">Designation</label>
							<input v-model="form.designation" type="text" placeholder="Cook/Sweeper" class="form-input" :class="{ 'has-error': errors.designation }" id="designation" required />
							<div v-if="errors.designation" class="form-error">{{ errors.designation }}</div>
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
					</div>
					<div>
						<loading-button :loading="form.processing" class="form-btn" type="submit">
							<span>Register Now </span>
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
				name: null,
				designation: null,
				cid_no: null,
				phone_no: null,
				address: null,
				joining_date: null,
			}),
		}
	},
	methods: {
		store() {
			this.form.post(this.route('admin.esp.store'))
		},
	},
}

</script>
