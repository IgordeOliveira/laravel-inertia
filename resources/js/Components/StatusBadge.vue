<template>
    <span class="text-sm font-medium mr-2 px-2.5 py-0.5 rounded capitalize" :class="getClass()">{{status}}</span>
</template>

<script>
export default {
    props: {
        status: String,
    },
    methods: {
        getClass(){
            let statusClass = null;
            switch(this.status){
                case 'new':
                    statusClass = 'bg-green-100 text-green-800'
                    break;
                case 'active':
                    statusClass = 'bg-blue-100 text-blue-800'
                    break;
                case 'suspended':
                    statusClass = 'bg-gray-100 text-gray-800'
                    break;
                case 'cancelled':
                    statusClass = 'bg-red-100 text-red-800'
                    break;
            }
            return statusClass;
        }
    }
}
</script>
