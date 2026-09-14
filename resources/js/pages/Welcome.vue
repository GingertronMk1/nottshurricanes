<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from "@/layouts/AppLayout.vue";
import LeftAndRight from '@/components/LeftAndRight.vue';
</script>

<template>
    <Head title="Welcome" />
    <AppLayout>
        <LeftAndRight>
            <div>
                <div class="flex flex-col">
                    <h1 class="text-3xl font-hurricanes-header">Who are we?</h1>
                    <p>
                        We are the Nottinghamshire Hurricanes, Nottingham's first and only LGBTQ+ inclusive rugby club.
                        We compete in the IGR North league in touch rugby, as well as training for rugby union.
                    </p>
                    <p>
                        We welcome players of all abilities, genders, and sexualities for both touch and contact rugby.
                        So long as you're over 18, the risk assessments are a bugger otherwise.
                    </p>
                </div>
                <img src="../../images/ro_in_manchester.jpg" alt="Ro in Manchester" />
            </div>
            <div>
                <img src="../../images/bas_looking_stern.jpg" alt="Bas looking stern" />
                <div class="flex-col">
                    <h1 class="text-3xl font-hurricanes-header">
                        We serve face
                    </h1>
                </div>
            </div>
        </LeftAndRight>
    </AppLayout>
</template>
