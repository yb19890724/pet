<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.zooEdit')">
            <div slot="form" >
                <zoo-form ></zoo-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooForm from './Form';
    export default {
        components: { zooForm }/*,
        data() {
            return {
                form:{
                }
            }
        },
        methods: {
            getFindData(){
                if(this.$route.params.id!=''){
                    this.$http.get('/zoo/'+ this.$route.params.id).then(response => {
                        if (response.data != '') {
                            this.form =response.data
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        }*/
    }
</script>

<style scoped>


</style>
