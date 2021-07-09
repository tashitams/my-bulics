<template>
    <div>
        <meta-head title="Add Disciplinary Record" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-lg">
                <li class="pr-4">
                    <inertia-link :href="route('staff.students.profile', student.id)">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    {{ student.name }} 
                </li>
            </ol>
        </nav>
        <div class="px-2">
        <h3 class="font-bold text-lg mb-4">Disciplinary Record Form</h3>
            <form @submit.prevent="store" autocomplete="off">
                <div class="space-y-6">
                    <div class="grid grid-cols-1 gap-20 gap-y-8">
                        <!-- title -->
                        <div>
                            <label for="title" class="form-label">Offense Committed</label>
                            <input v-model="form.title" type="text" placeholder="eg. Missing from class" class="form-input" :class="{ 'has-error': errors.title }" id="title" required />
                            <div v-if="errors.title" class="form-error">{{ errors.title }}</div>
                        </div>
                        <!-- description -->
                        <div>
                            <label for="description" class="form-label">Description</label>
                            <textarea v-model="form.description" id="description" maxlength="200" placeholder="Write what did you do to correct the student's behaviour..." class="form-input"></textarea>
                            <p class="w-full text-right text-xs pt-1 text-gray-500 dark:text-gray-400">Character Limit: 200</p>
                            <div v-if="errors.description" class="form-error">{{ errors.description }}</div>
                        </div>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>Add Now </span>
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
        student: Object
    },

    data() {
        return {
            form: this.$inertia.form({
                title: null,
                description: null,
            }),
        }
    },
    methods: {
        store() {
            this.form.post(this.route('staff.students.discipline', this.student.id))
        },
    },
}

</script>
