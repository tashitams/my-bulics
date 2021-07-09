<template>
    <div>
        <meta-head title="Change Password" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
                <li class="pr-4">
                    <inertia-link :href="route('staff.profile')">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Change Password
                </li>
            </ol>
        </nav>
        <div class="px-2 py-3">
            <form @submit.prevent="update" autocomplete="off">
                <div class="space-y-6">
                    <div class="grid grid-cols-1 gap-20 gap-y-8">
                        <!-- current_password -->
                        <div>
                            <label for="current_password" class="form-label">Current Password</label>
                            <input v-model="form.current_password" type="password" minlength="6" placeholder="Type your current password" class="form-input" :class="{ 'has-error': errors.current_password }" id="current_password" required />
                            <div v-if="errors.current_password" class="form-error">{{ errors.current_password }}</div>
                        </div>
                        <div>
                            <label for="password" class="form-label">New Password</label>
                            <input v-model="form.password" type="password" minlength="6" placeholder="Type your new password" class="form-input" :class="{ 'has-error': errors.password }" id="password" required />
                            <div v-if="errors.password" class="form-error">{{ errors.password }}</div>
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" placeholder="Confirm your new password" class="form-input" id="password_confirmation" required autocomplete="current-password" />
                            <div v-if="errors.password_confirmation" class="form-error">
                                {{ errors.password_confirmation }}
                            </div>
                        </div>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>Change Now </span>
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

    props: {
        errors: Object,
    },

    components: {
        LoadingButton,
    },

    data() {
        return {
            form: this.$inertia.form({
                current_password: null,
                password: null,
                password_confirmation: null,
            }),
        }
    },
    methods: {
        update() {
            this.form.post(this.route('staff.password'))
        },
    },
}

</script>
