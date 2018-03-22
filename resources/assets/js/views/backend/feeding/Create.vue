<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.feedingCreate')" >
            <div slot="form" >
                <pet-feeding-form :form="form"></pet-feeding-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import petFeedingForm from './Form'
    export default {
        components: { petFeedingForm },
        data() {
            return {
                form: {
                    id:'',
                    pet_id:'',
                    food_id:'',
                    food_category_id:'',
                    pet_box_id:'',
                    unit:'',
                    descriptions:''
                }
            }
        }
    }
</script>

<style scoped>

</style>
