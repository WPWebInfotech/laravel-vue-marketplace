<template>
    <div class="container">
        <h3>Add Product</h3>
        <form @submit.prevent="submitForm">
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" v-model="title" class="form-control" required />
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" v-model="price" class="form-control" required />
            </div>

            <button type="submit" class="btn btn-success mt-2">Save Product</button>
        </form>

        <!-- Loading State -->
        <div v-if="loading" class="mt-2">
            <span>Saving product...</span>
        </div>

        <!-- Success Message -->
        <div v-if="success" class="mt-2">
            <span class="text-success">Product saved successfully!</span>
        </div>

        <!-- Error Message -->
        <div v-if="error" class="mt-2">
            <span class="text-danger">{{ error }}</span>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            title: '',
            price: '',
            loading: false,
            success: false,
            error: ''
        };
    },
    methods: {
        async submitForm() {
            this.loading = true;
            this.success = false;
            this.error = '';

            try {
                // Send POST request to the Laravel backend to create the product
                const response = await axios.post('/admin/products', {
                    title: this.title,
                    price: this.price
                });

                // Success - handle the response
                this.success = true;
                this.loading = false;
                this.title = '';  // Clear the form fields
                this.price = '';
            } catch (err) {
                // Error - handle the error response
                this.loading = false;
                this.error = err.response?.data?.message || 'An error occurred while saving the product.';
            }
        }
    }
};
</script>

<style scoped>
/* Add custom styles here if necessary */
</style>
