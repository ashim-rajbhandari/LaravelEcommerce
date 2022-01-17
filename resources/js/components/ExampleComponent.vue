<template>
    <div class="container">     
        <div class="box container-fluid rounded" :class= "classcolor" >
                <li> <slot></slot></li>
                <span class="badge badge-secondary float-right">{{ user }}</span>
        </div>
       
    </div>
</template>
<style scoped>
   .box{
       padding : 20px;
       margin-bottom: 10px;
   }
   li{
       list-style-type: none;
   }
</style>
<script>
    export default {
        props :['user','color'],
        
        mounted() {
            console.log('Component mounted.');
        },
        computed:{
            classcolor() {
                return this.color;
        }
    },
       
        
    }
</script>