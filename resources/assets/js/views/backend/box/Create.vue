<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.boxCreate')" >
            <div slot="form" >
                <box-form :form="form"></box-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import BoxForm from './Form'
    export default {
        components: { BoxForm },
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
