<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
import {trainingSessions as touchTraining } from "@/routes/touch-rugby";
import {trainingSessions as unionTraining } from "@/routes/rugby-union";
import {aboutUs, home } from "@/routes";
</script>

<template>
    <header class="flex flex-row justify-center py-2 font-hurricanes-header">
        <div class="container px-2 flex flex-row justify-between items-stretch ">
            <Link :href="home()" class="text-4xl py-2 hover:text-hurricanes-purple">Nottinghamshire Hurricanes</Link>
            <div class="flex flex-row items-center gap-x-2 *:p-2 *:rounded-sm *:hover:bg-gray-100 *:hover:text-hurricanes-purple">
                <Link :href="touchTraining()">Touch Rugby</Link>
                <Link :href="unionTraining()">Rugby Union</Link>
                <Link :href="aboutUs()">About Us</Link>
            </div>
        </div>
    </header>
</template>
