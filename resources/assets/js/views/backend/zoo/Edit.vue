<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.zooEdit')">
            <div slot="form" >
                <zoo-form ></zoo-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import zooForm from './Form';
    export default {
        components: { zooForm }
    }
</script>

<style scoped>


</style>
