<template>
	<div>
		<meta-head title="Class Timetable" />
		<!-- breadcrumb -->
		<nav class="mb-4 py-1" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-700 divide-x divide-indigo-400 font-bold text-lg">
				<li class="pr-4">
					<inertia-link :href="route('staff.timetables.index')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					{{ class_name }}
				</li>
			</ol>
		</nav>
		<div class="flex flex-col">
			<div class="overflow-x-auto">
				<div class="align-middle inline-block min-w-full">
					<div class="shadow rounded-lg overflow-hidden">
						<table class="min-w-full">
							<thead class="bg-indigo-700 border-b border-white">
								<tr>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider border-r-2">
										Days
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										1<sup>st</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										2<sup>nd</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										3<sup>rd</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										4<sup>th</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										5<sup>th</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										6<sup>th</sup>
									</th>
									<th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-100 uppercase tracking-wider">
										7<sup>th</sup>
									</th>
								</tr>
							</thead>
							<tbody class="bg-white divide-y divide-gray-100">
								<!-- monday -->
								<tr>
									<td class="p-6 whitespace-nowrap bg-indigo-700">
										<div class="text-sm text-gray-100 uppercase font-bold">
											Monday
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.mon_1 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.mon_2 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.mon_3 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.mon_4 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.mon_5">
												{{ period.mon_5 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.mon_6">
												{{ period.mon_6 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.mon_7">
												{{ period.mon_7 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
								</tr>
								<!-- tuesday -->
								<tr class="bg-gray-50">
									<td class="p-6 whitespace-nowrap bg-indigo-700">
										<div class="text-sm uppercase font-bold text-gray-100">
											Tuesday
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.tue_1 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.tue_2 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.tue_3 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.tue_4 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.tue_5">
												{{ period.tue_5 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.tue_6">
												{{ period.tue_6 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.tue_7">
												{{ period.tue_7 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
								</tr>
								<!-- wednesday -->
								<tr>
									<td class="p-6 whitespace-nowrap bg-indigo-700">
										<div class="text-sm uppercase font-bold text-gray-100">
											Wednesday
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.wed_1 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.wed_2 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.wed_3 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.wed_4 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.wed_5">
												{{ period.wed_5 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.wed_6">
												{{ period.wed_6 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.wed_7">
												{{ period.wed_7 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
								</tr>
								<!-- thursday -->
								<tr class="bg-gray-50">
									<td class="p-6 whitespace-nowrap bg-indigo-700">
										<div class="text-sm uppercase font-bold text-gray-100">
											Thursday
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.thu_1 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.thu_2 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.thu_3 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.thu_4 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.thu_5">
												{{ period.thu_5 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.thu_6">
												{{ period.thu_6 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.thu_7">
												{{ period.thu_7 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
								</tr>
								<!-- friday -->
								<tr>
									<td class="p-6 whitespace-nowrap bg-indigo-700">
										<div class="text-sm uppercase font-bold text-gray-100">
											Friday
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.fri_1 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.fri_2 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.fri_3 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											{{ period.fri_4 }}
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.fri_5">
												{{ period.fri_5 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.fri_6">
												{{ period.fri_6 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
									<td class="p-6 whitespace-nowrap">
										<div class="text-sm font-normal text-gray-900">
											<span v-if="period.fri_7">
												{{ period.fri_7 }}
											</span>
											<span v-else>n/a</span>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
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
		period: Object,
		class_name: String
	},
}

</script>
