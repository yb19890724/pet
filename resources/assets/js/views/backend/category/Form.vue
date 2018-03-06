<template>
    <div class='contents'>
        <el-form ref="form" :model="form" label-width="80px">
            <el-form-item label="名称">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="排序">
                <el-input v-model="form.sort"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">提交</el-button>
                <el-button @click="goBack">取消</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script type="text/ecmascript-6">
    import { handleData } from '../../../helps/http';
    import { foodCategoryView } from '../../../config/backend/views';
    import { notificationRedirect,redirect } from '../../../helps/helps';
    export default{
        props:{
            form:{
                type: Object,
                default(){
                    return {};
                }
            }
        },
        data(){
            return{
                url:'',
                method:'',
                message:''
            }
        },
        mounted(){
            this.method = this.form.id ? 'put' : 'post';
            this.url = '/food/category'+(this.form.id ? '/' + this.form.id : '');
            this.message=this.$t('message.'+this.method);
        },
        methods: {
            onSubmit() {
                let self=this;
                handleData(this.url,this.method,this.form).then(response => {
                    if(response.status == 201 || response.status == 204){
                        notificationRedirect(self.message,function(){
                            self.goBack();
                        });
                    }
                })
            },
            goBack(){
                this.$router.go(-1);
            }

        }
    }
</script>

<style type="text/css" scoped>

</style>
