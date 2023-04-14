<template>
  <div class="overflow-x-auto relative shadow-lg -z-2">
    <form
      @submit.prevent="formLocations.post(route('location.store'))"
      enctype="multipart/form-data"
      autocomplete="off"
    >
      <table class="table table-compact w-full text-center">
        <!-- head -->
        <thead>
          <tr>
            <th></th>
            <th width="50%">Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th width="5%">
              <label class="btn btn-info" @click="addRowLocations">
                <i class="fa fa-plus text-xl"></i>
              </label>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr
            class="hover"
            v-for="(rowLocation, rowLocationId) in rowLocations"
            :key="rowLocationId"
          >
            <th>{{ (rowNumber = rowLocationId + 1) }}</th>
            <td>
              <textarea
                required
                class="textarea textarea-bordered w-full -mb-1"
                placeholder="Address"
                rows="1"
                v-model="rowLocations[rowLocationId].location_address"
              ></textarea>
              <label class="label">
                <span class="label-text-alt text-red-500"
                  >Bottom Left label</span
                >
              </label>
            </td>
            <td>
              <input
                required
                type="text"
                placeholder="Latitude"
                class="input input-bordered w-full max-w-xs"
                v-model="rowLocations[rowLocationId].location_latitude"
              />
              <label class="label">
                <span class="label-text-alt text-red-500"
                  >Bottom Left label</span
                >
              </label>
            </td>
            <td>
              <input
                required
                type="text"
                placeholder="Longitude"
                class="input input-bordered w-full max-w-xs"
                v-model="rowLocations[rowLocationId].location_longitude"
              />
              <label class="label">
                <span class="label-text-alt text-red-500"
                  >Bottom Left label</span
                >
              </label>
            </td>
            <td>
              <label
                class="btn btn-error"
                @click="removeRowLocations(rowLocationId)"
              >
                <i class="fa fa-trash text-xl"></i>
              </label>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="p-2 px-4 flex justify-center" v-if="rowLocations.length > 0">
        <button type="submit" class="btn btn-success w-full">Submit</button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import Nav from "../../Shared/Nav.vue";
import { useForm } from "@inertiajs/vue3";

export default {
  layout: Nav,
  setup() {
    const rowLocations = ref([
      {
        location_address: "",
        location_latitude: "",
        location_longitude: "",
      },
    ]);

    const formLocations = useForm({
      locations: rowLocations.value,
    });

    function addRowLocations() {
      rowLocations.value.push({
        location_address: "",
        location_latitude: "",
        location_longitude: "",
      });
    }

    function removeRowLocations(rowId) {
      rowLocations.value.splice(rowId, 1);
    }

    return { rowLocations, formLocations, addRowLocations, removeRowLocations };
  },
};
</script>
