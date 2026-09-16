<script setup lang="ts"></script>
<template>
    <div
        class="flex flex-col *:flex *:flex-col [&>*:nth-child(even)]:md:flex-row-reverse [&>*:nth-child(odd)]:md:flex-row [&>*>*]:flex-1 [&>*>*]:md:max-w-1/2"
    >
        <slot />
    </div>
</template>
