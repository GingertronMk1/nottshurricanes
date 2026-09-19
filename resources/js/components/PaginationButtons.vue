<script setup lang="ts">
import { Paginated } from '@/types';
import { Link } from '@inertiajs/vue3';

defineProps<{
    pagination: Paginated<any>;
}>();
</script>

<template>
    <div class="mt-8 flex flex-row gap-2">
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
                class="font-hurricanes-header flex flex-col items-center justify-center p-1 md:p-2 text-md md:text-2xl"
            >
                <span class="whitespace-nowrap" v-html="link.label" />
            </Link>
        </template>
    </div>
</template>

<style scoped></style>
