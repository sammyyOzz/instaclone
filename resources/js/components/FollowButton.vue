<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {

        props: ['userId'],  //the properties being passed through from the view are accepted here as props

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        alert(response.data);
                    });
            }
        }
    }
</script>
