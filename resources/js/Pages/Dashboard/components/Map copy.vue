<template>
  <label class="btn btn-sm" @click="newSetMap">New Marker</label>
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12">
      <div class="h-full z-0" id="map"></div>
    </div>
    <div class="col-span-3"></div>
  </div>
</template>

<script setup>
import { onMounted, ref, computed, watch } from "vue";

const props = defineProps({ locations: Object });
let map;
let baseMaps;
let bounds = L.latLngBounds();
let locationMarkers;
let overlayMaps;
const markers = ref([]);

onMounted(() => {
  // Google Satellite tilelayer
  let GoogleSatellite = L.tileLayer(
    "http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
    {
      maxZoom: 20,
      subdomains: ["mt0", "mt1", "mt2", "mt3"],
    }
  );

  // Map Layer Control
  baseMaps = {
    "Google Satellite": GoogleSatellite,
  };

  for (let location in props.locations) {
    let lat_lng = [
      props.locations[location].latitude,
      props.locations[location].longitude,
    ];

    let marker = L.marker(
      [props.locations[location].latitude, props.locations[location].longitude],
      { title: props.locations[location].address }
    ).bindTooltip(`${props.locations[location].address}`, {
      //   permanent: true,
      interactive: true,
    });

    markers.value.push(marker);
    bounds.extend(lat_lng);
  }

  locationMarkers = L.layerGroup(markers.value);
  overlayMaps = {
    Locations: locationMarkers,
  };

  // Map class initialization
  map = L.map("map", {
    layers: [GoogleSatellite, locationMarkers],
    zoomControl: true,
    fullscreenControl: true,
    fullscreenControlOptions: {
      position: "topright",
    },
  });

  map.fitBounds(bounds);
  L.control.layers(baseMaps, overlayMaps).addTo(map);
});

function newSetMap() {
  let marker = L.marker([11.0409, 124.6035], { title: "Ormoc" }).bindTooltip(
    "Ormoc",
    {
      //   permanent: true,
      interactive: true,
    }
  );

  markers.value.push(marker);

  console.log(markers.value, locationMarkers);
}

window.Echo.channel("location").listen("SendLocation", (newLocations) => {
  for (let location in newLocations.location) {
    let newMarker = L.marker(
      [
        newLocations.location[location].latitude,
        newLocations.location[location].longitude,
      ],
      { title: newLocations.location[location].address }
    ).bindTooltip(`${newLocations.location[location].address}`, {
      //   permanent: true,
      interactive: true,
    });

    markers.value.push(newMarker);
  }
  //   locationMarkers.value = L.layerGroup(markers.value);
  console.log(markers.value, locationMarkers.value);
});
</script>

<style scoped>
#map {
  height: 750px;
  background-color: bisque;
}
</style>
