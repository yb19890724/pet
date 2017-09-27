<!-- 后台主框架 -->
<template>
    <div>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            <!-- begin #header -->
            <HeaderBar></HeaderBar>
            <!-- end #header -->

            <!-- begin #sidebar -->
            <AsideBar></AsideBar>
            <!-- <div class="sidebar-bg"></div>-->
            <!-- end #sidebar -->

            <!-- begin #content -->
            <div id="content" class="content">
                <router-view></router-view>
                <!-- end row -->
            </div>
            <!-- end #content -->
            
            <!--<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>-->
            <!-- end scroll to top btn -->
        </div>


    </div>
</template>
<script type="text/ecmascript-6">

    import HeaderBar from './Header.vue';
    import AsideBar from './aside.vue';

    export default{
        components: {
            AsideBar, HeaderBar
        }
    }

</script>

<style type="text/css" scoped>

</style>
