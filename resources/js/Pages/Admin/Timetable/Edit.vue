<template>
	<div>
		<meta-head title="Update Timetable" />
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
					Update Timetable
				</li>
			</ol>
		</nav>
		<div class="bg-white p-8 rounded-2xl">
			<form @submit.prevent="update" autocomplete="off">
				<div class="space-y-6">
					<div class="grid grid-cols-1 md:grid-cols-3 gap-20 gap-y-8">
						<!-- 1st mon -->
						<div>
							<label for="mon_1" class="form-label">1<sup>st</sup> Period - Monday </label>
							<input v-model="form.mon_1" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_1 }" id="mon_1" required />
							<div v-if="errors.mon_1" class="form-error">{{ errors.mon_1 }}</div>
						</div>
						<!-- 2nd mon -->
						<div>
							<label for="mon_2" class="form-label">2<sup>nd</sup> Period - Monday</label>
							<input v-model="form.mon_2" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_2 }" id="mon_2" required />
							<div v-if="errors.mon_2" class="form-error">{{ errors.mon_2 }}</div>
						</div>
						<!-- 3rd mon -->
						<div>
							<label for="mon_3" class="form-label">3<sup>rd</sup> Period - Monday</label>
							<input v-model="form.mon_3" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_3 }" id="mon_3" required />
							<div v-if="errors.mon_3" class="form-error">{{ errors.mon_3 }}</div>
						</div>
						<!-- 4th mon -->
						<div>
							<label for="mon_4" class="form-label">4<sup>th</sup> Period - Monday</label>
							<input v-model="form.mon_4" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_4 }" id="mon_4" required />
							<div v-if="errors.mon_4" class="form-error">{{ errors.mon_4 }}</div>
						</div>
						<!-- 5th mon -->
						<div>
							<label for="mon_5" class="form-label">5<sup>th</sup> Period - Monday</label>
							<input v-model="form.mon_5" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_5 }" id="mon_5" required />
							<div v-if="errors.mon_5" class="form-error">{{ errors.mon_5 }}</div>
						</div>
						<!-- 6th mon -->
						<div>
							<label for="mon_6" class="form-label">6<sup>th</sup> Period - Monday</label>
							<input v-model="form.mon_6" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_6 }" id="mon_6" required />
							<div v-if="errors.mon_6" class="form-error">{{ errors.mon_6 }}</div>
						</div>
						<!-- 7th mon -->
						<div>
							<label for="mon_7" class="form-label">7<sup>th</sup> Period - Monday</label>
							<input v-model="form.mon_7" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.mon_7 }" id="mon_7" required />
							<div v-if="errors.mon_7" class="form-error">{{ errors.mon_7 }}</div>
						</div>
						<!-- 1st tue -->
						<div>
							<label for="tue_1" class="form-label">1<sup>st</sup> Period - Tuesday </label>
							<input v-model="form.tue_1" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_1 }" id="tue_1" required />
							<div v-if="errors.tue_1" class="form-error">{{ errors.tue_1 }}</div>
						</div>
						<!-- 2nd tue -->
						<div>
							<label for="tue_2" class="form-label">2<sup>nd</sup> Period - Tuesday</label>
							<input v-model="form.tue_2" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_2 }" id="tue_2" required />
							<div v-if="errors.tue_2" class="form-error">{{ errors.tue_2 }}</div>
						</div>
						<!-- 3rd tue -->
						<div>
							<label for="tue_3" class="form-label">3<sup>rd</sup> Period - Tuesday</label>
							<input v-model="form.tue_3" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_3 }" id="tue_3" required />
							<div v-if="errors.tue_3" class="form-error">{{ errors.tue_3 }}</div>
						</div>
						<!-- 4th tue -->
						<div>
							<label for="tue_4" class="form-label">4<sup>th</sup> Period - Tuesday</label>
							<input v-model="form.tue_4" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_4 }" id="tue_4" required />
							<div v-if="errors.tue_4" class="form-error">{{ errors.tue_4 }}</div>
						</div>
						<!-- 5th tue -->
						<div>
							<label for="tue_5" class="form-label">5<sup>th</sup> Period - Tuesday</label>
							<input v-model="form.tue_5" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_5 }" id="tue_5" required />
							<div v-if="errors.tue_5" class="form-error">{{ errors.tue_5 }}</div>
						</div>
						<!-- 6th tue -->
						<div>
							<label for="tue_6" class="form-label">6<sup>th</sup> Period - Tuesday</label>
							<input v-model="form.tue_6" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_6 }" id="tue_6" required />
							<div v-if="errors.tue_6" class="form-error">{{ errors.tue_6 }}</div>
						</div>
						<!-- 7th tue -->
						<div>
							<label for="tue_7" class="form-label">7<sup>th</sup> Period - Tuesday</label>
							<input v-model="form.tue_7" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.tue_7 }" id="tue_7" required />
							<div v-if="errors.tue_7" class="form-error">{{ errors.tue_7 }}</div>
						</div>
						<!-- 1st wed -->
						<div>
							<label for="wed_1" class="form-label">1<sup>st</sup> Period - Wednesday </label>
							<input v-model="form.wed_1" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_1 }" id="wed_1" required />
							<div v-if="errors.wed_1" class="form-error">{{ errors.wed_1 }}</div>
						</div>
						<!-- 2nd wed -->
						<div>
							<label for="wed_2" class="form-label">2<sup>nd</sup> Period - Wednesday</label>
							<input v-model="form.wed_2" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_2 }" id="wed_2" required />
							<div v-if="errors.wed_2" class="form-error">{{ errors.wed_2 }}</div>
						</div>
						<!-- 3rd wed -->
						<div>
							<label for="wed_3" class="form-label">3<sup>rd</sup> Period - Wednesday</label>
							<input v-model="form.wed_3" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_3 }" id="wed_3" required />
							<div v-if="errors.wed_3" class="form-error">{{ errors.wed_3 }}</div>
						</div>
						<!-- 4th wed -->
						<div>
							<label for="wed_4" class="form-label">4<sup>th</sup> Period - Wednesday</label>
							<input v-model="form.wed_4" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_4 }" id="wed_4" required />
							<div v-if="errors.wed_4" class="form-error">{{ errors.wed_4 }}</div>
						</div>
						<!-- 5th wed -->
						<div>
							<label for="wed_5" class="form-label">5<sup>th</sup> Period - Wednesday</label>
							<input v-model="form.wed_5" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_5 }" id="wed_5" required />
							<div v-if="errors.wed_5" class="form-error">{{ errors.wed_5 }}</div>
						</div>
						<!-- 6th wed -->
						<div>
							<label for="wed_6" class="form-label">6<sup>th</sup> Period - Wednesday</label>
							<input v-model="form.wed_6" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_6 }" id="wed_6" required />
							<div v-if="errors.wed_6" class="form-error">{{ errors.wed_6 }}</div>
						</div>
						<!-- 7th wed -->
						<div>
							<label for="wed_7" class="form-label">7<sup>th</sup> Period - Wednesday</label>
							<input v-model="form.wed_7" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.wed_7 }" id="wed_7" required />
							<div v-if="errors.wed_7" class="form-error">{{ errors.wed_7 }}</div>
						</div>
						<!-- 1st thu -->
						<div>
							<label for="thu_1" class="form-label">1<sup>st</sup> Period - Thursday </label>
							<input v-model="form.thu_1" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_1 }" id="thu_1" required />
							<div v-if="errors.thu_1" class="form-error">{{ errors.thu_1 }}</div>
						</div>
						<!-- 2nd thu -->
						<div>
							<label for="thu_2" class="form-label">2<sup>nd</sup> Period - Thursday</label>
							<input v-model="form.thu_2" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_2 }" id="thu_2" required />
							<div v-if="errors.thu_2" class="form-error">{{ errors.thu_2 }}</div>
						</div>
						<!-- 3rd thu -->
						<div>
							<label for="thu_3" class="form-label">3<sup>rd</sup> Period - Thursday</label>
							<input v-model="form.thu_3" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_3 }" id="thu_3" required />
							<div v-if="errors.thu_3" class="form-error">{{ errors.thu_3 }}</div>
						</div>
						<!-- 4th thu -->
						<div>
							<label for="thu_4" class="form-label">4<sup>th</sup> Period - Thursday</label>
							<input v-model="form.thu_4" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_4 }" id="thu_4" required />
							<div v-if="errors.thu_4" class="form-error">{{ errors.thu_4 }}</div>
						</div>
						<!-- 5th thu -->
						<div>
							<label for="thu_5" class="form-label">5<sup>th</sup> Period - Thursday</label>
							<input v-model="form.thu_5" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_5 }" id="thu_5" required />
							<div v-if="errors.thu_5" class="form-error">{{ errors.thu_5 }}</div>
						</div>
						<!-- 6th thu -->
						<div>
							<label for="thu_6" class="form-label">6<sup>th</sup> Period - Thursday</label>
							<input v-model="form.thu_6" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_6 }" id="thu_6" required />
							<div v-if="errors.thu_6" class="form-error">{{ errors.thu_6 }}</div>
						</div>
						<!-- 7th thu -->
						<div>
							<label for="thu_7" class="form-label">7<sup>th</sup> Period - Thursday</label>
							<input v-model="form.thu_7" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.thu_7 }" id="thu_7" required />
							<div v-if="errors.thu_7" class="form-error">{{ errors.thu_7 }}</div>
						</div>
						<!-- 1st fri -->
						<div>
							<label for="fri_1" class="form-label">1<sup>st</sup> Period - Friday </label>
							<input v-model="form.fri_1" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_1 }" id="fri_1" required />
							<div v-if="errors.fri_1" class="form-error">{{ errors.fri_1 }}</div>
						</div>
						<!-- 2nd fri -->
						<div>
							<label for="fri_2" class="form-label">2<sup>nd</sup> Period - Friday</label>
							<input v-model="form.fri_2" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_2 }" id="fri_2" required />
							<div v-if="errors.fri_2" class="form-error">{{ errors.fri_2 }}</div>
						</div>
						<!-- 3rd fri -->
						<div>
							<label for="fri_3" class="form-label">3<sup>rd</sup> Period - Friday</label>
							<input v-model="form.fri_3" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_3 }" id="fri_3" required />
							<div v-if="errors.fri_3" class="form-error">{{ errors.fri_3 }}</div>
						</div>
						<!-- 4th fri -->
						<div>
							<label for="fri_4" class="form-label">4<sup>th</sup> Period - Friday</label>
							<input v-model="form.fri_4" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_4 }" id="fri_4" required />
							<div v-if="errors.fri_4" class="form-error">{{ errors.fri_4 }}</div>
						</div>
						<!-- 5th fri -->
						<div>
							<label for="fri_5" class="form-label">5<sup>th</sup> Period - Friday</label>
							<input v-model="form.fri_5" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_5 }" id="fri_5" required />
							<div v-if="errors.fri_5" class="form-error">{{ errors.fri_5 }}</div>
						</div>
						<!-- 6th fri -->
						<div>
							<label for="fri_6" class="form-label">6<sup>th</sup> Period - Friday</label>
							<input v-model="form.fri_6" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_6 }" id="fri_6" required />
							<div v-if="errors.fri_6" class="form-error">{{ errors.fri_6 }}</div>
						</div>
						<!-- 7th fri -->
						<div>
							<label for="fri_7" class="form-label">7<sup>th</sup> Period - Friday</label>
							<input v-model="form.fri_7" type="text" placeholder="Enter subject name" class="form-input" :class="{ 'has-error': errors.fri_7 }" id="fri_7" required />
							<div v-if="errors.fri_7" class="form-error">{{ errors.fri_7 }}</div>
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
		timetable: Object,
	},

	components: {
		LoadingButton,
	},

	data() {
		return {
			form: this.$inertia.form({
				_method: 'put',
				mon_1: this.timetable.mon_1,
				mon_2: this.timetable.mon_2,
				mon_3: this.timetable.mon_3,
				mon_4: this.timetable.mon_4,
				mon_5: this.timetable.mon_5,
				mon_6: this.timetable.mon_6,
				mon_7: this.timetable.mon_7,
				tue_1: this.timetable.tue_1,
				tue_2: this.timetable.tue_2,
				tue_3: this.timetable.tue_3,
				tue_4: this.timetable.tue_4,
				tue_5: this.timetable.tue_5,
				tue_6: this.timetable.tue_6,
				tue_7: this.timetable.tue_7,
				wed_1: this.timetable.wed_1,
				wed_2: this.timetable.wed_2,
				wed_3: this.timetable.wed_3,
				wed_4: this.timetable.wed_4,
				wed_5: this.timetable.wed_5,
				wed_6: this.timetable.wed_6,
				wed_7: this.timetable.wed_7,
				thu_1: this.timetable.thu_1,
				thu_2: this.timetable.thu_2,
				thu_3: this.timetable.thu_3,
				thu_4: this.timetable.thu_4,
				thu_5: this.timetable.thu_5,
				thu_6: this.timetable.thu_6,
				thu_7: this.timetable.thu_7,
				fri_1: this.timetable.fri_1,
				fri_2: this.timetable.fri_2,
				fri_3: this.timetable.fri_3,
				fri_4: this.timetable.fri_4,
				fri_5: this.timetable.fri_5,
				fri_6: this.timetable.fri_6,
				fri_7: this.timetable.fri_7,
			}),
		}
	},
	methods: {
		update() {
			this.form.post(this.route('admin.timetables.update', this.timetable.id))
		},
	},
}

</script>
