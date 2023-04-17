<template>
  <LocationTable :locations="locations" />
</template>

<script>
import Nav from "../../Shared/Nav.vue";
import LocationTable from "./components/LocationTable.vue";

export default {
  layout: Nav,
  components: {
    LocationTable,
  },
  props: {
    locations: Object,
  },
};
</script>
