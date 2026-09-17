<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
import type {HeaderItem, HeaderItemLink} from "@/types";
import {RouteDefinition} from "@/wayfinder";

defineProps<{
    link: HeaderItemLink
}>();
</script>

<template>
    <Link
        v-if="(link.path as RouteDefinition<'get'>) .method !== undefined"
        class="hover:text-hurricanes-purple hover:bg-gray-100"
        :href="link.path"
    >
        {{ link.title }}
    </Link>
    <a
        v-else
        class="hover:text-hurricanes-purple hover:bg-gray-100"
        :href="link.path as string"
        target="_blank"
        v-text="link.title"
    />
</template>
