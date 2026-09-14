<script setup lang="ts">
import { ref } from 'vue';

const isOpen = ref(false);
const open = () => isOpen.value = true;
const close = () => isOpen.value = false;
</script>
<template>
    <div class="relative" @mouseenter="open()" @mouseleave="close()">
        <slot name="trigger" />
        <div class="absolute right-0 mt-2 min-w-36 bg-white border border-gray-300 rounded-md shadow-lg z-50 text-center flex-col items-stretch gap-y-2 p-2"
            :class="isOpen ? 'flex' : 'hidden'"
        >
            <slot name="content" />
        </div>
    </div>
</template>
