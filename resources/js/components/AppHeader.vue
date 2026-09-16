<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { trainingSessions as touchTraining } from '@/routes/touch-rugby';
import { trainingSessions as unionTraining } from '@/routes/rugby-union';
import { aboutUs, committee, externalLinks, home } from '@/routes';
import HeaderDropdown from './HeaderDropdown.vue';
import { ref } from 'vue';
import { RouteDefinition } from '@/wayfinder';

type LinkPath = string | RouteDefinition<'get'>;

const links = ref<
    {
        title: string;
        links: { title: string; path: LinkPath }[];
    }[]
>([
    {
        title: 'Touch Rugby',
        links: [
            {
                title: 'Training Sessions',
                path: touchTraining(),
            },
            {
                title: 'Fixtures',
                path: touchTraining(),
            },
            {
                title: 'Hull KR',
                path: 'https://hullkr.co.uk/',
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
                path: unionTraining(),
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
    <header class="font-hurricanes-header flex flex-row justify-center py-2">
        <div class="container flex flex-row items-stretch justify-between px-2">
            <Link
                :href="home()"
                class="hover:text-hurricanes-purple py-2 text-4xl"
                >Nottinghamshire Hurricanes
            </Link>
            <div class="flex flex-row items-center gap-x-2 *:rounded-sm *:p-2">
                <HeaderDropdown v-for="section in links" :key="section.title">
                    <template #trigger>
                        <span class="cursor-pointer" v-text="section.title" />
                    </template>
                    <template #content>
                        <template
                            v-for="link in section.links"
                            :key="`${section.title}-${link.title}`"
                        >
                            <Link
                                v-if="
                                    (link.path as RouteDefinition<'get'>)
                                        .method !== undefined
                                "
                                class="hover:text-hurricanes-purple hover:bg-gray-100"
                                :href="link.path"
                            >
                                {{ link.title }}
                            </Link>
                            <a
                                v-else
                                class="hover:text-hurricanes-purple hover:bg-gray-100"
                                :href="link.path as string"
                                target="_blank"
                                v-text="link.title"
                            />
                        </template>
                    </template>
                </HeaderDropdown>
            </div>
        </div>
    </header>
</template>
