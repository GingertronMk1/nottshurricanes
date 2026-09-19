<script setup lang="ts">
import { HeaderItemFolder, HeaderItemLink } from '@/types';
import HeaderFolder from '@/components/Header/components/desktop/HeaderFolder.vue';
import HeaderLink from '@/components/Header/components/desktop/HeaderLink.vue';
import { ref } from 'vue';

defineProps<{
    folder: HeaderItemFolder;
}>();

const open = ref(false);
</script>

<template>
    <div class="relative" @click="open = !open">
        <span class="flex cursor-pointer items-center px-2">
            <span v-text="folder.title" />
            <span
                class="material-icons"
                v-text="open ? 'keyboard_arrow_down' : 'keyboard_arrow_right'"
            />
        </span>
        <div
            class="mx-auto w-[95%] flex-col items-stretch gap-y-2 border border-gray-300 bg-white p-2 text-center shadow-lg"
            :class="open ? 'flex' : 'hidden'"
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
