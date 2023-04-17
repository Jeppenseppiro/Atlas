<template>
  <div class="grid grid-cols-12 gap-4">
    <div class="col-span-12">
      <div class="h-full z-0" id="map"></div>
    </div>
    <div class="col-span-3"></div>
  </div>
</template>

<script setup>
import { onMounted, ref, computed, watch } from "vue";

const props = defineProps({
  locations: Object,
});

console.log(props.locations);

let map;
var pulsingIcon = L.icon.pulse({ iconSize: [20, 20], color: "red" });

let locationGroup = L.featureGroup();
let incidentGroup = L.featureGroup();
let overlayMaps = {
  Locations: locationGroup,
  Incidents: incidentGroup,
};

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

  // OpenStreetMap Mapnik
  let OpenStreetMap_Mapnik = L.tileLayer(
    "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
      maxZoom: 19,
      attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }
  );

  // Map Layer Control
  let baseMaps = {
    "Google Satellite": GoogleSatellite,
    OpenStreetMap: OpenStreetMap_Mapnik,
  };

  // Map class initialization
  map = L.map("map", {
    layers: [GoogleSatellite, locationGroup, incidentGroup],
    zoomControl: true,
    fullscreenControl: true,
    fullscreenControlOptions: {
      position: "topright",
    },
  }).setView([11.0409, 124.6035], 13);
  L.control.layers(baseMaps, overlayMaps).addTo(map);

  let mouseCoordinates = new L.Control.Coordinates({
    position: "bottomright",
  }).addTo(map);
  map.on("click", function (e) {
    mouseCoordinates.setCoordinates(e);
  });

  var greenIcon = new L.Icon({
    iconUrl:
      "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png",
    shadowUrl:
      "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
  });

  // Location Markers
  for (let location in props.locations) {
    // Markers
    let marker = L.marker(
      [props.locations[location].latitude, props.locations[location].longitude],
      {
        title: props.locations[location].address,
        alt: props.locations[location].id,
        // icon: greenIcon,
        // icon: L.BeautifyIcon.icon({
        //   icon: "building",
        //   borderColor: "black",
        //   textColor: "black",
        //   innerIconStyle: "font-size:11px;padding-top:1px;",
        // }),
      }
    )
      .on("click", function (e) {
        // e.target._popup.setContent(`
        //   <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
        //   <form method="POST" action="/incident/alert" target="dummyframe">
        //     <b>${e.target.options.title}</b><br>
        //     <input type='hidden' name='locationId' value='${e.target.options.alt}'>
        //     <input type='hidden' name='locationLat' value='${e.target._latlng.lat}'>
        //     <input type='hidden' name='locationLng' value='${e.target._latlng.lng}'>
        //     <button type='submit' name='_token' class='btn btn-xs btn-error'>Report Incident</button>
        //   </form>
        // `);
        e.target._popup.setContent(`
          <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
          <label for="my-modal" class="btn">open modal</label>

          <input type="checkbox" id="my-modal" class="modal-toggle" />
          <div class="modal">
            <div class="modal-box">
              <h3 class="font-bold text-lg">Congratulations random Internet user!</h3>
              <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
              <div class="modal-action">
                <label for="my-modal" class="btn">Yay!</label>
              </div>
            </div>
          </div>
        `);
      })
      .bindPopup(`${props.locations[location].id}`, {
        permanent: true,
        interactive: true,
      })
      .addTo(locationGroup);
    markers.value.push(marker);

    // Incident
    for (let incident in props.locations[location].incidents) {
      let incidentMarker = L.marker(
        [
          props.locations[location].latitude,
          props.locations[location].longitude,
        ],
        {
          alt: props.locations[location].incidents[incident].id,
          icon: pulsingIcon,
        }
      ).addTo(incidentGroup);
    }
  }

  map.addControl(
    new L.Control.Search({
      layer: locationGroup,
      position: "topright",
      initial: true,
      collapsed: true,
      marker: {
        icon: false,
        animate: true,
        circle: {
          weight: 5,
          radius: 20,
        },
      },
    })
  );
  map.fitBounds(locationGroup.getBounds().pad(0.1));

  console.log(markers.value, locationGroup._layers);
});

// New Map Coordinates watcher
window.Echo.channel("location").listen("SendLocation", (newLocations) => {
  for (let location in newLocations.location) {
    let newMarker = L.marker(
      [
        newLocations.location[location].latitude,
        newLocations.location[location].longitude,
      ],
      { title: newLocations.location[location].address }
    )
      .bindTooltip(`${newLocations.location[location].address}`, {
        //   permanent: true,
        interactive: true,
      })
      .addTo(locationGroup);

    markers.value.push(newMarker);
  }

  map.fitBounds(locationGroup.getBounds().pad(0.1));
});

// New Incident Alert Coordinates watcher
window.Echo.channel("alert").listen("SendAlert", (newAlert) => {
  //   function getLocationGroupId(code) {
  //     return markers.value.filter(function (data) {
  //       return data.options.alt == code;
  //     });
  //   }

  //   let optionAlt = getLocationGroupId(newAlert.alert[0].locationId);
  //   console.log(optionAlt[0]._leaflet_id);
  //   locationGroup.removeLayer(optionAlt[0]._leaflet_id);

  var marker = L.marker(
    [newAlert.alert[0].locationLat, newAlert.alert[0].locationLng],
    { icon: pulsingIcon }
  ).addTo(incidentGroup);

  console.log(newAlert);
});
</script>

<style scoped>
#map {
  height: 750px;
  background-color: bisque;
}

img.huechange {
  filter: hue-rotate(360deg);
}
</style>
