<script setup lang="ts">

import {marked} from "marked";
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps<{
    markdown?: string
}>();

const page = usePage();

const markdown = computed<string|null>(() => props.markdown ?? page.props.page_content.content ?? null);

const parsedMarkdown = computed(() => markdown.value ? marked.parse(markdown.value) : null);
</script>

<template>
    <section v-if="markdown" v-html="parsedMarkdown" />
</template>

<style scoped>

</style>
