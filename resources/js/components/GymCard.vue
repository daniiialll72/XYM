<template>
    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-4">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="{{info.src}}" alt="{{info.alt}}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{info.title}}</div>
                <p class="text-gray-700 text-base">
                    {{ info.description }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "gym-card",
        data() {
            return {
                info: {
                    src: null,
                    alt: null,
                    title: null,
                    description: null,
                }
            };
        },
    }
</script>

<style scoped>

</style>
