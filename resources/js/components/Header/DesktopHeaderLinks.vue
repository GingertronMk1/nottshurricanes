<script setup lang="ts">
import {
    asLinkPath,
    HeaderItem,
    HeaderItemFolder,
    HeaderItemLink,
} from '@/types';
import HeaderDropdown from '@/components/Header/HeaderDropdown.vue';
import HeaderLink from '@/components/Header/HeaderLink.vue';
import HeaderFolder from '@/components/Header/HeaderFolder.vue';

defineProps<{
    links: HeaderItem[];
}>();
</script>

<template>
    <div class="flex flex-row items-center gap-x-2 *:rounded-sm *:p-2">
        <template v-for="section in links" :key="section.title">
            <template v-if="asLinkPath(section) !== undefined">
                <HeaderLink :link="section as HeaderItemLink" />
            </template>
            <HeaderDropdown v-else>
                <template #trigger>
                    <span class="cursor-pointer" v-text="section.title" />
                </template>
                <template #content>
                    <template
                        v-if="(section as HeaderItemFolder).links !== undefined"
                    >
                        <template
                            v-for="link in (section as HeaderItemFolder).links"
                            :key="`${section.title}-${link.title}`"
                        >
                            <HeaderLink
                                v-if="
                                    (link as HeaderItemLink).path !== undefined
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
</template>

<style scoped></style>
