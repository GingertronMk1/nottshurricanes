<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { trainingSessions as touchTraining } from '@/routes/touch-rugby';
import { trainingSessions as unionTraining } from '@/routes/rugby-union';
import { aboutUs, committee, externalLinks, home } from '@/routes';
import HeaderDropdown from './Header/HeaderDropdown.vue';
import { ref } from 'vue';
import { index } from '@/routes/blog';
import { HeaderItem, HeaderItemLink, RugbyType } from '@/types';
import { index as fixturesIndex } from '@/routes/fixtures';
import DesktopHeaderLinks from '@/components/Header/DesktopHeaderLinks.vue';

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
            {
                title: 'Blog',
                path: index(),
            },
        ],
    },
]);
</script>

<template>
    <header class="font-hurricanes-header flex flex-row justify-center py-2">
        <div class="container flex flex-row items-stretch justify-between px-2">
            <Link
                :href="home()"
                class="hover:text-hurricanes-purple py-2 text-4xl"
                >Nottinghamshire Hurricanes
            </Link>
            <DesktopHeaderLinks :links="links" />
        </div>
    </header>
</template>
