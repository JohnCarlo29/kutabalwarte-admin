<template>
    <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="New Category"
        main
      >
      </SectionTitleLineWithButton>
      <CardBox form @submit.prevent="store">
        <FormField label="Name">
          <FormControl v-model="form.name" />
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

const form = useForm({
            name: '',
            active: true,
        })

const store = () => {
    form.post('/admin/categories');
}
</script>
