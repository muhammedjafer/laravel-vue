<script setup>
import { ref, computed, onMounted } from "vue";

const products = ref([]);
const currentPage = ref(1);
const perPage = ref(10);

const fetchProducts = async () => {
    try {
        const response = await fetch(
            "https://fakestoreapi.com/products"
        ); // Adjust limit as needed
        const data = await response.json();
        products.value = data;
    } catch (error) {
        console.error("Error fetching products:", error);
    }
};

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    return products.value.slice(start, start + perPage.value);
});

const totalPages = computed(() => {
    return Math.ceil(products.value.length / perPage.value);
});

const prevPage = () => {
    if (currentPage.value > 1) currentPage.value--;
};

const nextPage = () => {
    console.log(currentPage.value, totalPages.value)
    if (currentPage.value < totalPages.value) currentPage.value++;
};

const viewProduct = (productId) => {
    window.location.href = `/product/${productId}`;
};

const truncateTitle = (title, maxLength = 40) => {
    return title.length > maxLength ? title.slice(0, maxLength) + '......' : title;
};

onMounted(() => {
    console.log(currentPage.value, totalPages.value)
    fetchProducts();
});
</script>

<template>
    <div class="relative">
        <section class="absolute p-6">
            <div class="max-w-screen-xl lg:px-12 px-6">
                <!-- Product Table -->
                <div class="table-responsive">
                    <table class="table text-left whitespace-nowrap mx-6">
                        <thead>
                            <tr
                                class="table-responsive text-lg dark:text-white text-black datatable-bg-color"
                            >
                                <th>Product ID</th>
                                <th>Product Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="product in paginatedProducts"
                                :key="product.id"
                            >
                                <td>{{ product.id }}</td>
                                <td :title="product.title">{{ truncateTitle(product.title) }}</td>
                                <td>{{ product.price }}</td>
                                <td>{{ product.category }}</td>
                                <td>
                                    <svg
                                        style="cursor: pointer;"
                                        @click="viewProduct(product.id)"
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="#4287f5"
                                        class="bi bi-eye-fill"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"
                                        />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"
                                        />
                                    </svg>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="py-4 px-3">
                    <div class="flex justify-between">
                        <button
                            class="btn btn-info rounded bg-green-400 text-black"
                            @click="prevPage"
                            :disabled="currentPage === 1"
                        >
                            Previous
                        </button>
                        <span class="mx-2">Page {{ currentPage }} of {{ totalPages }}</span>
                        <button
                            class="btn btn-info rounded bg-green-400 text-black"
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                        >
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
