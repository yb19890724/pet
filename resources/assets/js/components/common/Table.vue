<template>
    <div class="table-components">


        <el-table
            ref="multipleTable"
            :data="tableData"
            border
            @selection-change="handleSelectionChange"
            @row-dblclick="editRow"
            highlight-current-row
            :empty-text="$t('table.contextEmpty')">

            <!-- CheckBox 勾选框 -->
            <el-table-column  v-if="checkbox" type="selection"  label="selection">
            </el-table-column>

            <!--  显示数据序号 -->
            <el-table-column v-if="index" type="index" label="序号" width="65" >
            </el-table-column>

            <template v-for="(field,index) in fields">
                <el-table-column :prop="field.text"  :label="field.label"  ></el-table-column>
            </template>

            <el-table-column label="操作">
                <template slot-scope="scope">
                    <el-button
                            size="mini"
                            @click="handleEdit(this,scope.row.id)">编辑</el-button>
                    <el-button
                            size="mini"
                            type="danger"
                            @click="handleDelete(this,scope.row.id)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>
<script type="text/ecmascript-6">
    import { mapState,mapActions} from 'vuex';
    import { handleData } from '../../helps/http';
    export default{
        props:{
            fields:{//列表展示列
                type: Array,
                required: true
            },
            checkbox:{
                type: Boolean,
                default:true
            },
            index:{
                type: Boolean,
                default:true
            },
            views:{
                type: Object,
                default(){
                    return false;
                }
            },
            types:{
                type: Object,
                default(){
                    return false;
                }
            }
        },
        mounted(){
            this.getListData(this.types.list,{});
        },
        data() {
            return {
                multipleSelection: []
            }
        },
        computed:{
            ...mapState([
                "tableData"
            ])
        },
        watch: {
            // 如果路由有变化，会再次执行该方法
            $route: 'fetchData'
        },
        methods: {
            ...mapActions ({
                getListData:'getListData',
                handleData:'handleData'
            }),
            toggleSelection(rows) {
                if (rows) {
                    rows.forEach(row => {
                        this.$refs.multipleTable.toggleRowSelection(row);
                    });
                } else {
                    this.$refs.multipleTable.clearSelection();
                }
            },
            handleSelectionChange(val) {
                this.multipleSelection = val;
            },
            handleEdit(event,index){
               this.$router.push({ name: this.views.edit, params: { id: index }});
            },
            handleDelete(event,index){
                this.$emit('handleDelete',index);
            },
            reloadListData(){
                this.getListData(this.types.list, {});
            },
            editRow(){

            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
