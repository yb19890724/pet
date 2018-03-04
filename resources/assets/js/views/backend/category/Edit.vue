<template>
    <div class='animated fadeIn'>
        <template v-if="">


        </template>
        <v-form :moduleTitle="$t('module.foodCategoryTitle')" ref="types">
            <div slot="form" >
                <el-form ref="form" :model="form" label-width="80px">
                    <el-form-item label="分类名称">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item label="排序">
                        <el-input v-model="form.sort"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">提交</el-button>
                        <el-button>取消</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import { mapState,mapActions } from 'vuex';
    import { postData } from '../../../helps/http';
    import { foodCategoryMethods } from '../../../vuex/types';
    export default {
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
            this.$store.state.pathParams=this.$router.history.current.params;
            this.getFindData(foodCategoryMethods.find);
        },
        methods: {
            ...mapActions ({
                getFindData:'getFindData'
            }),
            onSubmit() {
                postData('/food/category/'+this.form.id,this.form,'PUT').then(response => {
                    if(response.status == 205){
                        this.$refs.types.successNotification("修改食物分类",'/dashboard/food/category');
                    }
                })
            }
        }
    }
</script>

<style scoped>


</style>
