<template>
    <div class='animated fadeIn'>
        <v-form :moduleTitle="$t('module.foodCategoryTitle')" ref="types">
            <div slot="form" >
                <el-form ref="form" :model="form" label-width="80px">
                    <el-form-item label="分类名称">
                        <el-input v-model="form.name"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">立即创建</el-button>
                        <el-button>取消</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </v-form>
    </div>
</template>

<script type="text/ecmascript-6">
    import {postData} from '../../../helps/http';
    export default {
        data() {
            return {
                form: {
                    name: ''
                }
            }
        },
        methods: {
            onSubmit() {
                postData('/food/category',this.form,'POST').then(response => {
                    if(response.status == 201){
                        this.$refs.types.successNotification("成功添加食物分类",'/dashboard/food/category');
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
