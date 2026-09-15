<script setup lang="ts"></script>

<template>
    <div
        class="bg-hurricanes-purple font-hurricanes-body flex flex-1 flex-row justify-center"
    >
        <div
            class="container flex flex-col items-stretch bg-white p-2 text-black dark:bg-black dark:text-white"
        >
            <slot />
        </div>
    </div>
    <div
        class="text-hurricanes-purple flex hidden flex-col gap-y-2 p-2 text-4xl"
    >
        <div style="font-family: ZingRustD2Demo">ZingRustD2Demo</div>
        <div style="font-family: ZingRustDemoBase">ZingRustDemoBase</div>
        <div style="font-family: ZingRustDemoSh1">ZingRustDemoSh1</div>
        <div style="font-family: ZingRustLH1Demo-Fill">
            ZingRustLH1Demo-Fill
        </div>
        <div style="font-family: ZingSansRustLDemo-Base">
            ZingSansRustLDemo-Base
        </div>
        <div style="font-family: ZingScriptRustSBDemo-Base">
            ZingScriptRustSBDemo-Base
        </div>
    </div>
</template>

<style scoped></style>
