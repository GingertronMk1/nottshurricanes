<script setup lang="ts">
import { BlogPost } from '@/types';
import AppLayout from '@/layouts/AppLayout.vue';
import MarkdownRenderer from '@/components/MarkdownRenderer.vue';
import { computed } from 'vue';

const props = defineProps<{
    post: BlogPost;
}>();

const postedAt = computed(() => new Date(props.post.created_at));
const updatedAt = computed(() => new Date(props.post.updated_at));
const showUpdatedAt = computed(() => postedAt.value !== updatedAt.value);
</script>

<template>
    <AppLayout>
        <div class="flex flex-col gap-2">
            <div class="flex flex-row">
                <h2
                    class="font-hurricanes-header w-3/4 text-3xl"
                    v-text="post.title"
                />
                <div class="ml-auto flex flex-col gap-2 text-end">
                    <aside>
                        First posted
                        <time
                            :datetime="postedAt.toISOString()"
                            v-text="postedAt.toLocaleDateString()"
                        />
                    </aside>
                    <aside v-if="showUpdatedAt">
                        Last updated
                        <time
                            :datetime="updatedAt.toISOString()"
                            v-text="updatedAt.toLocaleDateString()"
                        />
                    </aside>
                </div>
            </div>
            <MarkdownRenderer :markdown="post.content" />
        </div>
    </AppLayout>
</template>

<style scoped></style>
