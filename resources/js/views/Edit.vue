<template>
 <div class="container">
     <div class="row">
         <div class="col-md-6">
             <div class="card">
                <div class="card-header">New Note</div>
                <div class="card-body">
                <form action="#" method="post" @submit.prevent="update">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input v-model="form.title" type="text" id="title" class="form-control" />
                        <div v-if="theErrors.title" class="mt-2 text-danger">{{theErrors.title[0]}}</div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select @change="selectedSubject" id="subject" class="form-control">
                            <option :value="form.subject_id" v-text="form.subject"></option>
                            <template v-for="subject in subjects">
                                <option v-if="subject.id != form.subject_id" :key="subject.id" :value="subject.id">{{subject.name}}</option>
                            </template>
                        </select>
                        <div v-if="theErrors.subject" class="mt-2 text-danger">{{theErrors.subject[0]}}</div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea v-model="form.description" id="description" class="form-control"></textarea>
                        <div v-if="theErrors.description" class="mt-2 text-danger">{{theErrors.description[0]}}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
         </div>
     </div>
 </div>


</template>

<script>
export default {
    data(){
        return {
            form : [],
            subjects : [],
            theErrors: [],
            successMessage : '',
            selected : '',
        };
    },

    mounted(){
        this.getSubjects();
        this.getNote();
    },
    methods :{
        async getSubjects(){
            let response= await axios.get('/api/subjects');

             if(response.status == 200){
                 this.subjects = response.data;
             }
        },

        async getNote(){
            let response =  await axios.get(`/api/notes/${this.$route.params.noteSlug}`);
            if(response.status == 200){
                 this.form = response.data.data;
             }
        },
        selectedSubject(e){
            this.selected = e.target.value;
        },

        async update(){
            if(this.selected != ''){
                this.form['subject_id'] = this.selected
            }
                console.log(this.form);

            let response = await axios.patch(`/api/notes/${this.$route.params.noteSlug}/edit`,this.form);
            if(response.status == 200){
                Vue.toasted.show(response.data.message,{
                    duration:3000,
                    type: "success"
                });
                this.$router.push('/notes/table');
            }

        },
    }


}
</script>
