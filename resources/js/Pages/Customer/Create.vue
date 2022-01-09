<template>
  <Head title="Create customer" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Customer
      </h2>
    </template>
    <div class="py-11">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="form.post('/customer/create')">
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
            <p v-if="form.errors.name" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ form.errors.name }}</p>
          </div>
          <div class="mb-6">
            <label
              for="document"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Document</label
            >
            <input
              type="number"
              id="document"
              v-model="form.document"
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
            <p v-if="form.errors.document" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ form.errors.document }}</p>
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
            C
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
  setup() {
      const form = useForm({
      name: null,
      document: null,
    })
    return {form}
  }
};
</script>
