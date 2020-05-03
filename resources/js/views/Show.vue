<template>
    <div>
        <h1>{{note.title}}</h1>
        {{note.published}} - {{note.subject}}
        <br>
        {{note.description}}
    </div>

</template>

<script>
export default {

    data(){
        return{
            note:[],
        }
    },

    mounted(){
        console.log(this.$route.params.noteSlug);
        this.getNote();
    },

    methods : {
        async getNote(){
            console.log('this.response');
            let response = await axios.get('/api/notes/'+this.$route.params.noteSlug);
            this.note = response.data.data;
        }
    }
}
</script>
