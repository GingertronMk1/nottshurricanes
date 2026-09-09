<script setup lang="ts">

import {Link} from "@inertiajs/vue3";
import {trainingSessions as touchTraining } from "@/routes/touch-rugby";
import {trainingSessions as unionTraining } from "@/routes/rugby-union";
import {aboutUs, home } from "@/routes";
</script>

<template>
    <header class="flex flex-row justify-center py-2">
        <div class="container px-2 flex flex-row justify-between items-stretch ">
            <Link :href="home()" class="text-2xl">Nottinghamshire Hurricanes</Link>
            <div class="flex flex-row items-center gap-x-2 *:p-2 *:rounded-sm">
                <Link class="hover:bg-gray-100" :href="touchTraining()">Touch Rugby</Link>
                <Link class="hover:bg-gray-100" :href="unionTraining()">Rugby Union</Link>
                <Link class="hover:bg-gray-100" :href="aboutUs()">About Us</Link>
            </div>
        </div>
    </header>
</template>

<style scoped>

</style>
