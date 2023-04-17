<template>
  <div class="overflow-x-auto">
    <table class="table table-compact w-full">
      <thead>
        <tr>
          <th>Address</th>
          <th>Latitude</th>
          <th>Longitude</th>
          <th>
            <label for="addLocation-modal" class="btn btn-xs btn-success"
              ><i class="fa fa-plus"></i
            ></label>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          class="hover"
          v-for="(location, locationId) in locations"
          :key="locationId"
        >
          <th>{{ location.address }}</th>
          <td>{{ location.latitude }}</td>
          <td>{{ location.longitude }}</td>
          <th>
            <button
              class="btn btn-xs btn-outline btn-warning"
              title="Edit"
              @click="editLocation(locationId)"
            >
              <i class="fa fa-edit"></i>
            </button>
            <button class="btn btn-xs btn-outline btn-error" title="Delete">
              <i class="fa fa-trash"></i>
            </button>
          </th>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Address</th>
          <th>Latitude</th>
          <th>Longitude</th>
          <th>
            <label for="addLocation-modal" class="btn btn-xs btn-success"
              ><i class="fa fa-plus"></i
            ></label>
            Action
          </th>
        </tr>
      </tfoot>
    </table>
  </div>

  <!-- Insert Modal -->
  <input type="checkbox" id="addLocation-modal" class="modal-toggle" />
  <div class="modal">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Congratulations random Internet user!</h3>
      <p class="py-4">
        You've been selected for a chance to get one year of subscription to use
        Wikipedia for free!
      </p>
      <div class="modal-action">
        <label for="addLocation-modal" class="btn">Yay!</label>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const props = defineProps({ locations: Object });

const locations = ref(props.locations);

window.Echo.channel("location").listen("SendLocation", (newLocations) => {
  // Do something with the event
  for (let location in newLocations.location) {
    locations.value.unshift({
      address: newLocations.location[location].address,
      created_at: "",
      id: "",
      latitude: newLocations.location[location].latitude,
      longitude: newLocations.location[location].longitude,
      updated_at: "",
    });
  }
  console.log(newLocations.location);
});

function editLocation(locationId) {
  console.log(locationId);
}
</script>
