<template>
    <LayoutAuthenticated>
    <SectionMain>
        <!-- component -->
        <div class="flex justify-between">
            <FormField label="Search">
                <FormControl />
            </FormField>

            <BaseButtons class="self-center">
              <BaseButton type="reset" color="info" outline label="Add Menu" routeName="admin.menus.create" />
            </BaseButtons>
        </div>

<table class="py-2 min-w-full sm:px-6 lg:px-8">
          <thead class="bg-white border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Category
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Name
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Description
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Photo
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Price
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Active
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-gray-100 border-b" v-for="menu in menus.data" :key="menu.id">
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ menu.category }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ menu.name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ menu.description }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <img width="100" height="100" :src="`/storage/${menu.photo}`" />
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ menu.price }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                {{ menu.active }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <Link :href="`/admin/menus/${menu.id}/edit`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
              </td>
            </tr>
          </tbody>
        </table>
    </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";
import BaseButton from "@/components/BaseButton.vue";
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    menus: Object,
})
</script>