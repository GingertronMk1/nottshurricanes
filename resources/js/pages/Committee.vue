<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { CommitteeMember } from '@/types';

defineProps<{
    committee_members: CommitteeMember[];
}>();
</script>

<template>
    <AppLayout>
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-4">
            <div
                v-for="member in committee_members"
                :key="`${member.sort_order}-${member.id}`"
                class="flex flex-col items-stretch gap-2"
            >
                <img
                    :src="member.profile_picture_url"
                    alt="test"
                    class="aspect-square rounded-sm object-cover"
                />
                <h4 v-text="member.role" />
                <div>
                    <span
                        class="font-hurricanes-body text-lg"
                        v-text="member.name"
                    />
                    <span
                        class="mb-auto text-sm"
                        v-if="member.pronouns"
                        v-text="` - ${member.pronouns}`"
                    />
                </div>
                <p v-text="member.description" />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
