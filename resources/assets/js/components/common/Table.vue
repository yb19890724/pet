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

            <!-- 显示展示列数据 -->
            <template v-for="field in fields" >
                <el-table-column  :prop="field.text"  :label="field.label">
                </el-table-column>
            </template>

        </el-table>
    </div>
</template>
<script type="text/ecmascript-6">

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
            }
        },
        data() {
            return {
                tableData: [{
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                name: '王小虎',
                address: '上海市普陀区金沙江路 1517 弄'
            }, {
                name: '王小虎',
                address: '上海市普陀区金沙江路 1519 弄'
            }, {
                name: '王小虎',
                address: '上海市普陀区金沙江路 1516 弄'
            }],
                multipleSelection: []
            }
        },
        mounted(){

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
            editRow(){
                alert(1);
            }
        }

    }
</script>

<style type="text/css" scoped>

</style>
