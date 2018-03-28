<template>
    <div class='contents'>
        <el-form ref="form" :model="form" :rules="rules" label-width="80px">
            <el-form-item :label="$t('fields.name')" prop="name">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.food_category')" prop="food_category_id">
                <el-select v-model="form.food_category_id" :placeholder="$t('placeholder.categorySelect')" style="width: 100%;">
                    <template v-for="foodCategory in foodCategorySelect">
                        <el-option :label="foodCategory.name" :value="foodCategory.id"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.sort')" prop="sort" >
                <el-input v-model.number="form.sort"></el-input>
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
                        food_category_id:""
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
                foodCategorySelect:[],
                rules: {
                    name: [
                        { required: true, message: '请输入名称', trigger: 'blur' },
                        { min: 1, max: 10, message: '长度在 1 到 10 个字符', trigger: 'blur' }
                    ],
                    sort:[
                        { type: 'number', message: '序号必须为数字值'}
                    ],
                    food_category_id:[
                        { required: true, message: '请选择食物分类'},
                    ]
                }
            }
        },
        mounted(){
            this.$http.get('/food/categories', this.form).then((response) => {
                if (response.status ==200) {
                    this.foodCategorySelect=response.data;
                }
            });
        },
        methods: {
            onSubmit(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                       this.url = '/food'+(this.form.id ? '/' + this.form.id : '');
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
