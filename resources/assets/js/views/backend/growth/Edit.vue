<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthEdit')">
            <div slot="form" >
                <zoo-growth-form  :form="form"></zoo-growth-form >
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooGrowthForm from './Form';
    export default {
        components: { zooGrowthForm },
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
                this.$http.get('/zoo/growth'+ this.$route.params.id).then(response => {
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
