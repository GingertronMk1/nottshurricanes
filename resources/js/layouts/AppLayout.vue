<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
import AppBody from '@/components/AppBody.vue';
</script>

<template>
    <div class="flex h-full flex-col">
        <AppHeader />
        <AppBody><slot /></AppBody>
    </div>
</template>
