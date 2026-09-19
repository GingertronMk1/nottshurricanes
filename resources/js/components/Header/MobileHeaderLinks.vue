<script setup lang="ts">
import { HeaderItem, HeaderItemFolder, HeaderItemLink } from '@/types';
import { ref } from 'vue';
import HeaderLink from '@/components/Header/components/mobile/HeaderLink.vue';
import HeaderFolder from '@/components/Header/components/mobile/HeaderFolder.vue';

defineProps<{
    links: HeaderItem[];
}>();

const open = ref(false);
</script>

<template>
    <div class="flex md:hidden">
        <div class="flex flex-col justify-center">
            <div class="material-icons" @click="open = !open">
                {{ open ? 'close' : 'menu' }}
            </div>
        </div>
        <div
            class="absolute top-full right-0 left-0 flex-col items-stretch justify-center gap-2 bg-white py-2"
            :class="open ? 'flex' : 'hidden'"
        >
            <template v-for="link in links" :key="JSON.stringify(link)">
                <HeaderLink
                    :link="link as HeaderItemLink"
                    v-if="(link as HeaderItemLink).path !== undefined"
                />
                <HeaderFolder v-else :folder="link as HeaderItemFolder" />
            </template>
        </div>
    </div>
</template>

<style scoped></style>
