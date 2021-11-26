<template>
    <modal name="createDesignation">
        <div slot="header">
            <h2 class="text-xl text-gray-600 font-medium">Add new designation</h2>
        </div>
        <div slot="modal-form">
            <form @submit.prevent="save" @keydown="form.onKeydown($event)" multipart>
                <div slot="body" class="p-8 py-12">
                    
                    <div class="mb-6">
                        <label for="name" class="input-label">{{ $t('name') }} </label>
                        <input id="name"  
                            class="input-field" 
                            type="text" 
                            :class="{ 'border border-red-500': form.errors.has('name') }"
                            v-model="form.name">
                        <has-error :form="form" field="name" class="text-red-500" />
                    </div>

                    <div>
                        <label for="description" class="input-label">{{ $t('description') }} </label>
                        <textarea id="description"  
                            class="input-field" 
                            type="text" 
                            :class="{ 'border border-red-500': form.errors.has('description') }"
                            v-model="form.description">
                        </textarea>
                        <has-error :form="form" field="description" class="text-red-500" />
                    </div>
                        
                </div>
                <div slot="footer">
                    <div class="p-8 py-4 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 flex justify-between items-center">           
                        <a @click="close" class="button-primary bg-red-400 cursor-pointer">
                            <icon name="back" />
                            <span class="ml-1">Go back</span>
                        </a>
                        <v-button :loading="form.busy" class="button-primary cursor-pointer">
                            <span class="mr-1">Save</span>
                            <icon name="save" />
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
            name:'',
            description:'',
        })
    }),

 

    methods: {
        close() {
			this.$store.dispatch("modals/close", 'createDesignation')
        },
        
        // save role
        async save () {
            await this.form.post(window.location.origin+'/api/designation')
            .then((response)=>{
                toast.fire({icon: 'success', title: 'New designation added'})
                this.$store.state.designation.designations.data.unshift(response.data.data);
                this.form.reset();
                this.close();
            }).catch(()=>{
                toast.fire({icon: 'error', title: this.$t('opps') + this.$t('something_is_wrong') + ' 😔'})
            });
        }

    }
}
</script>

