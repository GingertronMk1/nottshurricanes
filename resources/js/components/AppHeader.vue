<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { trainingSessions as touchTraining } from '@/routes/touch-rugby';
import { trainingSessions as unionTraining } from '@/routes/rugby-union';
import { aboutUs, committee, externalLinks, home } from '@/routes';
import HeaderDropdown from './Header/HeaderDropdown.vue';
import { ref } from 'vue';
import { index } from '@/routes/blog';
import type { HeaderItem, HeaderItemFolder, HeaderItemLink } from '@/types';
import HeaderLink from '@/components/Header/HeaderLink.vue';
import HeaderFolder from '@/components/Header/HeaderFolder.vue';
import { index as unionFixturesIndex } from '@/routes/rugby-union/fixtures';
import { index as touchFixturesIndex } from '@/routes/touch-rugby/fixtures';

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
                path: touchFixturesIndex(),
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
                path: unionFixturesIndex(),
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

const asLinkPath = (link: HeaderItem) => (link as HeaderItemLink).path;
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
                <template v-for="section in links" :key="section.title">
                    <template v-if="asLinkPath(section) !== undefined">
                        <HeaderLink :link="section as HeaderItemLink" />
                    </template>
                    <HeaderDropdown v-else>
                        <template #trigger>
                            <span
                                class="cursor-pointer"
                                v-text="section.title"
                            />
                        </template>
                        <template #content>
                            <template
                                v-if="
                                    (section as HeaderItemFolder).links !==
                                    undefined
                                "
                            >
                                <template
                                    v-for="link in (section as HeaderItemFolder)
                                        .links"
                                    :key="`${section.title}-${link.title}`"
                                >
                                    <HeaderLink
                                        v-if="
                                            (link as HeaderItemLink).path !==
                                            undefined
                                        "
                                        :link="link as HeaderItemLink"
                                    />
                                    <HeaderFolder
                                        v-else
                                        :folder="link as HeaderItemFolder"
                                    />
                                </template>
                            </template>
                        </template>
                    </HeaderDropdown>
                </template>
            </div>
        </div>
    </header>
</template>
