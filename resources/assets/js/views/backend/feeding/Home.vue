<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.feedingTitle')" >
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" :apiUrl="apiUrl" :fields="fields" :views="views"  ref="table" @handleDelete="handleDelete">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import TitleView from './TitleButton';
    import { notificationReload } from '../../../helps/helps';
    import { feedingView } from '../../../config/backend/views';
    export default{
        components:{
            TitleView
        },
        data() {
            return {
                apiUrl:'/pet/'+this.$route.params.id+'/feedings',
                views:feedingView,
                fields:[
                    {
                        label:'宠物名称',
                        text:'pet_name'
                    },
                    {
                        label:'食物名称',
                        text:'food_name'
                    },
                    {
                         label:'食物分类名称',
                         text:'food_category_name'
                    },
                    {
                        label:'单位',
                        text:'unit'
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

                this.$http.delete('/pet/feeding/'+index).then(response => {
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
