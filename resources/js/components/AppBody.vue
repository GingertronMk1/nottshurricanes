<script setup lang="ts">

</script>

<template>
    <div class="flex flex-row justify-center bg-hurricanes-purple flex-1 font-hurricanes-body">
        <div class="container flex flex-col items-stretch p-2 bg-white text-black dark:bg-black dark:text-white">
            <slot />
        </div>
    </div>
    <div class="hidden flex flex-col text-4xl text-hurricanes-purple gap-y-2 p-2">
        <div style="font-family: ZingRustD2Demo;">ZingRustD2Demo</div>
        <div style="font-family: ZingRustDemoBase;">ZingRustDemoBase</div>
        <div style="font-family: ZingRustDemoSh1;">ZingRustDemoSh1</div>
        <div style="font-family: ZingRustLH1Demo-Fill;">ZingRustLH1Demo-Fill</div>
        <div style="font-family: ZingSansRustLDemo-Base;">ZingSansRustLDemo-Base</div>
        <div style="font-family: ZingScriptRustSBDemo-Base;">ZingScriptRustSBDemo-Base</div>
    </div>
</template>

<style scoped>

</style>
