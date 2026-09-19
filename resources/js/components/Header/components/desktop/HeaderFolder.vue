<script setup lang="ts">
import { HeaderItemFolder, HeaderItemLink } from '@/types';
import { ref } from 'vue';
import HeaderLink from '@/components/Header/components/desktop/HeaderLink.vue';

defineProps<{
    folder: HeaderItemFolder;
}>();

const isOpen = ref(false);
const open = () => (isOpen.value = true);
const close = () => (isOpen.value = false);
</script>

<template>
    <div class="relative" @mouseenter="open()" @mouseleave="close()">
        <span class="cursor-pointer" v-text="`${folder.title} >`" />
        <div
            class="absolute top-0 right-full z-50 -mt-2 -mr-2 min-w-36 flex-col items-stretch gap-y-2 rounded-md border border-gray-300 bg-white p-2 text-center shadow-lg"
            :class="isOpen ? 'flex' : 'hidden'"
        >
            <template v-for="item in folder.links" :key="JSON.stringify(item)">
                <HeaderFolder
                    v-if="(item as HeaderItemFolder).links !== undefined"
                    :folder="item as HeaderItemFolder"
                />
                <HeaderLink v-else :link="item as HeaderItemLink" />
            </template>
        </div>
    </div>
</template>

<style scoped></style>
