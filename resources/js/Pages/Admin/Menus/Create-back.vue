<template>
    <div>
        <form @submit.prevent="store">
            <input type="text" v-model="form.name" />
            <div v-if="form.errors.name">{{ form.errors.name }}</div>

            <input type="text" v-model="form.description" />
            <div v-if="form.errors.description">{{ form.errors.description }}</div>

            <input type="file" @change="form.photo = $event.target.files[0]" />
            <div v-if="form.errors.photo">{{ form.errors.photo }}</div>

            <input type="text" v-model="form.active" />
            <div v-if="form.errors.active">{{ form.errors.active }}</div>

            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    setup() {
        const form = useForm({
            name: '',
            description: '',
            photo: '',
            active: '',
        })

        const store = () => {
            form.post('/admin/menus', {
                onSuccess: (page) => console.log(page),
                onError: errors => console.log(errors)
            });
        }

        return { form, store }
    },
}
</script>