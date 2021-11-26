<template>
    <modal name="punchIn">
        <div slot="header">
            <h2 class="text-xl text-gray-600 font-medium">Punch In</h2>
        </div>
        <div slot="modal-form">
            <form @submit.prevent="save" @keydown="form.onKeydown($event)" multipart>
                <div slot="body" class="p-8 py-12">
                    
                    <div class="mb-6">
                        <label for="description" class="input-label">{{ $t('Punch in time') }} </label>
                        <div class="flex mt-2">
                            <div>
                                <div class="bg-yellow-200 w-12 h-12 rounded-full flex items-center justify-center text-center">
                                    <icon name="clock" classList="text-yellow-500 w-6 h-6" />
                                </div>
                            </div>
                            <div class="ml-2">
                                <h2 class="text-indigo-500">Today ({{  new Date() | moment('h:mm a') }})</h2>
                                <p class="text-gray-600 text-sm">{{  new Date() | moment('MMMM Do YYYY') }}</p>
                            </div>
                        </div>
                    </div>
                        
                    <div>
                        <label for="punched_in_note" class="input-label">{{ $t('punched_in_note') }} (Optional)</label>
                        <textarea id="punched_in_note"  
                            class="input-field" 
                            type="text" 
                            :class="{ 'border border-red-500': form.errors.has('punched_in_note') }"
                            v-model="form.punched_in_note">
                        </textarea>
                        <has-error :form="form" field="punched_in_note" class="text-red-500" />
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

import Form from 'vform'

export default {

    data: () => ({
        form: new Form({
            punched_in_note:'',
        })
    }),

 

    methods: {
        close() {
			this.$store.dispatch("modals/close", 'punchIn')
        },
        
        // save role
        async save () {
            await this.form.post(window.location.origin+'/api/punch-in')
            .then((response)=>{
                toast.fire({icon: 'success', title: 'Punched in Successfully'})
                this.$store.state.department.departments.data.unshift(response.data.data);
                this.form.reset();
                this.close();
            }).catch(()=>{
                toast.fire({icon: 'error', title: this.$t('opps') + this.$t('something_is_wrong') + ' 😔'})
            });
        }

    }
}
</script>

