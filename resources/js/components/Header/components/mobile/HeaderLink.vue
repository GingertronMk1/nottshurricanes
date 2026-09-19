<script setup lang="ts">
import { RouteDefinition } from '@/wayfinder';
import { Link } from '@inertiajs/vue3';
import { HeaderItemLink } from '@/types';

defineProps<{
    link: HeaderItemLink;
}>();
</script>

<template>
    <Link
        v-if="(link.path as RouteDefinition<'get'>).method !== undefined"
        class="hover:text-hurricanes-purple px-2 hover:bg-gray-100"
        :href="link.path"
    >
        {{ link.title }}
    </Link>
    <a
        v-else
        class="hover:text-hurricanes-purple px-2 hover:bg-gray-100"
        :href="link.path as string"
        target="_blank"
        v-text="link.title"
    />
</template>

<style scoped></style>
