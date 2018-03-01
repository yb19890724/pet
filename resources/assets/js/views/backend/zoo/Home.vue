<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.zooTitle')">
            <!-- 搜索视图 -->
            <SearchView slot="search" ></SearchView>
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" :fields="fields">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import SearchView from './Search';
    import TitleView from './TitleButton';
    export default{
        components:{
            SearchView,TitleView
        },
        data() {
            return {
                fields:[
                    {
                        label:'宠物名称',
                        text:'name'
                    },
                    {
                        label:'地址',
                        text:'address'
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
            editRow(){
                alert(1);
            }
        }

    }
</script>

<style type="text/css" scoped>

</style>
