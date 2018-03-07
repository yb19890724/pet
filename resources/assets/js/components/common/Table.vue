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
            <!--<el-table-column  v-if="checkbox" type="selection"  label="selection">
            </el-table-column>-->

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
        <div class="block" style="margin-top: 20px">
<!--
            <span class="demonstration">完整功能</span>
-->
            <el-pagination
                background
                @current-change="handleCurrentChange"
                :current-page="current_page"
                :page-size="20"
                layout="total, prev, pager, next"
                :total="total">
            </el-pagination>
        </div>
    </div>
</template>
<script type="text/ecmascript-6">
    import { mapState,mapActions} from 'vuex';
    import { fetchData } from '../../helps/http';
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
                    return {};
                }
            },
            types:{
                type: Object,
                default(){
                    return {};
                }
            },
            apiUrl:{
                type: String,
                required: true
            }
        },
        mounted(){
            this.getTableData();
        },
        data() {
            return {
                current_page:1,//当前页
                prev_page_url:"",//上一页连接
                next_page_url:"",//下一页连接
                total:0,//总记录
                tableData:[],
                multipleSelection: []
            }
        },
        methods: {
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
            handleEdit(event,index){//加载修改页面
               this.$router.push({ name: this.views.edit, params: { id: index }});
            },
            handleDelete(event,index){
                this.$emit('handleDelete',index);
            },
            reloadListData(){//重新加载数据
                this.getTableData();
            },
            getTableData(url=""){//获取table数据
                url=url!=''?url:this.apiUrl;
                fetchData(url).then(response=> {
                    if (response.data != '') {
                        this.tableData=response.data.data;
                        this.current_page=response.data.current_page;
                        this.total=response.data.total;
                        this.prev_page_url=response.data.prev_page_url;
                        this.next_page_url=response.data.next_page_url;
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            },
            editRow(){

            },
            handleCurrentChange(val) {
                let url;
                if(val-this.current_page==1){//下一页
                    url=this.next_page_url;
                }

                if(val-this.current_page==-1){//上一页
                    url=this.prev_page_url;
                }

                this.getTableData(url);return false;
            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
