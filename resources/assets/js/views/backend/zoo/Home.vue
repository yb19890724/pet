<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.zooTitle')" >
            <!-- 搜索视图 -->
            <SearchView slot="search" @searchListData="searchListData"></SearchView>
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/zoo" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import SearchView from './Search';
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { zooView } from '../../../config/backend/views';
    export default{
        components:{
            SearchView,TitleView
        },
        data() {
            return {
                views:zooView,
                fields:[
                    {
                        label:'宠物名称',
                        text:'name'
                    },
                    {
                        label:'性别',
                        text:'sex_title'
                    },
                    {
                        label:'颜色',
                        text:'color_title'
                    },
                    {
                        label:'状态',
                        text:'state_title'
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

                this.$http.delete('/zoo'+index).then(response => {
                    if(response.status==204){
                        notificationReload(self.$t('message.delete'),function(){
                            self.$refs.table.reloadListData();
                        });
                    }
                }).catch(function (error) {
                    console.log(error);
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
