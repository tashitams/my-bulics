<template>
    <div>
        <inertia-head title="Forgot Password - My BuliCS" />
        <div class="min-h-screen text-gray-800 flex flex-col justify-center items-center">
            <div class="relative w-11/12 md:w-1/3 mx-auto px-4">
                <div class="flex flex-col items-center mb-6">
                    <h3 class="font-bold text-xl text-gray-700">Buli Central School</h3>
                    <h4 class="font-semibold text-base text-gray-600">Estd. 1983</h4>
                </div>
                <form @submit.prevent="store" autocomplete="off">
                    <div class="space-y-8">
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="email" class="form-label">E-mail Address</label>
                                <inertia-link :href="route('staff.login')" class="text-xs font-display font-bold text-indigo-600 hover:text-gray-800 cursor-pointer focus:outline-none">Back to Login</inertia-link>
                            </div>
                            <input id="email" v-model="form.email" type="email" class="form-input" placeholder="Education email address" required autocomplete="off" />
                            <div v-if="errors.email" class="form-error">{{ errors.email }}</div>
                        </div>
                        <div>
                            <loading-button :loading="form.processing" class="form-btn w-full" type="submit">
                                <span>Send Reset Link</span>
                            </loading-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import LoadingButton from '@/Shared/LoadingButton'
export default {

    components: {
        LoadingButton,
    },

    props: {
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: null,
            }),
        }
    },

    methods: {
        store() {
            this.form.post(this.route('forgot.password.post'))
        },
    },
}

</script>
