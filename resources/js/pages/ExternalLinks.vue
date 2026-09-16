<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";

defineProps<{
    links: {
        name: string;
        href: string;
    }[]
}>();
</script>

<template>
    <AppLayout>
        <h2 class="font-hurricanes-header text-3xl">External Links</h2>
        <div class="flex flex-col gap-2 mt-2 pl-2">
                <a
                    v-for="link in links"
                    :key="link.href"
                    class="hover:text-hurricanes-purple"
                    :href="link.href"
                    target="_blank"
                    v-text="link.name"
                />
        </div>
    </AppLayout>
</template>
