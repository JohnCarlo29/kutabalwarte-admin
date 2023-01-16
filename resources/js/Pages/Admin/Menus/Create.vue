<template>
    <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="New Menu"
        main
      >
      </SectionTitleLineWithButton>
      <CardBox form @submit.prevent="store">
        <FormField label="Category">
          <FormControl v-model="form.category_id" :options="categoriesOptions" />
        </FormField>
        <FormField label="Name">
          <FormControl v-model="form.name" />
        </FormField>
        <FormField label="Description">
          <FormControl v-model="form.description" />
        </FormField>
        <FormField label="Photo">
          <FormControl type="file" @change="form.photo = $event.target.files[0]" />
        </FormField>
        <FormField label="Price">
          <FormControl v-model="form.price" />
        </FormField>
        <FormField label="Active">
          <FormCheckRadioGroup
            v-model="form.active"
            name="sample-switch"
            type="switch"
            :options="['']"
          />
        </FormField>
        <template #footer>
          <BaseButtons>
            <BaseButton type="submit" color="info" label="Submit" @click.prevent="store" />
            <BaseButton type="reset" color="info" outline label="Reset" />
          </BaseButtons>
        </template>
      </CardBox>
    </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import { computed, reactive, ref } from "vue";
import { mdiBallotOutline, mdiAccount, mdiMail, mdiGithub } from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";
import CardBox from "@/components/CardBox.vue";
import FormCheckRadioGroup from "@/components/FormCheckRadioGroup.vue";
import FormFilePicker from "@/components/FormFilePicker.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";
import BaseDivider from "@/components/BaseDivider.vue";
import BaseButton from "@/components/BaseButton.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import SectionTitle from "@/components/SectionTitle.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  'categories': Array
})

const categoriesOptions = computed(() => props.categories.map((category) => {
  return {
    id: category.id,
    value: category.id,
    label: category.name
  }
}))

const form = useForm({
            category_id: null,
            name: '',
            description: '',
            photo: '',
            active: true,
            price: 0,
        })

const store = () => {
    form.post('/admin/menus', {
        onSuccess: (page) => console.log(page),
        onError: errors => console.log(errors)
    });
}
</script>
