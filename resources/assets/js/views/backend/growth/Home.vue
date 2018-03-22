<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.growthTitle')" >
            <!-- 搜索视图 -->
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" apiUrl="/zoo/growth" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { growthView } from '../../../config/backend/views';
    export default{
        components:{
            TitleView
        },
        data() {
            return {
                views:growthView,
                fields:[
                    {
                        label:'体重',
                        text:'weight'
                    },
                    {
                        label:'体长',
                        text:'body_length'
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

                this.$http.delete('/zoo/growth/'+index).then(response => {
                    if(response.status==204){
                        notificationReload(self.$t('message.delete'),function(){
                            self.$refs.table.reloadListData();
                        });
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }

    }
</script>

<style type="text/css" scoped>

</style>
