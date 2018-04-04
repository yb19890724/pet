<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.geneTitle')" >

            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/gene" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { geneView } from '../../../config/backend/views';
    export default{
        components:{
            TitleView
        },
        data() {
            return {
                views:geneView,
                fields:[
                    {
                        label:'基因名称',
                        text:'name'
                    },
                    {
                        label:'基因代码',
                        text:'code'
                    },
                    {
                        label:'基因类型',
                        text:'gene_type'
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

                this.$http.delete('/gene/'+index).then(response => {
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
