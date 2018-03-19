<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.boxTitle')" >

            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/box" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { boxView } from '../../../config/backend/views';
    export default{
        components:{
            TitleView
        },
        data() {
            return {
                views:boxView,
                fields:[
                    {
                        label:'箱号',
                        text:'box_number'
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

                this.$http.delete('/box/'+index).then(response => {
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
