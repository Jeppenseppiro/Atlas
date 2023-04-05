<template>
  <h1 class="text-3xl font-bold underline">Hello world!</h1>
  <div>{{ personnel }}</div>
</template>

<script setup>
import { ref } from "vue";

// Props
const props = defineProps({
  personnel: String,
});

// Data Attributes
const incidents = ref([
  {
    name: "Smelter",
    description: "Furnace 1 overheating",
  },
  {
    name: "Acid Plant",
    description: "Acid Plant repairs",
  },
]);
</script>
