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
    import CategoryForm from './Form';
    import { fetchData } from '../../../helps/http';
    export default {
        components: { CategoryForm },
        data() {
            return {
                form:{}
            }
        },
        mounted(){
            this.getFindData();
        },
        methods: {
            getFindData(){
                fetchData('/food/category/' + this.$route.params.id).then(response=> {
                    if (response.data != '') {
                        this.form = response.data;
                    }
                }).catch(function (error) {
                    console.log(error);
                });

            }
        }
    }
</script>

<style scoped>


</style>
