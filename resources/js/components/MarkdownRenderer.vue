<script setup lang="ts">

import {marked} from "marked";
import {onMounted, ref} from "vue";

const props = defineProps<{
    markdown: string
}>();

const parsedMarkdown = ref<string>("");
onMounted(async function () {
    parsedMarkdown.value = await marked.parse(props.markdown);
})
</script>

<template>
    <section v-html="parsedMarkdown" />
</template>

<style scoped>

</style>
