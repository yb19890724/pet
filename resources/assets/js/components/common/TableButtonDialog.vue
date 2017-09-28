<template>
    <div class="table-button-dialog">
        <div class="table-button">
            <el-button-group>
                <el-button type="primary" size="small" @click="showDialog($event,'create')" ><i class="el-icon-plus"></i></el-button>
                <el-button type="primary" size="small" @click="showDialog($event,'edit')" ><i class="el-icon-edit"></i></el-button>
                <el-button type="primary" size="small" @click="deleteData" ><i class="el-icon-delete"></i></el-button>
            </el-button-group>
        </div>
        <!--<div class="table-dialog">
            <el-dialog title="角色管理" :modal-append-to-body="true" size="small" >
                <span v-if="$store.state.dialogView == 'create' ">
                    <slot name="create"></slot>
                </span>
                <span v-if="$store.state.dialogView == 'edit' ">
                    <slot name="edit"></slot>
                </span>
                <span slot="footer" class="dialog-footer">
                    <el-button @click="$store.state.showDialog= false">取 消</el-button>
                    <el-button type="primary" @click="$store.state.showDialog = false">确 定</el-button>
                </span>
            </el-dialog>
        </div>-->
    </div>
</template>

<script type="text/ecmascript-6">

    export default{
        data(){
            return {
                dialogView:"",
                dialogTitle:'',
            }
        },
        methods:{
            showDialog(event,view){//显示弹层
                //this.$store.state.showDialog=true;
                this.dialogView=view;
            },
            deleteData(){//删除记录
                /*if(this.$store.state.tableChecked==''){
                    alert('您未选择任何对象，请选择一行数据！');
                }*/
            },
            storeData(){//添加纪录

            },
            updateData(){//修改记录

            }
        }
    }
</script>

<style scoped>


</style>
