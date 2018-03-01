<template>
    <div class='contents'>
        <div class="block">
            <div class="block-header" >
                <h3 class="block-title">{{ moduleTitle }}</h3>
            </div>
            <div class="block-content block-content-full">
                <slot name="form"></slot>
            </div>
        </div>
    </div>
</template>
<script type="text/ecmascript-6">

    export default{
        props:['moduleTitle']
    }
</script>

<style type="text/css" scoped>
    .contents {
        margin: 0 auto;
        padding: 16px 14px 1px;
        max-width: 100%;
        overflow-x: visible;
    }

    .block {
        background-color: #fff;
        -webkit-box-shadow: 0 2px rgba(0, 0, 0, 0.01);
        box-shadow: 0 2px rgba(0, 0, 0, 0.01);
    }

    .block-header {
        padding: 15px 15px;
        -webkit-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
        border-bottom: 1px solid #eee;
    }

    .block-title {
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        line-height: 1.2;
        margin: 5px;
    }

    .block-content {
        margin: 0 auto;
        padding: 20px 20px 20px;
        max-width: 100%;
        overflow-x: visible;
        -webkit-transition: opacity 0.2s ease-out;
        transition: opacity 0.2s ease-out;
    }

    .block-options {
        float: right;
        padding: 0;
        height: 24px;
        list-style: none;
    }

    .block-options.block-options-left + .block-title {
        float: right;
    }
    .block-options > li {
        display: inline-block;
        margin: 0 2px;
        padding: 0;
    }
</style>
