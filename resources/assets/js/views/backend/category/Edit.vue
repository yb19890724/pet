<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.foodCategoryTitle')">
            <div slot="form" >
                <category-form :form="form"></category-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import CategoryForm from './Form'
    import { mapState,mapActions } from 'vuex';
    import { foodCategoryMethods } from '../../../vuex/types';
    export default {
        components: { CategoryForm },
        data() {
            return {

            }
        },
        computed:{
            ...mapState({
                form:"findData"
            })
        },
        mounted(){
            this.$store.state.pathParams=this.$route.params;
            this.getFindData(foodCategoryMethods.find);
        },
        methods: {
            ...mapActions ({
                getFindData:'getFindData'
            })
        }
    }
</script>

<style scoped>


</style>
