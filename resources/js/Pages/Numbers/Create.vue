<template>
  <Head title="Create customer" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create number for {{customer.name}}
      </h2>
    </template>
    <div class="py-11">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="form.post(route('numbers.create',[customer.id]))">
          <input type="hidden" v-model="form.customerId" />
          <div class="mb-6">
            <label
              for="number"
              class="block mb-2 text-sm font-medium text-gray-800"
              >Number</label
            >
            <input
              type="number"
              id="number"
              v-model="form.number"
              class="
                bg-gray-50
                border border-gray-300
                text-gray-900 text-sm
                rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                block
                w-full
                p-2.5
              "
              required
            />
            <p
              v-if="form.errors.number"
              class="mt-2 text-sm text-red-600 dark:text-red-500"
            >
              <span class="font-medium">Oops! </span>{{ form.errors.number }}
            </p>
          </div>
          <div class="mb-6">
            <label
              for="status"
              class="
                block
                mb-2
                text-sm
                font-medium
                text-gray-900
              "
              >Select initial status</label
            >
            <select
              id="status"
              v-model="form.status"
              class="
                bg-gray-50
                border border-gray-300
                text-gray-900 text-sm
                rounded-lg
                focus:ring-blue-500 focus:border-blue-500
                block
                w-full
                p-2.5
              "
            >
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="cancelled">Cancelled</option>
            </select>
            <p
              v-if="form.errors.status"
              class="mt-2 text-sm text-red-600 dark:text-red-500"
            >
              <span class="font-medium">Oops! </span>{{ form.errors.status }}
            </p>
          </div>
          <button
            type="submit"
            :disabled="form.processing"
            class="
              text-white
              bg-blue-700
              hover:bg-blue-800
              focus:ring-4 focus:ring-blue-300
              font-medium
              rounded-lg
              text-sm
              w-full
              sm:w-auto
              px-5
              py-2.5
              text-center
            "
          >
            Add number
          </button>
        </form>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  props: ['customer'],
  setup(props) {
    const form = useForm({
      number: null,
      status: 'active',
      customerId: props.customer.id
    });
    return { form };
  },
};
</script>
