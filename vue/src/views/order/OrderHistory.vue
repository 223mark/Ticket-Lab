<template>
    <div class="pt-24 min-h-screen dark:bg-dark">
        <h4 class="text-2xl text-center text-indigo-600 font-semibold py-4   ">Order History</h4>
        <div class="overflow-auto   rounded-lg ">
            <table class="max-w-3xl mx-auto  border-collapse bg-white text-left text-sm text-gray-500 border dark:border-theme shadow-lg dark:bg-dark">
                <thead class="bg-gray-50 dark:bg-dark">
                    <!-- table header -->
                    <tr >
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900 dark:text-darkIndigo" v-for="(tablehd, index) in tableHeader" :key="index">{{ tablehd }}</th>
                    </tr>
                    <!-- table header end -->
                </thead>
                <tbody class="divide-y divide-gray-100  border-gray-100 dark:border-theme">
                    <!-- table data -->
                    <tr class="hover:bg-gray-200 dark:hover:bg-gray-800">   
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                               {{ seatNumber }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                                {{ operatorName }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                                   {{ fromWhere }} - {{ toWhere }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                                {{ departureDate }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                                {{ price }}
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap dark:text-darkIndigo">
                                <button @click="downloadPDF" class="px-4 py-2 border border-green-500 bg-white hover:bg-green-500 hover:text-white text-sm font-medium rounded dark:bg-darkTheme">PDF</button>
                            </td>
                    </tr>
                    <!-- table data end -->
                    
                </tbody>
                 
            </table>
            <p class="pt-4 text-slate-400 text-center">New order will be replace this order.Therefore, you can save this order as a <span class="text-green-500 font-semibold">PDF</span>.</p>
            <p class=" text-slate-400 text-center">If there is problems please contact us. Thank you very much..</p>
           
        </div>
    </div>
</template>

<script setup>
import { onMounted } from "@vue/runtime-core";
import { ref } from "vue";
import { reactive } from "vue";
import jsPDF from 'jspdf'
import axiosClient from "../../axiosClient";
import { computed } from "@vue/runtime-core";
const tableHeader = ['Seat Number', 'Operator Name', 'Route', 'Departure Date', 'Price', '']
const ticketId = ref(null);

//const orderDetails = ref(null);

const seatNumber = ref(null);
const operatorName = ref(null);
const fromWhere = ref(null);
const toWhere = ref(null);
const price = ref(null);
const departureDate = ref(null);

const downloadPDF = () => {
    //saving aspdf
    const pdf = new jsPDF();
    const pdfText = computed(() => {
        const text = `
        Order Successfully...

        The Seat Number Of ${operatorName.value} that  departure date is ${departureDate.value} 
        on the route ${fromWhere.value} - ${toWhere.value} is successfully ordered by YOU.


        Thanks you very much from Ticketlab.
        If you have something to say:
        Please contact our customer service phone number -0900000000 `
        return text;
    })
     pdf.text(pdfText.value, 1, 1)
     pdf.save('orderInfo.pdf');
}

onMounted(() => {
    if (localStorage.getItem('orderDetail') != null) {
        
        let data = JSON.parse(localStorage.getItem("orderDetail"));
        ticketId.value = data.ticket_id;
       // console.log(data.ticket_id, 'local');
        axiosClient.get(`tickets?ticketId[eq]=${ticketId.value}`).then(({ data }) => {
            seatNumber.value = data.data[0].seatNumber;
            operatorName.value = data.data[0].operatorName;
            fromWhere.value = data.data[0].fromWhere;
            toWhere.value = data.data[0].toWhere;
            departureDate.value = JSON.parse(localStorage.getItem("departureDate"));
            price.value = data.data[0].price;


        })
    }

    

    
})
</script>