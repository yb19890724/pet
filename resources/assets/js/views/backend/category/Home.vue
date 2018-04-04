<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.foodCategoryTitle')" >
            <!-- 搜索视图 -->
            <SearchView slot="search" @searchListData="searchListData"></SearchView>
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/food/category" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import SearchView from './Search';
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { foodCategoryView } from '../../../config/backend/views';
    export default{
        components:{
            SearchView,TitleView
        },
        data() {
            return {
                views:foodCategoryView,
                fields:[
                    {
                        label:'食物分类名称',
                        text:'name'
                    },
                    {
                        label:'排序',
                        text:'sort'
                    },
                    {
                        label:'添加时间',
                        text:'created_at'
                    },
                    {
                        label:'修改时间',
                        text:'updated_at'
                    }
                ],
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
            handleDelete(index){
                let self=this;

                this.$http.delete('/food/category/'+index).then(response => {
                    if(response.status==204){
                        notificationReload(self.$t('message.delete'),function(){
                            self.$refs.table.reloadListData();
                        });
                    }
                });
            },
            searchListData(params){
                this.$refs.table.getTableData('',params);
            }
        }

    }
</script>

<style type="text/css" scoped>

</style>
