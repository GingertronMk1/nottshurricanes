<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Fixture, Paginated, RugbyType } from '@/types';
import { show } from '@/routes/fixtures';
import PaginationButtons from '@/components/PaginationButtons.vue';

defineProps<{
    fixtures: Paginated<Fixture>;
    type: RugbyType;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Index" />
        <h2
            v-text="`${type.charAt(0).toUpperCase() + type.slice(1)} fixtures`"
            class="font-hurricanes-header mb-4 text-3xl"
        />
        <div class="flex flex-col gap-2">
            <Link
                :href="show({ rugbyType: type, fixture: fixture.id })"
                v-for="fixture in fixtures.data"
                class="group flex flex-row items-center gap-2"
            >
                <h4
                    class="font-hurricanes-header group-hover:text-hurricanes-purple flex-1 text-2xl"
                    v-text="`vs. ${fixture.opposition}`"
                />
                <time
                    :datetime="fixture.start"
                    v-text="new Date(fixture.start).toLocaleString()"
                />
            </Link>
        </div>
        <PaginationButtons :pagination="fixtures" />
    </AppLayout>
</template>
