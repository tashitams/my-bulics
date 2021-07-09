<template>
    <div>
        <meta-head title="Leave Details" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
                <li class="pr-4">
                    <inertia-link :href="route('staff.leaves.show')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Leave Details
                </li>
            </ol>
        </nav>
        <div class="px-2">
            <form @submit.prevent="update">
                <div class="space-y-4">
                    <div>
                        <label for="from_date" class="form-label">From Date</label>
                        <input v-model="form.from_date" type="text" class="form-input" id="from_date" disabled />
                    </div>
                    <div>
                        <label for="to_date" class="form-label">To Date</label>
                        <input v-model="form.to_date" type="text" class="form-input" id="to_date" disabled />
                        <div v-if="errors.to_date" class="form-error">{{ errors.to_date }}</div>
                    </div>
                    <div>
                        <label for="leave_type" class="form-label">Leave Type</label>
                        <input v-model="form.leave_type" type="text" class="form-input" id="leave_type" disabled />
                    </div>
                    <div>
                        <label for="reason" class="form-label">Reason</label>
                        <textarea v-model="form.reason" id="reason" class="form-input border-none" disabled></textarea>
                    </div>
                    <div>
                        <label for="leave_status" class="form-label">Leave Status</label>
                        <select v-model="form.leave_status" id="leave_status" class="appearance-none form-input" required>
                            <option value="" disabled>Choose Leave Status</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>Update Now</span>
                        </loading-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'
import LoadingButton from '@/Shared/LoadingButton'
export default {
    layout: AppLayout,

    components: {
        LoadingButton,
    },

    props: {
        errors: Object,
        leave: Object
    },
    
    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                from_date: this.leave.from_date,
                to_date: this.leave.to_date,
                leave_type: this.leave.leave_type,
                reason: this.leave.reason,
                leave_status: '',
            }),
        }
    },
    methods: {
        update() {
            this.form.put(this.route('staff.leaves.update', this.leave.id))
        }
    },
}

</script>
