<template class="sticky top-0 z-50">
  <div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      <div class="w-full navbar bg-base-300 px-8 mb-3 z-50">
        <div class="flex-none">
          <label for="my-drawer" class="btn btn-square btn-ghost">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              class="inline-block w-6 h-6 stroke-current"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              ></path>
            </svg>
          </label>
        </div>
        <div class="flex-1 px-2 mx-2 normal-case text-xl">Atlas</div>
        <label
          class="flex-none btn mr-2 text-center"
          for="search-modal"
          v-if="$page.component == 'Incidents/Index'"
          >Search Location</label
        >
        <div class="flex-1"></div>
        <div class="flex-none hidden sm:block">
          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-20 rounded-full">
                <img
                  src="https://avatars.githubusercontent.com/u/21099616?v=4"
                />
              </div>
            </label>
            <ul
              tabindex="0"
              class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52"
            >
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="container mx-auto bg-base-800">
        <!-- <Toast /> -->

        <slot />
      </div>
    </div>
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <ul class="menu p-4 w-80 bg-base-100 text-base-content">
        <!-- Sidebar content here -->
        <li><Link :href="route('dashboard.index')">Dashboard</Link></li>
        <li><Link :href="route('location.index')">Locations</Link></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import Toast from "../Components/Toast.vue";

export default {
  components: {
    Link,
    Toast,
  },
  setup() {
    function toastNotif() {}

    return { toastNotif };
  },
};
</script>
