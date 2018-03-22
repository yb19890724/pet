<template>
    <div class="table-button" slot="titleButton">
        <el-button-group>
            <el-button type="primary" size="small" @click="createView"><i class="el-icon-plus"></i></el-button>
            <!--<el-button type="primary" size="small" @click="editView"><i class="el-icon-edit"></i></el-button>
            <el-button type="primary" size="small" @click="deleteRow"><i class="el-icon-delete"></i></el-button>-->
        </el-button-group>
    </div>
</template>
<script type="text/ecmascript-6">
    import { feedingView } from '../../../config/backend/views';

    export default{
        methods: {
            createView(){
                let params={id:this.$route.params.id};
                this.$router.push({name: feedingView.create,params:params});
            },
            editView(){
                this.$router.push({name: feedingView.edit});
            },
            deleteRow(){
                alert('删除');
            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
