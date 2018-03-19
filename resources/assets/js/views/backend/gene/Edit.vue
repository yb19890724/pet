<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.boxEdit')">
            <div slot="form" >
                <gene-form :form="form"></gene-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import GeneForm from './Form'
    export default {
        components: { GeneForm },
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
                this.$http.get('/gene/'+ this.$route.params.id).then(response => {
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
