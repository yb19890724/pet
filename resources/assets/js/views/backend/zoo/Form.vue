<template>
    <div class='contents'>
        <el-form ref="form" :model="form"  label-width="80px">

            <el-form-item :label="$t('fields.name')">
                <el-input v-model="form.name"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.sex')">
                <template v-for="(val,index) in sex">
                    <el-radio v-model="form.sex" :label="index">{{ val }}</el-radio>
                </template>
            </el-form-item>

            <el-form-item :label="$t('fields.state')">
                <template v-for="(val,index) in state">
                    <el-radio v-model="form.state" :label="index">{{ val }}</el-radio>
                </template>
            </el-form-item>

            <el-form-item :label="$t('fields.color')">
                <el-select v-model="form.color" :placeholder="$t('placeholder.colorSelect')" style="width: 100%;">
                    <template v-for="(label,value) in color">
                        <el-option
                                    :label="label"
                                    :value="value"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.dominant_gene')">
                <el-checkbox-group v-model="form.dominant_gene" >
                    <span v-for="(val,index) in dominantGene" class="el-checkbox__label">
                        <el-checkbox :label="val" size="medium" ></el-checkbox>
                    </span>
                </el-checkbox-group>
            </el-form-item>

            <el-form-item :label="$t('fields.hide_gene')">
                <el-checkbox-group v-model="form.hide_gene" >
                    <span v-for="(val,index) in hideGene" class="el-checkbox__label">
                        <el-checkbox :label="val" size="medium" ></el-checkbox>
                    </span>
                </el-checkbox-group>
            </el-form-item>

            <el-form-item :label="$t('fields.birthday')">
                <el-date-picker
                        v-model="form.birthday"
                        type="datetime"
                        value-format="yyyy-MM-dd HH:mm:ss"
                        placeholder="选择日期时间"
                        style="width: 100%;">
                </el-date-picker >
            </el-form-item>

            <el-form-item :label="$t('fields.sort')">
                <el-input v-model="form.sort"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.father')">
                <el-select v-model="form.father_id" :placeholder="$t('placeholder.parentSelect')" style="width: 100%;">
                    <template v-for="father in father">
                        <el-option :label="father.label" :value="father.value"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.mother')">
                <el-select v-model="form.mother_id" :placeholder="$t('placeholder.motherSelect')" style="width: 100%;">
                    <template v-for="mother in mother">
                        <el-option :label="mother.label" :value="mother.value"></el-option>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.descriptions')">
                <el-input type="textarea" v-model="form.descriptions"></el-input>
            </el-form-item>

            <el-form-item>
                <el-button type="primary" @click="onSubmit">{{ $t('form.submit') }}</el-button>
                <el-button @click="goBack">{{ $t('form.cancel')}}</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<script type="text/ecmascript-6">
    import { foodCategoryView } from '../../../config/backend/views';
    import { notificationRedirect,redirect } from '../../../helps/helps';
    import { color,state,sex } from '../../../config/backend/dictionaries';
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
                sex:sex,
                color:color,
                state:state,
                mother:{},
                father:{},
                hideGene:{},
                dominantGene:{}
            }
        },
        mounted(){
            this.fatherSelect();
            this.motherSelect();
            this.hideGeneAll();
            this.dominantGeneAll();
        },
        methods: {
            onSubmit() {
                this.url = '/zoo'+(this.form.id ? '/' + this.form.id : '');
                this.method = this.form.id ? 'put' : 'post';
                this.message=this.$t('message.'+this.method);
                if(this.submit==false){
/*
                    this.submit=true;
*/
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
/*
                this.submit=this.submit?true:false;
*/
            },
            goBack(){
                this.$router.go(-1);
            },
            motherSelect(){
                this.$http.get('/zoos', {params:{sex:'female'}}).then((response) => {
                    if (response.status ==200) {
                        this.mother=response.data;
                    }
                });
            },
            fatherSelect(){
                this.$http.get('/zoos', {params:{sex:'male'}}).then((response) => {
                    if (response.status ==200) {
                        this.father=response.data;
                    }
                });
            },
            hideGeneAll(){
                this.$http.get('/genes', {params:{gene_type:'hide'}}).then((response) => {
                    if (response.status ==200) {
                        this.hideGene=response.data;
                    }
                });
            },
            dominantGeneAll(){
                this.$http.get('/genes', {params:{gene_type:'dominant'}}).then((response) => {
                    if (response.status ==200) {
                        this.dominantGene=response.data;
                    }
                });
            }
        }
    }
</script>

<style type="text/css" scoped>
    .el-checkbox__label{
        padding-right: 2px;
        padding-top: 10px;
    }
</style>
