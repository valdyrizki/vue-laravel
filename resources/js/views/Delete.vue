.<template>
    <button ref="destroyNote" @click="destroyNote" class="btn btn-danger">Delete</button>
</template>

<script>
export default {
    props : ['endpoint'],
    methods : {
        async destroyNote(){
            let q = window.confirm('Are you sure to delete this note ?');
            if(q){
                let response = await axios.delete(`/api/notes/${this.endpoint}/delete`);

                if(response.status == 200){
                    Vue.toasted.show(response.data.message,{
                        duration:3000,
                        type: "success"
                    });

                    this.$refs.destroyNote.parentNode.parentNode.remove();
                }
            }
        }
    }
}
</script>
