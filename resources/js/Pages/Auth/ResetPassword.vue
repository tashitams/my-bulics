<template>
    <div>
        <inertia-head title="Reset Password - My BuliCS" />
        <div class="min-h-screen text-gray-800 flex flex-col justify-center items-center">
            <div class="relative w-11/12 md:w-1/3 mx-auto px-4">
                <div class="flex flex-col items-center mb-6">
                    <h3 class="font-semibold text-xl text-gray-700">Buli Central School</h3>
                    <h4 class="font-semibold text-lg text-gray-700">Zhemgang</h4>
                </div>
                <form @submit.prevent="reset">
                    <div class="space-y-8">
                        <div>
                            <label for="email" class="form-label">E-mail Address</label>
                            <input v-model="form.email" type="email" placeholder="Enter your email address" class="form-input" :class="{ 'has-error' : errors.email }" id="email" required />
                            <div v-if="errors.email" class="form-error">{{ errors.email }}</div>
                        </div>
                        <div>
                            <label for="password" class="form-label">New Password</label>
                            <input v-model="form.password" type="password" placeholder="Enter your new password" class="form-input" :class="{ 'has-error' : errors.password }" id="password" required />
                            <div v-if="errors.password" class="form-error">{{ errors.password }}</div>
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input v-model="form.password_confirmation" type="password" placeholder="Confirm your new password" class="form-input" :class="{ 'has-error' : errors.password_confirmation }" id="password_confirmation" required />
                            <div v-if="errors.password_confirmation" class="form-error">{{ errors.password_confirmation }}</div>
                        </div>
                        <input v-model="form.token" type="hidden" required />
                        <div>
                            <loading-button :loading="form.processing" class="form-btn w-full" type="submit">
                                <span>Update Now</span>
                            </loading-button>
                        </div>
                    </div>
                </form>
            </div>
            <flash-message />
        </div>
    </div>
</template>
<script>
import LoadingButton from '@/Shared/LoadingButton'
import FlashMessage from '@/Shared/FlashMessage'

export default {

    components: {
        LoadingButton,
        FlashMessage,
    },

    props: {
        errors: Object,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: null,
                password: null,
                password_confirmation: null,
                token: this.token,
            }),
        }
    },

    methods: {
        reset() {
            this.form.post(this.route('password.reset.post'))
        },
    },
}

</script>
