<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { BlogPost, Paginated } from '@/types';
import { Link } from '@inertiajs/vue3';
import MarkdownRenderer from '@/components/MarkdownRenderer.vue';
import { show } from '@/routes/blog';

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
        <div class="mt-8 flex flex-row gap-2">
            <template v-for="link in posts.links" :key="link.url">
                <Link
                    :href="link.url ?? '#'"
                    :class="{
                        'hover:text-hurricanes-purple bg-white text-black':
                            link.url !== null,
                        'cursor-not-allowed bg-gray-500 text-gray-800':
                            link.url === null,
                        'bg-hurricanes-purple!': link.active,
                    }"
                    class="font-hurricanes-header flex flex-col items-center justify-center p-2 text-2xl"
                >
                    <span class="whitespace-nowrap" v-html="link.label" />
                </Link>
            </template>
        </div>
    </AppLayout>
</template>

<style scoped></style>
