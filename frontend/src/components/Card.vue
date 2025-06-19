<template>
  <div
    class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
  >
    <img
      v-if="image"
      :src="image"
      alt="Card Image"
      class="w-full h-48 object-cover"
    />
    <div class="p-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ title }}</h2>
      <p class="text-gray-700">{{ description }}</p>
      <button
        v-if="buttonText"
        @click="$emit('button-click')"
        class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors"
      >
        {{ buttonText }}
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  description: String,
  image: String,
  buttonText: String,
});
</script>
