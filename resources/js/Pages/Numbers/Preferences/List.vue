<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Preferences for number {{ number.number }} from {{ customerName }}
      </h2>
    </template>
    <div class="py-11">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-5">
          <Link
            :href="route('preferences.new', [number.id])"
            class="
              text-white
              bg-blue-700
              hover:bg-blue-800
              focus:ring-4 focus:ring-blue-300
              font-medium
              rounded-full
              text-sm
              px-5
              py-2.5
              text-center
            "
            >Add new preference</Link
          >
        </div>
        <Alert :msg="route()?.params.msg" />
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div
                class="
                  py-2
                  align-middle
                  inline-block
                  min-w-full
                  sm:px-6
                  lg:px-8
                "
              >
                <div
                  class="
                    shadow
                    overflow-hidden
                    border-b border-gray-200
                    sm:rounded-lg
                  "
                >
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th
                          scope="col"
                          class="
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-500
                            uppercase
                            tracking-wider
                          "
                        >
                          Preference
                        </th>
                        <th
                          scope="col"
                          class="
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-500
                            uppercase
                            tracking-wider
                          "
                        >
                          Value
                        </th>
                        <th
                          scope="col"
                          class="
                            px-6
                            py-3
                            text-left text-xs
                            font-medium
                            text-gray-500
                            uppercase
                            tracking-wider
                          "
                        >
                          Last update
                        </th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr
                        v-for="preference in preferences"
                        :key="preference.id"
                      >
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ formatToTitleCase(preference.name) }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div v-if="['1', '0'].includes(preference.value)">
                            <input
                              type="checkbox"
                              disabled="true"
                              :checked="preference.value == '1'"
                              class="
                                w-4
                                h-4
                                text-blue-600
                                bg-gray-100
                                rounded
                                border-gray-300
                                focus:ring-blue-500
                              "
                            />
                          </div>
                          <div v-else>
                            {{ preference.value }}
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">
                            {{ formatDate(number.updated_at) }}
                          </div>
                        </td>
                        <td
                          class="
                            px-6
                            py-4
                            whitespace-nowrap
                            flex flex-row-reverse
                          "
                        >
                          <DeleteButton @click="deletePreference(preference.id)"/>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import StatusBadge from "@/Components/StatusBadge.vue";
import Alert from "@/Components/Alert.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import dayjs from "dayjs";
import { Inertia } from '@inertiajs/inertia';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
    StatusBadge,
    Alert,
    DeleteButton
  },
  props: {
    number: Object,
    preferences: Array,
    customerName: String,
  },
  methods: {
    formatDate(dateString) {
      const date = dayjs(dateString);
      return date.format("MM/DD/YYYY");
    },
    formatToTitleCase(text) {
      return text
        .split("_")
        .map((word) => word[0].toUpperCase() + word.slice(1).toLowerCase())
        .join(" ");
    },
    deletePreference(preferenceId){
        console.log(preferenceId);
        Inertia.delete(preferenceId, {
            only: ['preferences'],
        })
    }
  },
};
</script>
