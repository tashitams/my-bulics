<template>
    <div>
        <meta-head title="Change Password" />
        <!-- breadcrumb -->
        <nav class="py-4" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-2xl">
                <li class="pr-4">
                    <inertia-link :href="route('admin.staff.index')">
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
        <div class="bg-white p-8 rounded-2xl">
            <form @submit.prevent="update" autocomplete="off">
                <div class="space-y-6">
                    <div class="grid grid-cols-1 gap-y-8">
                        <!-- password -->
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input v-model="form.password" type="password" minlength="6" placeholder="*********" class="form-input" :class="{ 'has-error': errors.password }" id="password" required />
                            <div v-if="errors.password" class="form-error">{{ errors.password }}</div>
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" minlength="6" placeholder="*********" class="form-input" :class="{ 'has-error': errors.password_confirmation }" id="password_confirmation" required />
                            <div v-if="errors.password_confirmation" class="form-error">{{ errors.password_confirmation }}</div>
                        </div>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>UPdate Now </span>
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
        user: Object,
        errors: Object,
    },

    components: {
        LoadingButton,
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                password: null,
                password_confirmation: null
            }),
        }
    },
    methods: {
        update() {
            this.form.post(this.route('admin.staff.password', this.user.id))
        },
    },
}

</script>
