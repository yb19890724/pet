<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.petTitle')" >
            <!-- 搜索视图 -->
            <SearchView slot="search" @searchListData="searchListData"></SearchView>
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/pet" :fields="fields" :button="button" :views="views" :buttonWith="buttonWith" ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import SearchView from './Search';
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { petView } from '../../../config/backend/views';
    export default{
        components:{
            SearchView,TitleView
        },
        data() {
            return {
                button:'pet',
                buttonWith:450,
                views:petView,
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
                        label:'状态',
                        text:'status_title'
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

                this.$http.delete('/pet/'+index).then(response => {
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
