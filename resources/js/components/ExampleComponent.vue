<template>
    <div class="container content">
        <div class="row justify-content-center">
            <!--            <p>{{ greetings }}</p>-->
            <Bar v-if="loaded" :data="chartData" ref="bar"/>
        </div>
    </div>
</template>

<script>
import {Bar} from 'vue-chartjs'
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    components: {Bar},
    data: () => ({
        loaded: false,
        chartData: null
    }),
    async mounted() {
        this.loaded = false
        this.loaded = true
        try {
            console.log(this.$refs.bar)
            const data = await axios.get('/api/rates')
            console.log(data.data)
            this.chartData = data
            // console.log('wwef')

        } catch (e) {
            console.error(e)
        }
    }


}

</script>
