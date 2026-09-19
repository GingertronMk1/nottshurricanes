<script setup lang="ts">
import { Paginated } from '@/types';
import { Link } from '@inertiajs/vue3';

defineProps<{
    pagination: Paginated<any>;
}>();
</script>

<template>
    <div class="mt-8 flex flex-row items-stretch gap-2">
        <template v-for="link in pagination.links" :key="link.url">
            <Link
                :href="link.url ?? '#'"
                :class="{
                    'hover:text-hurricanes-purple bg-white text-black':
                        link.url !== null,
                    'cursor-not-allowed bg-gray-500 text-gray-800':
                        link.url === null,
                    'bg-hurricanes-purple!': link.active,
                }"
                class="font-hurricanes-header text-md flex flex-col items-center justify-center px-2 py-1 md:px-4 md:py-2 md:text-2xl"
            >
                <span class="whitespace-nowrap" v-html="link.label" />
            </Link>
        </template>
    </div>
</template>

<style scoped></style>
