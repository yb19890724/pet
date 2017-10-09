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

            <!-- table 展示位置 -->
            <v-table slot="table" :types="types" :fields="fields">

            </v-table>

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
                        label:'中心名称',
                        text:'name'
                    },
                    {
                        label:'地址',
                        text:'address'
                    }
                ],
                multipleSelection: []
            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
