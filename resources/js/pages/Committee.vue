<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import {CommitteeMember} from "@/types";

defineProps<{
    committee_members: CommitteeMember[];
}>();
</script>

<template>
    <AppLayout>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2">
            <div v-for="member in committee_members" :key="`${member.sort_order}-${member.id}`"
                 class="flex flex-col items-stretch gap-2"
            >
                <img src="../../images/club_logo.jpg"  alt="test" class="aspect-square rounded-sm" />
                <h4 class="text-xl font-hurricanes-header" v-text="member.role" />
                <div>
                    <span class="text-lg font-hurricanes-body" v-text="member.name" />
                    <span class="text-sm mb-auto" v-if="member.pronouns" v-text="` - ${member.pronouns}`" />
                </div>
                <p v-text="member.description" />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
