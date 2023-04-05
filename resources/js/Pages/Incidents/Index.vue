<script>
import Nav from "../../Shared/Nav.vue";

export default {
  layout: Nav,
};
</script>

<script setup>
import { ref } from "vue";

// Props
const props = defineProps({ personnel: String });

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

const incidentName = ref([]);
const incidentDescription = ref([]);

// Methods
const createIncidents = () => {
  incidents.value.push({
    name: incidentName.value,
    description: incidentDescription.value,
  });
};
</script>

<template>
  <!-- From Laravel Routes fn {{ personnel }} -->
  <div>
    <input
      type="text"
      placeholder="Type here"
      class="input input-bordered input-accent w-full max-w-xs"
      v-model="incidentName"
    />
    <input
      type="text"
      placeholder="Type here"
      class="input input-bordered input-accent w-full max-w-xs"
      v-model="incidentDescription"
    /><br />

    <button class="btn btn-outline btn-secondary" @click="createIncidents">
      Push
    </button>
  </div>

  <div class="overflow-x-auto">
    <table class="table table-compact w-full">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(incident, incidentId) in incidents" :key="incidentId">
          <th>{{ incidentId }}</th>
          <td>{{ incident.name }}</td>
          <td>{{ incident.description }}</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Description</th>
        </tr>
      </tfoot>
    </table>
  </div>
</template>
