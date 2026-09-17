<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { BlogPost, Paginated } from '@/types';
import { Link } from '@inertiajs/vue3';
import MarkdownRenderer from '@/components/MarkdownRenderer.vue';
import { show } from '@/routes/blog';
import PaginationButtons from '@/components/PaginationButtons.vue';

defineProps<{
    posts: Paginated<BlogPost>;
}>();
</script>

<template>
    <AppLayout>
        <div class="flex flex-col gap-2">
            <article v-for="post in posts.data" :key="post.id">
                <h3
                    class="font-hurricanes-header text-xl"
                    v-text="post.title"
                />
                <p class="truncate">
                    <MarkdownRenderer :markdown="post.content" />
                </p>
                <Link
                    :href="show({ blog_post: post })"
                    class="font-hurricanes-header hover:text-hurricanes-purple"
                >
                    Go to post
                </Link>
            </article>
        </div>
        <PaginationButtons :pagination="posts" />
    </AppLayout>
</template>

<style scoped></style>
