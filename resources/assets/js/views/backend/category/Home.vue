<template>
    <div class='animated fadeIn'>
        <v-searchTable :moduleTitle="$t('module.zooTitle')" >
            <!-- 搜索视图 -->
            <SearchView slot="search" ></SearchView>
            <!-- 按钮视图-->
            <TitleView slot="titleButton"></TitleView>
            <!-- table 展示位置 -->
            <v-table slot="table" :fields="fields" :views="views" :types="types">

            </v-table>

        </v-searchTable>
    </div>
</template>
<script type="text/ecmascript-6">
    import SearchView from './Search';
    import TitleView from './TitleButton';
    import { foodCategoryView } from '../../../config/backend/views';
    import { foodCategoryMethods } from '../../../vuex/types';
    export default{
        components:{
            SearchView,TitleView
        },
        data() {
            return {
                types:foodCategoryMethods,
                views:foodCategoryView,
                fields:[
                    {
                        label:'宠物名称',
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
            }
        }

    }
</script>

<style type="text/css" scoped>

</style>
