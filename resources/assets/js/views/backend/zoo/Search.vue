<template>
    <div>
        <form class="form-horizontal">
            <div class="input-group col-lg-12 col-md-12 col-sm-12">
                <input type="text" name="name" v-model="form.search_name" class="form-control search-text" :placeholder="$t('placeholder.categoryName')">
                <div class="input-group-btn">
                    <button class="btn btn-success" type="button" @click="searchList">搜索</button>
                    <button class="btn btn-default" type="button" @click="reset">重置</button>
                </div>
            </div>
        </form>
    </div>

</template>

<script type="text/ecmascript-6">
    export  default{
        data(){
            return {
                form:{
                    search_name:""
                }
            }
        },
        methods:{
            searchList(){
                this.$emit('searchListData',this.form);
            },
            reset(){
                this.form.search_name='';
            }

        }
    }
</script>

<style scoped>


</style>
