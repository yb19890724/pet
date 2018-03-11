<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.boxesCreate')" >
            <div slot="form" >
                <boxes-form :form="form"></boxes-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import BoxesForm from './Form'
    export default {
        components: { BoxesForm },
        data() {
            return {
                form: {
                    box_number: '',
                    sort: 0
                }
            }
        }
    }
</script>

<style scoped>

</style>
