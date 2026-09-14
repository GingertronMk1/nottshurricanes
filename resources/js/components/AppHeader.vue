<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
import {trainingSessions as touchTraining } from "@/routes/touch-rugby";
import {trainingSessions as unionTraining } from "@/routes/rugby-union";
import {aboutUs, home } from "@/routes";
import HeaderDropdown from "./HeaderDropdown.vue";
</script>

<template>
    <header class="flex flex-row justify-center py-2 font-hurricanes-header">
        <div class="container px-2 flex flex-row justify-between items-stretch ">
            <Link :href="home()" class="text-4xl py-2 hover:text-hurricanes-purple">Nottinghamshire Hurricanes</Link>
            <div class="flex flex-row items-center gap-x-2 *:p-2 *:rounded-sm">
                <HeaderDropdown>
                    <template #trigger>
                        <span class="cursor-pointer">Touch Rugby</span>
                    </template>
                    <template #content>
                        <Link class="hover:bg-gray-100 hover:text-hurricanes-purple" :href="touchTraining()">Training Sessions</Link>
                        <Link class="hover:bg-gray-100 hover:text-hurricanes-purple" :href="touchTraining()">Fixtures</Link>
                    </template>
                </HeaderDropdown>
                <HeaderDropdown>
                    <template #trigger>
                        <span class="cursor-pointer">Rugby Union</span>
                    </template>
                    <template #content>
                        <Link class="hover:bg-gray-100 hover:text-hurricanes-purple" :href="unionTraining()">Training Sessions</Link>
                        <Link class="hover:bg-gray-100 hover:text-hurricanes-purple" :href="unionTraining()">Fixtures</Link>
                    </template>
                </HeaderDropdown>
                <Link class="hover:bg-gray-100 hover:text-hurricanes-purple" :href="aboutUs()">About Us</Link>
            </div>
        </div>
    </header>
</template>
