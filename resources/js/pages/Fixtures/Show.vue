<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Fixture, RugbyType } from '@/types';
import MarkdownRenderer from '@/components/MarkdownRenderer.vue';

defineProps<{
    fixture: Fixture;
    type: RugbyType;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Show" />
        <div class="flex flex-col gap-2">
            <h2 class="text-4xl" v-text="`vs ${fixture.opposition}`" />
            <p>
                {{ type === RugbyType.TOUCH ? 'Tapping' : 'Kicking' }} off at
                {{ new Date(fixture.start).toLocaleString() }}
            </p>
            <template v-if="fixture.has_happened">
                <h3>Final Score</h3>
                <p class="flex flex-row justify-between">
                    <span>Hurricanes {{ fixture.hurricanes_score }}</span>
                    <span
                        >{{ fixture.opposition }}
                        {{ fixture.opposition_score }}</span
                    >
                </p>
                <MarkdownRenderer :markdown="fixture.report" />
            </template>
        </div>
    </AppLayout>
</template>
