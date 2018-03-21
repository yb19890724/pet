<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.growthCreate')" >
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
                    name: '',
                    sort: 0
                }
            }
        }
    }
</script>

<style scoped>

</style>
