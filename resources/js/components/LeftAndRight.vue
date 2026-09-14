<script setup lang="ts">
</script>
<template>
    <div class="flex flex-col *:flex *:flex-col [&>*:nth-child(odd)]:md:flex-row [&>*:nth-child(even)]:md:flex-row-reverse [&>*>*]:md:max-w-1/2 [&>*>*]:flex-1">
        <slot />
    </div>
</template>
