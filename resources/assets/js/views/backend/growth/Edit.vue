<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthEdit')">
            <div slot="form" >
                <pet-growth-form  :form="form"></pet-growth-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import petGrowthForm from './Form';
    export default {
        components: { petGrowthForm },
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
                this.$http.get('/pet/growth/'+ this.$route.params.id).then(response => {
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
