<template>
    <div class='animated fadeIn'>
        <div class="block" >
            <div class="block-content block-content-full">
                <slot name="search"></slot>
            </div>
        </div>
        <div class="block">
            <div class="block-header" >
                <ul class="block-options">
                    <slot name="titleButton"></slot>
                </ul>
                <h3 class="block-title">{{ moduleTitle }}</h3>
            </div>
            <div class="block-content block-content-full">
                <slot name="table"></slot>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">

    export  default{
        props:['moduleTitle']

    }
</script>

<style scoped>


</style>
