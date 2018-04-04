<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.geneCreate')" >
            <div slot="form" >
                <gene-form :form="form"></gene-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import GeneForm from './Form'
    export default {
        components: { GeneForm },
        data() {
            return {
                form: {
                    name: '',
                    gene_type: 'dominant',
                    code: ''
                }
            }
        }
    }
</script>

<style scoped>

</style>
