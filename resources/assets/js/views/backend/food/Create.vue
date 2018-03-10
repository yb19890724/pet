<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.foodCreate')" >
            <div slot="form" >
                <food-form :form="form"></food-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import foodForm from './Form'
    export default {
        components: { foodForm },
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
