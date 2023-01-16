<template>
    <div>
        <Head title="Contacts" />
        <h1 class="mb-8 text-3xl font-bold">Menus</h1>

        <table class="w-full whitespace-nowrap">
            <tr class="text-left font-bold">
                <th class="pb-4 pt-6 px-6">Name</th>
                <th class="pb-4 pt-6 px-6">Description</th>
                <th class="pb-4 pt-6 px-6">Photo</th>
                <th class="pb-4 pt-6 px-6">Price</th>
                <th class="pb-4 pt-6 px-6" colspan="2">Active</th>
            </tr>
            <tr class="text-left font-bold" v-for="menu in menus.data" :key="menu.id">
                <td class="pb-4 pt-6 px-6">{{ menu.name }}</td>
                <td class="pb-4 pt-6 px-6">{{ menu.description }}</td>
                <td class="pb-4 pt-6 px-6">{{ menu.photo }}</td>
                <td class="pb-4 pt-6 px-6">{{ menu.price }}</td>
                <td class="pb-4 pt-6 px-6" colspan="2">{{ menu.active }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        menus: Object,
    },
}
</script>