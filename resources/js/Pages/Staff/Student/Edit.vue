<template>
    <div>
        <meta-head :title="student.name" />
        <!-- breadcrumb -->
        <nav class="mb-4 py-1" aria-label="breadcrumb">
            <ol class="flex leading-none text-indigo-600 divide-x divide-indigo-400 font-bold text-xl">
                <li class="pr-4">
                    <inertia-link :href="route('staff.students.show', student.grade_id)">
                        <svg class="h-5 w-5 inline-block" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg> Back
                    </inertia-link>
                </li>
                <li class="px-4 text-gray-700 font-black">
                    Update Student
                </li>
            </ol>
        </nav>
        <div class="bg-white p-8 rounded-2xl">
            <form @submit.prevent="update" autocomplete="off">
                <div class="mb-5 text-center md:text-left">
                    <avatar-input v-model="form.profile_pic" :default-src="'/storage/img/' + student.profile_pic" class="h-24 w-24 rounded-full"></avatar-input>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Profile Picture
                    </h3>
                    <p class="mt-1 text-sm text-gray-500 break-normal">
                        Max Image Size 1 MB.
                    </p>
                    <div v-if="errors.profile_pic" class="form-error">{{ errors.profile_pic }}</div>
                </div>
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-20 gap-y-8">
                        <!-- name -->
                        <div>
                            <label for="name" class="form-label">Student Name</label>
                            <input v-model="form.name" type="text" placeholder="Enter student name" class="form-input" :class="{ 'has-error': errors.name }" id="name" required />
                            <div v-if="errors.name" class="form-error">{{ errors.name }}</div>
                        </div>
                        <!-- student_code -->
                        <div>
                            <label for="student_code" class="form-label">Student Code</label>
                            <input v-model="form.student_code" type="text" maxlength="17" minlength="17" placeholder="Enter student code" class="form-input" :class="{ 'has-error': errors.student_code }" id="student_code" required />
                            <div v-if="errors.student_code" class="form-error">{{ errors.student_code }}</div>
                        </div>
                        <!-- gender -->
                        <div>
                            <label for="gender" class="form-label">Gender</label>
                            <select v-model="form.gender" id="gender" class="appearance-none form-input" required>
                                <option value="" disabled>Choose a gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <!-- dob -->
                        <div>
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input v-model="form.dob" type="date" placeholder="Select DOB" class="form-input" :class="{ 'has-error': errors.dob }" id="dob" required />
                            <div v-if="errors.dob" class="form-error">{{ errors.dob }}</div>
                        </div>
                        <!-- cid no -->
                        <div>
                            <label for="cid_no" class="form-label">Citizen ID</label>
                            <input v-model="form.cid_no" type="text" maxlength="11" minlength="11" placeholder="Enter citizen id" class="form-input" :class="{ 'has-error': errors.cid_no }" id="cid_no" />
                            <div v-if="errors.cid_no" class="form-error">{{ errors.cid_no }}</div>
                        </div>
                        <!-- boarder/dayscholar -->
                        <div>
                            <label for="is_boarder" class="form-label">Student Type</label>
                            <select v-model="form.is_boarder" id="is_boarder" class="appearance-none form-input" required>
                                <option value="" disabled>Choose Boarder/Dayscholar</option>
                                <option value="Boarder">Boarder</option>
                                <option value="Dayscholar">Dayscholar</option>
                            </select>
                        </div>
                        <!-- village -->
                        <div>
                            <label for="village" class="form-label">Village</label>
                            <input v-model="form.village" type="text" maxlength="30" placeholder="Enter village name" class="form-input" :class="{ 'has-error': errors.village }" id="village" required />
                            <div v-if="errors.village" class="form-error">{{ errors.village }}</div>
                        </div>
                        <!-- gewog -->
                        <div>
                            <label for="gewog" class="form-label">Gewog</label>
                            <input v-model="form.gewog" type="text" maxlength="30" placeholder="Enter gewog name" class="form-input" :class="{ 'has-error': errors.gewog }" id="gewog" required />
                            <div v-if="errors.gewog" class="form-error">{{ errors.gewog }}</div>
                        </div>
                        <!-- dzongkhag -->
                        <div>
                            <label for="dzongkhag" class="form-label">Dzongkhag</label>
                            <select v-model="form.dzongkhag" id="dzongkhag" class="appearance-none form-input" required>
                                <option value="" disabled>Select dzongkhag</option>
                                <option value="Bumthang">Bumthang</option>
                                <option value="Chhukha">Chhukha</option>
                                <option value="Dagana">Dagana</option>
                                <option value="Gasa">Gasa</option>
                                <option value="Haa">Haa</option>
                                <option value="Lhuentse">Lhuentse</option>
                                <option value="Mongar">Mongar</option>
                                <option value="Paro">Paro</option>
                                <option value="Pema Gatshel">Pema Gatshel</option>
                                <option value="Punakha">Punakha</option>
                                <option value="Samdrup Jongkhar">Samdrup Jongkhar</option>
                                <option value="Samtse">Samtse</option>
                                <option value="Sarpang">Sarpang</option>
                                <option value="Thimphu">Thimphu</option>
                                <option value="Trashigang">Trashigang</option>
                                <option value="Trashi Yangtse">Trashi Yangtse</option>
                                <option value="Trongsa">Trongsa</option>
                                <option value="Tsirang">Tsirang</option>
                                <option value="Wangdue Phodrang">Wangdue Phodrang</option>
                                <option value="Zhemgang">Zhemgang</option>
                            </select>
                        </div>
                        <!-- father name -->
                        <div>
                            <label for="father_name" class="form-label">Father Name</label>
                            <input v-model="form.father_name" type="text" maxlength="30" placeholder="Enter father name" class="form-input" :class="{ 'has-error': errors.father_name }" id="father_name" />
                            <div v-if="errors.father_name" class="form-error">{{ errors.father_name }}</div>
                        </div>
                        <!-- mother name -->
                        <div>
                            <label for="mother_name" class="form-label">Mother Name</label>
                            <input v-model="form.mother_name" type="text" maxlength="30" placeholder="Enter father name" class="form-input" :class="{ 'has-error': errors.mother_name }" id="mother_name" />
                            <div v-if="errors.mother_name" class="form-error">{{ errors.mother_name }}</div>
                        </div>
                        <!-- contact no -->
                        <div>
                            <label for="phone_no" class="form-label">Contact Number</label>
                            <input v-model="form.phone_no" type="text" maxlength="8" minlength="8" placeholder="17****** or 77******" class="form-input" :class="{ 'has-error': errors.phone_no }" id="phone_no" />
                            <div v-if="errors.phone_no" class="form-error">{{ errors.phone_no }}</div>
                        </div>
                    </div>
                    <div>
                        <loading-button :loading="form.processing" class="form-btn" type="submit">
                            <span>Update Now </span>
                        </loading-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import AppLayout from '@/Layout/AppLayout'
import AvatarInput from '@/Shared/AvatarInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
    layout: AppLayout,

    components: {
        LoadingButton,
        AvatarInput,
    },

    props: {
        student: Object,
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                _method: 'put',
                name: this.student.name,
                student_code: this.student.student_code,
                gender: this.student.gender,
                dob: this.student.dob,
                cid_no: this.student.cid_no,
                is_boarder: this.student.is_boarder,
                village: this.student.village,
                gewog: this.student.gewog,
                dzongkhag: this.student.dzongkhag,
                father_name: this.student.father_name,
                mother_name: this.student.mother_name,
                phone_no: this.student.phone_no,
                profile_pic: null,
            }),
        }
    },
    methods: {
        update() {
            this.form.post(this.route('staff.students.update', this.student.id))
        },
    },
}

</script>
