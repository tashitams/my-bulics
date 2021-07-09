<template>
	<div>
		<meta-head title="Bulk Timetable Upload" />
		<!-- breadcrumb -->
		<nav class="py-4" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
				<li class="pr-4">
					<inertia-link :href="route('admin.timetables.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					Upload Timetable
				</li>
			</ol>
		</nav>
		<div class="bg-white p-5 rounded-2xl">
			<form @submit.prevent="upload" autocomplete="off">
				<div>
					<file-input v-model="form.file" class="w-full" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" label="Choose a Excel file" />
				</div>
				<div v-if="errors.file" class="form-error mb-5">{{ errors.file }}</div>
				<div>
					<loading-button :loading="form.processing" class="form-btn" type="submit">
						<span>Upload Now </span>
					</loading-button>
				</div>
			</form>
			<a href="#" class="text-sm font-bold px-4 inline-block mt-4 text-gray-600">Or - Download sample file </a>
		</div>
	</div>
</template>
<script>
import AdminLayout from '@/Layout/AdminLayout'
import LoadingButton from '@/Shared/LoadingButton'
import FileInput from '@/Shared/FileInput'

export default {
	layout: AdminLayout,

	props: {
		errors: Object,
	},

	components: {
		LoadingButton,
		FileInput,
	},

	data() {
		return {
			form: this.$inertia.form({
				file: null,
			}),
		}
	},
	methods: {
		upload() {
			this.form.post(this.route('admin.timetables.upload'), {
				onSuccess: () => this.form.reset()
			})
		},
	},
}

</script>
