<template>
    <div class='contents'>
        <el-form ref="form" :model="form" label-width="80px">

            <el-form-item :label="$t('fields.box_number')">
                <el-select v-model="form.box_id" :placeholder="$t('placeholder.boxSelect')" style="width: 100%;">
                    <template v-if="petBoxes!=''">
                        <template v-for="box in petBoxes">
                            <el-option :label="box.label" :value="box.value"></el-option>
                        </template>
                    </template>
                </el-select>
            </el-form-item>

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
                <el-color-picker v-model="form.color"></el-color-picker>
            </el-form-item>

            <el-form-item :label="$t('fields.dominant_gene')">
                <template v-if="dominantGene.length!=''">
                    <span v-for="(val,index) in dominantGene" class="el-checkbox__label">
                        <input type="checkbox" :value="val.value" v-model="dominant_gene">
                        <label>{{ val.label }}</label>
                    </span>
                </template>
            </el-form-item>

            <el-form-item :label="$t('fields.hide_gene')">
                <template v-if="hideGene!=''">
                    <span v-for="(val,index) in hideGene" class="el-checkbox__label">
                        <input type="checkbox" :value="val.value" v-model="hide_gene">
                        <label>{{ val.label }}</label>
                    </span>
                </template>
            </el-form-item>

            <el-form-item :label="$t('fields.birthday')">
                <el-date-picker
                        v-model="form.birthday"
                        type="datetime"
                        value-format="yyyy-MM-dd HH:mm:ss"
                        placeholder="选择日期时间"
                        style="width: 100%;">
                </el-date-picker>
            </el-form-item>

            <el-form-item :label="$t('fields.sort')">
                <el-input v-model="form.sort"></el-input>
            </el-form-item>

            <el-form-item :label="$t('fields.father')">
                <el-select v-model="form.father_id" :placeholder="$t('placeholder.fatherSelect')" style="width: 100%;">
                    <template v-if="father!=''">
                        <template v-for="father in father">
                            <el-option :label="father.label" :value="father.value"></el-option>
                        </template>
                    </template>
                </el-select>
            </el-form-item>

            <el-form-item :label="$t('fields.mother')">
                <el-select v-model="form.mother_id" :placeholder="$t('placeholder.motherSelect')" style="width: 100%;">
                    <template v-if="mother!=''">
                        <template v-for="mother in mother">
                            <el-option :label="mother.label" :value="mother.value"></el-option>
                        </template>
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
    import { state,sex } from '../../../config/backend/dictionaries';
    export default{
        data(){
            return {
                dominant_gene: [],
                hide_gene: [],
                form: {
                    name: '',
                    color: '',
                    sex: 'male',
                    birthday: '',
                    sort: 0,
                    state: 'good',
                    descriptions: '',
                    box_id: '',
                    father_id: '',
                    mother_id: '',
                    dominant_gene: [],
                    hide_gene: []
                },
                id: '',
                url: '',
                method: '',
                message: '',
                submit: false,
                sex: sex,
                state: state,
                mother: {},
                father: {},
                hideGene: {},
                dominantGene: {},
                petBoxes: {}
            }
        },
        mounted(){
            this.getFindData();
            this.hideGeneAll();
            this.dominantGeneAll();
            this.petBoxesAll();
        },
        methods: {
            onSubmit() {
                this.form.dominant_gene = this.dominant_gene;
                this.form.hide_gene = this.hide_gene;
                this.url = '/pet' + (this.form.id ? '/' + this.form.id : '');
                this.method = this.form.id ? 'put' : 'post';
                this.message = this.$t('message.' + this.method);
                if (this.submit == false) {
                    this.submit = true;
                    let self = this;
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
                this.submit = this.submit ? true : false;
            },
            goBack(){
                this.$router.go(-1);
            },
            motherSelect(){
                let params = {
                    sex: 'female',
                    not_id: this.id != '' && this.id != undefined ? this.id : ''
                };
                this.$http.get('/pets', {params: params}).then((response) => {
                    if (response.status == 200) {
                        this.mother = response.data;
                    }
                });
            },
            fatherSelect(){
                let params = {
                    sex: 'male',
                    not_id: this.id != '' && this.id != undefined ? this.id : ''
                };
                this.$http.get('/pets', {params: params}).then((response) => {
                    if (response.status == 200) {
                        this.father = response.data;
                    }
                });
            },
            hideGeneAll(){
                this.$http.get('/genes', {params: {gene_type: 'hide'}}).then((response) => {
                    if (response.status == 200) {
                        this.hideGene = response.data;
                    }
                });
            },
            dominantGeneAll(){
                this.$http.get('/genes', {params: {gene_type: 'dominant'}}).then((response) => {
                    if (response.status == 200) {
                        this.dominantGene = response.data;
                    }
                });
            },
            petBoxesAll(){
                this.$http.get('/boxes').then((response) => {
                    if (response.status == 200) {
                        this.petBoxes = response.data;
                    }
                });
            },
            getFindData(){
                this.id = this.$route.params.id;
                if (this.id != '' && this.id != undefined) {
                    this.$http.get('/pet/' + this.id).then(response => {
                        if (response.data != '') {
                            this.form = response.data;
                            this.dominant_gene = this.form.dominant_gene;
                            this.hide_gene = this.form.hide_gene;
                            this.fatherSelect();
                            this.motherSelect();
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                    return false;
                }
                this.fatherSelect();
                this.motherSelect();
            }
        }
    }
</script>

<style type="text/css" scoped>
    .el-checkbox__label {
        padding-right: 2px;
        padding-top: 10px;
    }
</style>
