<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create preference for number {{ number.number }} from {{ customerName }}
      </h2>
    </template>
    <div class="py-11">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="form.post(route('preferences.create',[number.id]))">
          <input type="hidden" v-model="form.numberId" />
          <div class="mb-6">
            <label
              for="name"
              class="block mb-2 text-sm font-medium text-gray-800"
              >Name</label
            >
            <input
              type="text"
              id="name"
              v-model="form.name"
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
              v-if="form.errors.name"
              class="mt-2 text-sm text-red-600 dark:text-red-500"
            >
              <span class="font-medium">Oops! </span>{{ form.errors.name }}
            </p>
          </div>
          <div class="mb-6">
            <label
              for="value"
              class="block mb-2 text-sm font-medium text-gray-800"
              >Value</label
            >
            <input
              type="text"
              id="value"
              v-model="form.value"
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
              v-if="form.errors.value"
              class="mt-2 text-sm text-red-600 dark:text-red-500"
            >
              <span class="font-medium">Oops! </span>{{ form.errors.value }}
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
            Add preference
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
  props: ['customerName', 'number'],
  setup(props) {
    const form = useForm({
      name: null,
      value: null,
      numberId: props.number.id
    });
    return { form };
  },
};
</script>
