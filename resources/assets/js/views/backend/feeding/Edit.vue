<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.feedingEdit')">
            <div slot="form" >
                <zoo-feeding-form :form="form"></zoo-feeding-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooFeedingForm from './Form';
    export default {
        components: { zooFeedingForm },
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
                this.$http.get('/zoo/feeding/'+ this.$route.params.id).then(response => {
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
