<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.feedingCreate')" >
            <div slot="form" >
                <zoo-feeding-form :form="form"></zoo-feeding-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooFeedingForm from './Form'
    export default {
        components: { zooFeedingForm },
        data() {
            return {
                form: {
                    id:'',
                    zoo_id:'',
                    food_id:'',
                    food_category_id:'',
                    zoo_box_id:'',
                    unit:'',
                    descriptions:''
                }
            }
        }
    }
</script>

<style scoped>

</style>
