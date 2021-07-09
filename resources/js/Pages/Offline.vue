<template>
	<div>
		<meta-head title="You're offline" />
		<div class="relative mx-auto p-8">
			<div class="flex items-center space-x-2 mb-1">
				<icon name="offline" class="h-6 w-6" />
				<div class="font-semibold">You're offline</div>
			</div>
			<h3 class="font-semibold">Looks like you're not connected to the internet. Check your settings and try again.</h3>
			<p class="font-semibold mt-4">Try:</p>
			<ul class="list-disc ml-5">
				<li>Turning off <span class="font-bold underline">Airplane mode</span></li>
				<li>Turning on <span class="font-bold underline">Mobile data</span> or <span class="font-bold underline">Wi-Fi</span></li>
				<li>Check the signal in your area</li>
			</ul>
		</div>
	</div>
</template>
<script>
export default {}
</script>
