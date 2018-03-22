<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthCreate')" >
            <div slot="form" >
                <zoo-growth-form :form="form"></zoo-growth-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooGrowthForm from './Form'
    export default {
        components: { zooGrowthForm },
        data() {
            return {
                form: {
                    zoo_id:this.$route.params.id,
                    weight: '',
                    body_length: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
