<script setup lang="ts">
import { ref } from 'vue';

const isOpen = ref(false);
const open = () => (isOpen.value = true);
const close = () => (isOpen.value = false);
</script>
<template>
    <div class="relative" @mouseenter="open()" @mouseleave="close()">
        <slot name="trigger" />
        <div
            class="absolute right-0 z-50 mt-2 min-w-36 flex-col items-stretch gap-y-2 rounded-md border border-gray-300 bg-white p-2 text-center shadow-lg"
            :class="isOpen ? 'flex' : 'hidden'"
        >
            <slot name="content" />
        </div>
    </div>
</template>
