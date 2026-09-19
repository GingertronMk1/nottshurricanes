<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { trainingSessions as touchTraining } from '@/routes/touch-rugby';
import { trainingSessions as unionTraining } from '@/routes/rugby-union';
import { aboutUs, committee, externalLinks, home } from '@/routes';
import { ref } from 'vue';
import { index } from '@/routes/blog';
import { HeaderItem, RugbyType } from '@/types';
import { index as fixturesIndex } from '@/routes/fixtures';
import DesktopHeaderLinks from '@/components/Header/DesktopHeaderLinks.vue';
import MobileHeaderLinks from '@/components/Header/MobileHeaderLinks.vue';

const links = ref<HeaderItem[]>([
    {
        title: 'Blog',
        path: index(),
    },
    {
        title: 'Touch Rugby',
        links: [
            {
                title: 'Training Sessions',
                path: touchTraining(),
            },
            {
                title: 'Fixtures',
                path: fixturesIndex({ rugbyType: RugbyType.TOUCH.toString() }),
            },
        ],
    },
    {
        title: 'Rugby Union',
        links: [
            {
                title: 'Training Sessions',
                path: unionTraining(),
            },
            {
                title: 'Fixtures',
                path: fixturesIndex({ rugbyType: RugbyType.UNION.toString() }),
            },
        ],
    },
    {
        title: 'About Us',
        links: [
            {
                title: 'About Us',
                path: aboutUs(),
            },
            {
                title: 'Our Committee',
                path: committee(),
            },
            {
                title: 'External Links',
                path: externalLinks(),
            },
        ],
    },
]);
</script>

<template>
    <header
        class="font-hurricanes-header relative flex flex-row justify-center py-2"
    >
        <div
            class="container flex flex-row items-stretch justify-between gap-4 px-2"
        >
            <Link
                :href="home()"
                class="hover:text-hurricanes-purple py-2 text-4xl"
                >Nottinghamshire Hurricanes
            </Link>
            <div class="flex flex-row items-stretch justify-between">
                <DesktopHeaderLinks :links="links" />
                <MobileHeaderLinks :links="links" />
            </div>
        </div>
    </header>
</template>
