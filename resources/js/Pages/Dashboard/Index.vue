<template>
  <!-- From Laravel Routes fn {{ locations }} -->
  <Map :locations="locations" />
</template>

<script>
import Nav from "../../Shared/Nav.vue";
import Map from "./components/Map.vue";

export default {
  layout: Nav,
  props: {
    locations: Object,
  },
  components: {
    Map,
  },
};
</script>

<style scoped>
#map {
  height: 750px;
  background-color: bisque;
}
</style>
