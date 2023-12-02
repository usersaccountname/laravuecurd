<template>
    <div class="container">
      <h2>Medicines List</h2>
      <router-link :to="{ name: 'medicine-create' }" class="btn btn-primary mb-2">Add Medicine</router-link>

      <div v-if="successMessage" class="alert alert-success">{{ successMessage }}</div>

      <table class="table">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Generic Name</th>
            <th>Brand Name</th>
            <th>Dosage (mg)</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="medicine in medicines" :key="medicine.med_id">
            <td>{{ medicine.med_id }}</td>
            <td>{{ medicine.gen_name }}</td>
            <td>{{ medicine.brand_name || 'N/A' }}</td>
            <td>{{ medicine.mg }}</td>
            <td>
              <router-link :to="{ name: 'medicine-show', params: { id: medicine.med_id } }" class="btn btn-success btn-sm">Show</router-link>
              <router-link :to="{ name: 'medicine-edit', params: { id: medicine.med_id } }" class="btn btn-primary btn-sm">Edit</router-link>
              <button @click="deleteMedicine(medicine.med_id)" class="btn btn-danger btn-sm" v-on:click="return confirm('Are you sure you want to delete this medicine?')">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        medicines: [], // Assuming you have a data property to store medicines
        successMessage: null,
      };
    },
    methods: {
      deleteMedicine(medicineId) {
        if (confirm('Are you sure you want to delete this medicine?')) {
          // Implement the logic to delete the medicine using Axios or a similar method
          // Update the medicines array or show a success message accordingly
        }
      },
    },
    mounted() {
      // Fetch medicines data when the component is mounted
      // You can use Axios or another method to make an API request to your Laravel backend
      // Update the 'medicines' data property with the fetched data
    },
  };
  </script>
