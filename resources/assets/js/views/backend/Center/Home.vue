<template>
    <div class='animated fadeIn'>

        <v-searchtable :moduleTitle="$t('module.centerTitle')">

            <!-- 搜索视图 -->
            <SearchView slot="search" ></SearchView>

        </v-searchtable>

    </div>
</template>
<script type="text/ecmascript-6">

    import SearchView from './Search';

    export default{
        components:{
            SearchView
        }
    }
</script>

<style type="text/css" scoped>

</style>
