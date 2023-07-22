<template>
    <VOnboardingWrapper ref="wrapper" :steps="steps" />
    <!-- <div></div> -->
</template>

<script setup>
    import { ref, onMounted } from 'vue'
    import { VOnboardingWrapper, useVOnboarding } from 'v-onboarding'
    import 'v-onboarding/dist/style.css'

    const steps = ref()
    const wrapper = ref(null)
    const { start, goToStep, finish } = useVOnboarding(wrapper)

    onMounted(async () => {
        const { data } = await Nova.request().get('/nova-vendor/onboarding/steps')
        steps.value = (data || []).map((step) => ({
            attachTo: { element: step.selector },
            content: {
                title: step.title,
                description: step.description,
            }
        }))

        setTimeout(() => {
            start()
        }, 100);
    })
</script>
