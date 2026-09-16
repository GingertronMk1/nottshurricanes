<script setup lang="ts">
import {BlogPost} from "@/types";
import AppLayout from "@/layouts/AppLayout.vue";
import MarkdownRenderer from "@/components/MarkdownRenderer.vue";

defineProps<{
    post: BlogPost
}>();
</script>

<template>
    <AppLayout>
        <div class="flex flex-col gap-2">
            <h2 class="font-hurricanes-header text-3xl" v-text="post.title" />
            <MarkdownRenderer :markdown="post.content" />
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
