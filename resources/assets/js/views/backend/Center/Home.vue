<template>
    <div class='animated fadeIn'>

        <v-searchTable :moduleTitle="$t('module.centerTitle')">

            <!-- 搜索视图 -->
            <SearchView slot="search" ></SearchView>

            <!-- 按钮视图 -->
            <v-tableButtonDialog slot="titleButton" >

                <!-- 弹层组件 -->
               <!-- <CreateView slot="create"></CreateView>
                <EditView slot="edit"></EditView>-->

            </v-tableButtonDialog>

            <div slot="table">
                表格内容
            </div>

        </v-searchTable>

    </div>
</template>
<script type="text/ecmascript-6">

    import SearchView from './Search';

    export default{
        components:{
            SearchView
        },
        data() {
            return {
                fields:[
                    {
                        label:'日期',
                        text:'date'
                    },
                    {
                        label:'姓名',
                        text:'name'
                    },
                    {
                        label:'地址',
                        text:'address'
                    }
                ],
                multipleSelection: [],
                tableData: [{
                    date: '2016-05-02',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-04',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1517 弄'
                }, {
                    date: '2016-05-01',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1519 弄'
                }, {
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1516 弄'
                }]
            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
