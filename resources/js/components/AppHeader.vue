<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { trainingSessions as touchTraining } from '@/routes/touch-rugby';
import { trainingSessions as unionTraining } from '@/routes/rugby-union';
import {aboutUs, committee, home} from '@/routes';
import HeaderDropdown from './HeaderDropdown.vue';
</script>

<template>
    <header class="font-hurricanes-header flex flex-row justify-center py-2">
        <div class="container flex flex-row items-stretch justify-between px-2">
            <Link
                :href="home()"
                class="hover:text-hurricanes-purple py-2 text-4xl"
                >Nottinghamshire Hurricanes</Link
            >
            <div class="flex flex-row items-center gap-x-2 *:rounded-sm *:p-2">
                <HeaderDropdown>
                    <template #trigger>
                        <span class="cursor-pointer">Touch Rugby</span>
                    </template>
                    <template #content>
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="touchTraining()"
                            >Training Sessions</Link
                        >
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="touchTraining()"
                            >Fixtures</Link
                        >
                    </template>
                </HeaderDropdown>
                <HeaderDropdown>
                    <template #trigger>
                        <span class="cursor-pointer">Rugby Union</span>
                    </template>
                    <template #content>
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="unionTraining()"
                            >Training Sessions</Link
                        >
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="unionTraining()"
                            >Fixtures</Link
                        >
                    </template>
                </HeaderDropdown>
                <HeaderDropdown>
                    <template #trigger>
                        <span class="cursor-pointer">About Us</span>
                    </template>
                    <template #content>
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="aboutUs()"
                        >About Us</Link
                        >
                        <Link
                            class="hover:text-hurricanes-purple hover:bg-gray-100"
                            :href="committee()"
                            >Our Committee</Link
                        >
                    </template>
                </HeaderDropdown>
            </div>
        </div>
    </header>
</template>
