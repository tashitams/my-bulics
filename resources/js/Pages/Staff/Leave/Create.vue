<template>
    <div>
        <meta-head title="Leave Form" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
                <li class="pr-4">
                    <inertia-link :href="route('staff.leaves.index')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Leave Form
                </li>
            </ol>
        </nav>
        <div class="px-2">
            <form @submit.prevent="apply">
                <div class="flex flex-col mb-4 space-y-1">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Leave Details
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Please fill up the leave form.
                    </p>
                </div>
                <div class="space-y-6">
                    <div>
                        <label for="from_date" class="form-label">From Date</label>
                        <input v-model="form.from_date" type="date" :min="form.from_date" placeholder="Select from date" class="form-input" :class="{ 'has-error': errors.from_date }" id="from_date" required />
                        <div v-if="errors.from_date" class="form-error">{{ errors.from_date }}</div>
                    </div>
                    <div>
                        <label for="to_date" class="form-label">To Date</label>
                        <input v-model="form.to_date" type="date" :min="form.to_date" placeholder="Select from date" class="form-input" :class="{ 'has-error': errors.to_date }" id="to_date" required />
                        <div v-if="errors.to_date" class="form-error">{{ errors.to_date }}</div>
                    </div>
                    <div>
                        <label for="leave_type" class="form-label">Leave Type</label>
                        <select v-model="form.leave_type" id="leave_type" class="appearance-none form-input" required>
                            <option value="" disabled>Choose Leave Type</option>
                            <option value="Casual">Casual</option>
                            <option value="Medical">Medical</option>
                            <option value="Official">Official</option>
                            <option value="Maternity">Maternity</option>
                            <option value="Paternity">Paternity</option>
                            <option value="Bereavement">Bereavement</option>
                        </select>
                    </div>
                    <div>
                        <label for="reason" class="form-label">Reason</label>
                        <textarea v-model="form.reason" id="reason" maxlength="200" placeholder="Write your reason for leave." class="form-input border-none" :class="{ 'has-error': errors.reason }" required></textarea>
                        <p class="w-full text-right text-xs pt-1 text-gray-500 dark:text-gray-400">Character Limit: 200</p>
                        <div v-if="errors.reason" class="form-error">{{ errors.reason }}</div>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>Apply Now </span>
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
    },

    data() {
        return {
            form: this.$inertia.form({
                from_date: new Date().toISOString().substr(0, 10),
                to_date: new Date().toISOString().substr(0, 10),
                leave_type: '',
                reason: null,
            }),
        }
    },

    methods: {
        apply() {
            this.form.post(this.route('staff.leaves.store'), {
                onSuccess: () => this.form.reset()
            })
        },
    },
}

</script>
