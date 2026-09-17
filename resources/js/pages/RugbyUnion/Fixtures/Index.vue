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
        <section v-for="fixture in fixtures.data">
            <h4 v-text="fixture.opposition" />
        </section>
    </AppLayout>
</template>
