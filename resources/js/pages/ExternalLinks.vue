<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import MarkdownRenderer from '@/components/MarkdownRenderer.vue';

defineProps<{
    links: {
        name: string;
        href: string;
    }[];
}>();
</script>

<template>
    <AppLayout>
        <div class="flex flex-col gap-2">
            <h2 class="font-hurricanes-header text-3xl">External Links</h2>
            <MarkdownRenderer />
            <div class="mt-2 flex flex-col gap-2 pl-2">
                <a
                    v-for="link in links"
                    :key="link.href"
                    class="hover:text-hurricanes-purple font-hurricanes-header text-xl"
                    :href="link.href"
                    target="_blank"
                    v-text="link.name"
                />
            </div>
        </div>
    </AppLayout>
</template>
