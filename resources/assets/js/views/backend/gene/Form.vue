<template>
    <div class='contents'>
        <el-form ref="form" :model="form"  label-width="80px">
            <el-form-item :label="$t('fields.name')">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item :label="$t('fields.gene_type')">
                <template v-for="(val,index) in geneType">
                    <el-radio v-model="form.gene_type" :label="index">{{ val }}</el-radio>
                </template>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">{{ $t('form.submit') }}</el-button>
                <el-button @click="goBack">{{ $t('form.cancel')}}</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script type="text/ecmascript-6">
    import { notificationRedirect,redirect } from '../../../helps/helps';
    import { geneType } from '../../../config/backend/dictionaries';
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
                message:'',
                submit:false,
                geneType:geneType
            }
        },
        methods: {
            onSubmit() {
                this.url = '/gene'+(this.form.id ? '/' + this.form.id : '');
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
