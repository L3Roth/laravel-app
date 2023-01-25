<template>
    <div>
        <button style="margin-left: 2em" class="btn btn-primary" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],
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
