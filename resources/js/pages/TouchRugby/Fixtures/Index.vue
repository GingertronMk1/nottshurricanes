<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Fixture, Paginated } from '@/types';

defineProps<{
    fixtures: Paginated<Fixture>;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Index" />
    </AppLayout>
</template>
