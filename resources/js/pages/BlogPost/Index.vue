<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import {BlogPost, Paginated} from "@/types";
import {show} from "@/routes/blog";
import {Link} from "@inertiajs/vue3";
import MarkdownRenderer from "@/components/MarkdownRenderer.vue";

defineProps<{
    posts: Paginated<BlogPost>;
}>();
</script>

<template>
    <AppLayout>
        <div class="flex flex-col gap-2">
            <article v-for="post in posts.data" :key="post.id">
                    <h3 class="font-hurricanes-header text-xl" v-text="post.title" />
                    <p class="truncate">
                        <MarkdownRenderer :markdown="post.content" />
                    </p>
                <Link :href="show({ blog: post.id })" class="font-hurricanes-header hover:text-hurricanes-purple">
                    Go to post
                </Link>
            </article>
        </div>
        <div class="flex flex-row gap-2 mt-8">

        <template v-for="link in posts.links" :key="link.url">
            <Link
                v-if="link.url"
                :href="link.url"
                class="font-hurricanes-header hover:text-hurricanes-purple bg-white text-black text-2xl p-2 flex flex-col items-center justify-center"
            >
                <span class="whitespace-nowrap" v-html="link.label" />
            </Link>
        </template>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
