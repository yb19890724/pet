<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.boxesEdit')">
            <div slot="form" >
                <boxes-form :form="form"></boxes-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import BoxesForm from './Form'
    export default {
        components: { BoxesForm },
        data() {
            return {
                form:{
                }
            }
        },
        mounted(){
            this.getFindData();
        },
        methods: {
            getFindData(){
                this.$http.get('/boxes/'+ this.$route.params.id).then(response => {
                    if (response.data != '') {
                        this.form =response.data
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>


</style>
