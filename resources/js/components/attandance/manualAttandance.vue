<template>
    <modal name="manualAttandance">
        <div slot="header">
            <h2 class="text-xl text-gray-600 font-medium">Manual Attandance In</h2>
        </div>
        <div slot="modal-form">
            <form @submit.prevent="save" @keydown="form.onKeydown($event)" multipart>
                <div slot="body" class="p-8 py-12">
                    <div class="mb-6">
                        <label for="description" class="input-label">{{ $t('Select user') }} </label>
                        <select v-model="form.user" class="input-field">
                            <option v-for="(data, index) in allUsers" :key="index" :value="data.id">{{ data.name }}</option>
                        </select>
                        <has-error :form="form" field="user" class="text-red-500" />
                    </div>
                    
                    <div class="mb-6">
                        <label for="description" class="input-label">{{ $t('In time') }} </label>
                        <div class="flex justify-between">
                            <input v-model="form.check_in_date" type="date" class="input-field mr-1" />
                            <input v-model="form.check_in_time" type="time" class="input-field ml-2" />
                        </div>
                        
                        <has-error :form="form" field="check_in_date" class="text-red-500" />
                        <has-error :form="form" field="check_in_time" class="text-red-500" />
                    </div>
                    <div class="mb-6">
                        <label for="punched_in_note" class="input-label">{{ $t('punched_in_note') }} (Optional)</label>
                        <textarea id="punched_in_note"  
                            class="input-field" 
                            type="text" 
                            :class="{ 'border border-red-500': form.errors.has('punched_in_note') }"
                            v-model="form.punched_in_note">
                        </textarea>
                        <has-error :form="form" field="punched_in_note" class="text-red-500" />
                    </div>

                    <div class="mb-6">
                        <label for="out_time" class="input-label">{{ $t('Out time') }} </label>
                        <div class="flex justify-between">
                            <input v-model="form.check_out_date" type="date" class="input-field mr-1" />
                            <input v-model="form.check_out_time" type="time" class="input-field ml-2" />
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="punched_out_note" class="input-label">{{ $t('Punch out note') }} (Optional)</label>
                        <textarea id="punched_out_note"  
                            class="input-field" 
                            type="text" 
                            :class="{ 'border border-red-500': form.errors.has('punched_out_note') }"
                            v-model="form.punched_out_note">
                        </textarea>
                        <has-error :form="form" field="punched_out_note" class="text-red-500" />
                    </div>

                    <div>
                        <label for="punched_status" class="input-label">{{ $t('Punch status') }}</label>
                        <select v-model="form.status" class="input-field">
                            <option selected value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="onleave">On leave</option>
                        </select>
                        <has-error :form="form" field="status" class="text-red-500" />
                    </div>
                        


                </div>
                <div slot="footer">
                    <div class="p-8 py-4 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 flex justify-between items-center">           
                        <a @click="close" class="button-primary bg-red-400 cursor-pointer">
                            <icon name="back" />
                            <span class="ml-1">Go back</span>
                        </a>
                        <v-button :loading="form.busy" class="button-primary cursor-pointer">
                            <span class="mr-1">Punch In</span>
                            <icon name="finger-print" classList="text-gray-200 w-6 h-6 mr-1" />
                        </v-button>
                    </div>
                </div>
            </form>
        </div>
        
    </modal>


</template>


<script>

import { mapGetters } from "vuex"
import Form from 'vform'

export default {

    data: () => ({
        form: new Form({
            user: '',
            check_in_date:'',
            check_in_time:'',
            punched_in_note:'',
            check_out_date:'',
            check_out_time:'',
            punched_out_note:'',
            status:'present',
        })
    }),

    // GET TEAM DATA FROM VUEX-GETTERS
    computed: {
        ...mapGetters('team', ['allUsers']),
    },


    created() {
        this.getData();
    },

    methods: {

        getData() {
			this.$store.dispatch("team/fetchAllUser")
        },

        close() {
			this.$store.dispatch("modals/close", 'manualAttandance')
        },
        
        // save role
        async save () {
            await this.form.post(window.location.origin+'/api/attandance')
            .then((response)=>{
                toast.fire({icon: 'success', title: 'Punched in Successfully'})
                this.$store.dispatch("attandance/fetchAttandacne");
                this.form.reset();
                this.close();
            }).catch((e)=>{
                toast.fire({
                    icon: 'error', 
                    title: this.$t('opps') + this.$t('something_is_wrong') + ' 😔'
                })
            });
        }

    }
}
</script>

