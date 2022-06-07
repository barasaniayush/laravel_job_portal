<template>
    <div>
        <form @submit="formSubmit">
            <button
                v-if="show"
                type="submit"
                class="btn btn-success my-3"
                style="width: 100%"
            >
                Apply Now
            </button>

            <div v-else class="alert alert-success my-3">
                Application sent successfully
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["jobid"],
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            show: true,
        };
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            axios.post("/applications/" + this.jobid, {}).then((response) => {
                this.show = false;
            });
        },
    },
};
</script>
