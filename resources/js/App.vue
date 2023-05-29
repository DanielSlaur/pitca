<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "App",
    mounted(){
        console.log('Mounted')
    }
})
</script>

<template>
    <router-view></router-view>
</template>

<style >
#app{
    display: flex;
    flex-direction: column;
    height: 100%;
}

body{
    height: unset;
}
</style>
