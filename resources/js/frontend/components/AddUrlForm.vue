<template>
    <form @submit.prevent="submit">
        <div class="form-group">
            <label for="destination">Destination</label>
            <input type="text" class="form-control" name="destination" placeholder="http://example.com" id="destination" v-model="fields.destination" />
            <div v-if="errors && errors.destination" class="text-danger">{{ errors.destination[0] }}</div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Shorten Url</button>


    </form>
</template>

<script>
export default {
    data() {
        return {
            fields: {},
            errors: {},
        }
    },
    methods: {
        submit() {
            this.errors = {};
            axios.post('/api/url/store', this.fields)
                .catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
            });
            window.location.reload()
        },
    },
}
</script>
