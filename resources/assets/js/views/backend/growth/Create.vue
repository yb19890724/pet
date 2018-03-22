<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthCreate')" >
            <div slot="form" >
                <pet-growth-form :form="form"></pet-growth-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import petGrowthForm from './Form'
    export default {
        components: { petGrowthForm },
        data() {
            return {
                form: {
                    pet_id:this.$route.params.id,
                    weight: '',
                    body_length: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
