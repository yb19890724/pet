<template>
    <div class='contents'>
        <el-form ref="form" :model="form" :rules="rules"  label-width="80px">
            <el-form-item :label="$t('fields.food_category')" prop="food_category_id">
                <el-select v-model="form.food_category_id" :placeholder="$t('placeholder.categorySelect')" style="width: 100%;" @change="getFoodSelect">
                    <template v-for="foodCategory in foodCategoriesSelect">
                        <el-option :label="foodCategory.name" :value="foodCategory.id"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <template v-if="foodsSelect.length>0">
                <el-form-item :label="$t('fields.food')" prop="food_id">
                    <el-select v-model="form.food_id" :placeholder="$t('placeholder.foodSelect')" style="width: 100%;">
                        <template v-for="foodSelect in foodsSelect">
                            <el-option :label="foodSelect.name" :value="foodSelect.id"></el-option>
                        </template>
                    </el-select>
                </el-form-item>
            </template>

            <el-form-item :label="$t('fields.pet')" prop="pet_id">
                <el-select v-model="form.pet_id" :placeholder="$t('placeholder.petSelect')" style="width: 100%;" >
                    <template v-for="petSelect in petsSelect">
                        <el-option :label="petSelect.label" :value="petSelect.value"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.unit')">
                <template v-for="(val,index) in unit">
                    <el-radio v-model="form.unit" :label="index">{{ val }}</el-radio>
                </template>
            </el-form-item>

            <el-form-item :label="$t('fields.number')" prop="number" >
                 <el-input v-model.number="form.number"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.descriptions')">
                  <el-input type="textarea" v-model="form.descriptions"></el-input>
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
    import { unit } from '../../../config/backend/dictionaries';
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
                petsSelect:{},
                foodsSelect:{},
                foodCategoriesSelect:{},
                unit:unit,
                rules:{
                    food_category_id: [
                        { required: true, message: '请选择食物分类'}
                    ],
                    food_id:[
                        { required: true, message: '请选择食物'}
                    ],
                    pet_id:[
                        { required: true, message: '请选择宠物'}
                    ],
                    number:[
                        { type: 'number', message: '数量必须是数值型'}
                    ],
                    descriptions:[
                        { min: 1, max: 100, message: '长度在 1 到 100 个字符' }
                    ]
                }
            }
        },
        mounted(){
            this.$http.get('/food/categories').then((response) => {
                if (response.status ==200) {
                    this.foodCategoriesSelect=response.data;
                }
            });
            this.$http.get('/pets').then((response) => {
                if (response.status ==200) {
                    this.petsSelect=response.data;
                }
            });
        },
        methods: {
            onSubmit(formName) {
                this.$refs[formName].validate((valid) => {
                     if (valid) {
                          this.url = '/pet/feeding'+(this.form.id ? '/' + this.form.id : '');
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
                                  this.submit=false;
                              });
                          }
                         return false;
                     }
                     return false;
                });
            },
            goBack(){
                this.$router.go(-1);
            },
            getFoodSelect(){
                if(this.form.food_category_id!=''){
                    let params={params:{food_category_id:this.form.food_category_id}};
                        this.$http.get('/foods',params).then((response) => {
                            if (response.status ==200) {
                                this.foodsSelect=response.data;
                            }
                    });
                    return false;
                }
                this.foodsSelect={};
            }

        }
    }
</script>

<style type="text/css" scoped>

</style>
