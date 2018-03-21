<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthEdit')">
            <div slot="form" >
                <food-form :form="form"></food-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import foodForm from './Form';
    export default {
        components: { foodForm },
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
                this.$http.get('/food/'+ this.$route.params.id).then(response => {
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
