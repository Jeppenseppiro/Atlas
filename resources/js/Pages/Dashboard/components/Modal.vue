<template>
  <input type="checkbox" id="incident-modal" class="modal-toggle" />
  <div class="modal">
    <!-- <form
      class="text-center"
      @submit.prevent="formIncidents.post(route('incident.alert'))"
      enctype="multipart/form-data"
      autocomplete="off"
    >
      <div class="modal-box">
        <h3 class="font-bold text-lg">
          {{ modalData.locationAddress }}
        </h3>
        <p class="py-4">
          {{ modalData.locationId }}
          <textarea
            class="textarea textarea-primary w-full"
            placeholder="Description"
            v-model="incidentDetails.description"
            required
          ></textarea>
          <input
            type="text"
            class="w-full"
            v-model="incidentDetails.locationId"
          />

          You've been selected for a chance to get one year of subscription to
          use Wikipedia for free!
        </p>
        <div class="modal-action">
          <button for="incident-modal" type="submit" class="btn btn-success">
            Submit
          </button>
          <label for="incident-modal" class="btn glass">Close</label>
        </div>
      </div>
    </form> -->

    <iframe name="dummyframe" id="dummyframe" style="display: none"></iframe>
    <form
      class="text-center"
      method="POST"
      :action="route('incident.alert')"
      action="/incident/alert"
      target="dummyframe"
    >
      <div class="modal-box">
        <h3 class="font-bold text-lg">
          {{ modalData.locationAddress }}
        </h3>
        <p class="py-4">
          <textarea
            class="textarea textarea-primary w-full"
            placeholder="Description"
            name="description"
            required
          ></textarea>

          <input
            type="hidden"
            class="w-full"
            name="locationId"
            :value="modalData.locationId"
          />

          Please be descriptive of the incident
        </p>
        <div class="modal-action">
          <button for="incident-modal" type="submit" class="btn btn-success">
            Submit
          </button>
          <label for="incident-modal" class="btn glass">Close</label>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

export default {
  props: {
    modalData: Object,
  },
  setup(props) {
    const incidentDetails = ref({
      locationId: props.modalData.locationId,
      description: "",
    });

    const formIncidents = useForm({
      incidents: incidentDetails.value,
    });

    return { incidentDetails, formIncidents };
  },
};
</script>
