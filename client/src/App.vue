<template>
    <Header />
    <router-view></router-view>
</template>
<script>
import axios from 'axios';
import Header from './components/Header.vue';
export default {
    name: 'App',
    created() {
        const fetchData = async () => {
            axios.defaults.headers.common['X-Requested-With'];
            const rs = await axios.get('http://127.0.0.1:8080/api/user', {
                headers: {
                    Authorization: 'Bearer ' + '2|FmsFVabbrbLaPVYwl5ooTagJp1VVhkQDkOz9PYPj',
                },
            });
            console.log(rs.data);
        };
        // fetchData();
    },
    components: { Header },
};
</script>
<style></style>
