<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.zooCreate')" >
            <div slot="form" >
                <zoo-form :form="form"></zoo-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooForm from './Form'
    export default {
        components: { zooForm },
        data() {
            return {
                form: {
                    name: '',
                    sex: 'male',
                    birthday: '',
                    sort: 0,
                    state: 'good',
                    descriptions: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
