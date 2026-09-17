<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Fixture, RugbyType } from '@/types';

defineProps<{
    fixture: Fixture;
    type: RugbyType;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Show" />
        <h2 class="text-4xl" v-text="`vs ${fixture.opposition}`" />
        <p>
            {{ type === RugbyType.TOUCH ? 'Tapping' : 'Kicking' }} off at
            {{ new Date(fixture.start).toLocaleString() }}
        </p>
        <p>
            {{ fixture.has_happened ? 'Has happened' : 'Has not happened' }}
        </p>
    </AppLayout>
</template>
