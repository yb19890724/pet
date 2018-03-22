<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.feedingEdit')">
            <div slot="form" >
                <pet-feeding-form :form="form"></pet-feeding-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import petFeedingForm from './Form';
    export default {
        components: { petFeedingForm },
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
                this.$http.get('/pet/feeding/'+ this.$route.params.id).then(response => {
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
