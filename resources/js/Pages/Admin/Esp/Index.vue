<template>
    <div>
        <meta-head title="ESP Overview" />
        <!-- breadcrumb -->
        <nav class="flex items-center justify-between py-4" aria-label="breadcrumb">
			<ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
				<li class="pr-4">
					<inertia-link :href="route('admin.dashboard')">
						<svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
						</svg> Back
					</inertia-link>
				</li>
				<li class="px-4 text-gray-700 font-black">
					Esp List
				</li>
			</ol>
			<div class="hidden md:inline-flex flex items-center justify-between space-x-4">
				<div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
					<icon name="plus-circle" class="h-5 w-5" />
					<inertia-link :href="route('admin.esp.create')">
						Add New Staff
					</inertia-link>
				</div>
				<div class="flex items-center justify-between space-x-2 bg-white px-4 py-2 rounded shadow">
					<icon name="upload" class="h-5 w-5" />
					<inertia-link :href="route('admin.esp.upload')">
						Upload XLSX
					</inertia-link>
				</div>
			</div>
		</nav>
        <div class="bg-white p-5 pb-1 rounded-2xl">
            <ul>
                <li v-for="(esp, index) in esps" :key="esp.id" class="mb-5">
                    <inertia-link :href="route('admin.esp.edit', esp.id)">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="object-cover h-14 w-14 rounded-full shadow-lg text-xs" :src="'/storage/img/' + esp.profile_pic" :alt="esp.name">
                            </div>
                            <div class="pb-2.5 border-b border-gray-200 w-full" :class="{ 'border-none pb-0' : index == esps.length - 1 }">
                                <div class="text-base font-semibold text-gray-600">
                                    {{ esp.name }}
                                </div>
                                <div class="text-sm font-normal text-gray-600">
                                    +975{{ esp.phone_no }}
                                </div>                                
                            </div>
                        </div>
                    </inertia-link>
                </li>
                <li v-if="esps.length === 0" class="pb-4">
                    <p>No esp/gsp staff found</p>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
import AdminLayout from '@/Layout/AdminLayout'

export default {
    layout: AdminLayout,

    props: {
        esps: Array,
    },
}

</script>
