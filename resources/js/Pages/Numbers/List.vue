<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Numbers for {{ customer.name }}
      </h2>
    </template>
    <div class="py-11">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-5">
          <Link
            :href="route('numbers.create',[customer.id])"
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
            >Add new number</Link
          >
        </div>
        <Alert :msg="route()?.params.msg"/>
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
                          Number
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
                          Status
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
                          Created Date
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Delete</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr v-for="number in numbers" :key="number.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ number.number }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <StatusBadge :status="number.status" />
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">
                            {{ formatDate(number.created_at) }}
                          </div>
                        </td>
                        <td
                          class="
                            px-2
                            py-2
                            whitespace-nowrap
                            text-right text-sm
                            font-medium
                          "
                        >
                          <Link
                            :href="route('preferences.list',[number.id])"
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
                            >Manager Preferences</Link
                          >
                        </td>
                        <td
                          class="
                            whitespace-nowrap
                            text-right text-sm
                            font-medium
                          "
                        >
                            <DeleteButton @click="deleteNumbers(number.id)" />
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
import { Head, Link } from "@inertiajs/inertia-vue3";
import dayjs from "dayjs";
import DeleteButton from "@/Components/DeleteButton.vue";
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
    customer: Object,
    numbers: Array,
  },
  methods: {
    formatDate(dateString) {
      const date = dayjs(dateString);
      return date.format("MM/DD/YYYY");
    },
    deleteNumbers(numberId){
        Inertia.delete(numberId, {
            only: ['numbers'],
        })
    }
  },
};
</script>
