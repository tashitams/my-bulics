<template>
    <div>
        <inertia-head title="Login Now - My BuliCS" />
        <div class="min-h-screen text-gray-800 flex flex-col justify-center items-center">
            <div class="relative w-11/12 md:w-1/3 mx-auto px-4">
                <div class="flex flex-col items-center mb-6">
                    <h3 class="font-bold text-xl text-gray-700">Buli Central School</h3>
                    <h4 class="font-semibold text-base text-gray-600">Estd. 1983</h4>
                </div>
                <form @submit.prevent="login" autocomplete="off">
                    <div class="space-y-8">
                        <div>
                            <label for="username" class="form-label">E-mail or phone</label>
                            <input v-model="form.username" type="text" placeholder="Enter Email or Phone" class="form-input" :class="{ 'has-error' : errors.username }" id="username" required autocomplete="off" />
                            <div v-if="errors.username" class="form-error">{{ errors.username }}</div>
                        </div>
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="password" class="form-label">Password</label>
                                <inertia-link :href="route('staff.forgot.password')" class="text-xs font-bold text-indigo-600 hover:text-gray-800 cursor-pointer focus:outline-none" tabindex="-1">Forgot Password?</inertia-link>
                            </div>
                            <input id="password" v-model="form.password" type="password" class="form-input" :class="{ 'has-error' : errors.password }" placeholder="Enter Password" autocomplete="current-password" tabindex="0" required />
                            <div v-if="errors.password" class="form-error">{{ errors.password }}</div>
                        </div>
                        <div>
                            <loading-button :loading="form.processing" class="form-btn w-full" type="submit">
                                <span>Login Now</span>
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
    },

    data() {
        return {
            form: this.$inertia.form({
                username: null,
                password: null,
            }),
        }
    },

    methods: {
        login() {
            this.form.post(this.route('staff.login.post'))
        },
    },
}

</script>
