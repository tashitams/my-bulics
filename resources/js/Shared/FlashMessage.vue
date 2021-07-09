<template>
    <transition name="slide-fade">
        <div v-if="$page.props.flash.message && show" class="w-11/12 md:w-1/4 absolute bottom-2 md:right-5 mx-5 flex justify-center items-center bg-gray-800 rounded shadow p-4">
            <div class="mr-1">
                <svg class="fill-current h-5 w-5 text-gray-100 mr-2" viewBox="0 0 20 20">
                    <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                </svg>
            </div>
            <div class="flex-1 text-gray-200 text-sm font-semibold tracking-wider">
                {{ $page.props.flash.message }}
            </div>
            <div class="ml-2 flex items-center">
                <button class="align-top text-gray-100 focus:outline-none" @click="show = false">
                    <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </transition>
</template>
<script>
export default {
    data() {
        return {
            show: true,
            timeout: null,
        }
    },

    watch: {
        '$page.props.flash': {
            handler() {
                this.show = true;

                if (this.timeout) {
                    clearTimeout(this.timeout);
                }

                this.timeout = setTimeout(() => this.show = false, 3000);
            },
            deep: true,
        },
    },
}
</script>

<style>
.slide-fade-enter-active {
    transition: all .3s ease;
}

.slide-fade-leave-active {
    transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter,
.slide-fade-leave-to {
    transform: translateX(10px);
    opacity: 0;
}
</style>
