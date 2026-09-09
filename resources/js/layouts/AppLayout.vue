<script setup lang="ts">

import AppHeader from "@/components/AppHeader.vue";
import AppBody from "@/components/AppBody.vue";
</script>

<template>
    <div class="flex flex-col h-full">
        <AppHeader />
        <AppBody><slot /></AppBody>
    </div>
</template>
