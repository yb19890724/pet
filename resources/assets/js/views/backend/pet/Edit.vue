<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.petEdit')">
            <div slot="form" >
                <pet-form ></pet-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import petForm from './Form';
    export default {
        components: { petForm }
    }
</script>

<style scoped>


</style>
