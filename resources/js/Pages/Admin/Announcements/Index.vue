<script setup>
import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    medicines: Array
});

 /*props: {
    medicine: {
      type: Object,
      required: true
    }
}*/

function confirmDelete(medicineId) {
  if (confirm('Are you sure you want to delete this medicine?')) {
    // Call the deleteMedicine method
    deleteMedicine(medicineId);
  }
}
</script>

<template>
    <Head title="Inventory" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Inventory Index</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <!--<th scope="col" class="px-6 py-3">
                                        Price
                                    </th>-->
                                    <th scope="col" class="px-6 py-3">
                                        Low Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Median Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Highest Price
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosage
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Exp Date
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr v-for="medicine in medicines" :key="medicine.id"  class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ medicine.name }}
                                    </th>
                                    <!--<td class="px-6 py-4">
                                        {{ medicine.price }}
                                    </td>-->
                                    <td class="px-6 py-4">
                                        {{ medicine.lprice }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ medicine.mprice }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ medicine.hprice }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ medicine.quantity}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ medicine.dosage }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ medicine.expdate }}
                                    </td>
                                    
                                    
                                </tr>
                                
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
