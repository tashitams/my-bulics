<template>
    <div>
        <inertia-head title="Admin Login - My BuliCS" />
        <div class="min-h-screen text-gray-800 flex flex-col justify-center items-center">
            <div class="relative w-11/12 md:w-1/3 mx-auto px-4">
                <div class="flex flex-col items-center mb-6">
                    <h3 class="font-bold text-xl text-gray-700">Buli Central School</h3>
                    <h4 class="font-semibold text-base text-gray-600">Estd. 1983</h4>
                </div>
                <form @submit.prevent="login" autocomplete="off">
                    <div class="space-y-8">
                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input v-model="form.username" type="text" placeholder="Enter Username" class="form-input" id="username" required autocomplete="off" />
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input v-model="form.password" type="password" placeholder="Enter password" class="form-input" :class="{ 'has-error' : errors.password }" id="password" required />
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
            this.form.post(this.route('admin.login.post'))
        },
    },
}

</script>
