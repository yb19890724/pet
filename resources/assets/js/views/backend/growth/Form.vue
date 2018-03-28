<template>
    <div class='contents'>
        <el-form ref="form" :model="form" :rules="rules" label-width="80px">
            <el-form-item :label="$t('fields.weight')" prop="weight">
                <el-input v-model.number="form.weight"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.body_length')" prop="body_length">
                <el-input v-model.number="form.body_length"></el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="onSubmit('form')">{{ $t('form.submit') }}</el-button>
                <el-button @click="goBack">{{ $t('form.cancel')}}</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script type="text/ecmascript-6">
    import { notificationRedirect,redirect } from '../../../helps/helps';
    export default{
        props:{
            form:{
                type: Object,
                default(){
                    return {
                    };
                }
            }
        },
        data(){
            return{
                url:'',
                method:'',
                message:'',
                submit:false,
                rules:{
                     weight:[
                          { type: 'number', message: '体重必须为数字值'}
                     ],
                     body_length:[
                          { type: 'number', message: '体长必须为数字值'}
                     ]
                }
            }
        },
        methods: {
            onSubmit(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.url = '/pet/growth'+(this.form.id ? '/' + this.form.id : '');
                        this.method = this.form.id ? 'put' : 'post';
                        this.message=this.$t('message.'+this.method);
                        if(this.submit==false){
                           this.submit=true;
                           let self=this;
                           this.$http[this.method](this.url, this.form).then((response) => {
                               if (response.status == 201 || response.status == 204) {
                                   notificationRedirect(self.message, function () {
                                       self.goBack();
                                   });
                               }
                           }).catch(({response}) => {
                               this.isSubmit();
                           });
                        }
                        return false;
                    }
                    return false;
                });
            },
            isSubmit(){
                this.submit=this.submit?true:false;
            },
            goBack(){
                this.$router.go(-1);
            }

        }
    }
</script>

<style type="text/css" scoped>

</style>
