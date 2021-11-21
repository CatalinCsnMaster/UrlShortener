
<template>
    <div class="data-table">
        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns" :key="column"
                    class="table-head">
                    {{ column | columnHead }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="" v-if="tableData.length === 0">
                <td class="lead text-center" :colspan="columns.length + 1">No data found.</td>
            </tr>
            <tr v-for="(data, key1) in tableData" :key="data.id" class="m-datatable__row" v-else>
                <td><a :href="`${data.shortened_url}`" target="_blank">{{ data.shortened_url }}</a></td>
                <td><a :href="`${data.destination}`" target="_blank">{{ data.destination }}</a></td>
                <td>{{ data.created_at }}</td>
            </tr>
            </tbody>

        </table>
    </div>
</template>

<script type="text/ecmascript-6">
export default {
    props: {
        fetchUrl: { type: String, required: true },
        columns: { type: Array, required: true },
    },
    data() {
        return {
            tableData: []
        }
    },
    created() {
        return this.fetchData(this.fetchUrl)
    },
    methods: {
        fetchData(url) {
            axios.get(url)
                .then(data => {
                    this.tableData = data.data
                })
        },
        /**
         * Get the serial number.
         * @param key
         * */
        serialNumber(key) {
            return key + 1;
        },
    },
    filters: {
        columnHead(value) {
            return value.split('_').join(' ').toUpperCase()
        }
    },
    name: 'DataTable'
}
</script>

<style scoped>
</style>
