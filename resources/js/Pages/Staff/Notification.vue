<template>
	<div>
		<meta-head title="Notification" />
		<!-- breadcrumb -->
		<nav class="flex items-center justify-between mb-4 py-1" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
				<li class="pr-4">
					<inertia-link :href="route('staff.dashboard')">
						<icon name="back-arrow" class="h-5 w-5 inline-block" /> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					Notification
				</li>
			</ol>
		</nav>
		<div class="relative mx-auto px-2">
			<h3 class="font-semibold">Looks like you don't have any notification at the moment</h3>
			<p class="font-semibold mt-4">Try:</p>
			<ul class="list-disc ml-5">
				<li><span class="font-bold underline">Refreshing</span> the page</li>
				<li>Turning on <span class="font-bold underline">Mobile data</span> or <span class="font-bold underline">Wi-Fi</span></li>
				<li>Check the signal in your area</li>
			</ul>
		</div>
	</div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'

export default {
	layout: AppLayout,
}

</script>
