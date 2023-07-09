<template>
    <nav class="ml-10 mr-10 mt-2 rounded-lg">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-15" src="https://images.squarespace-cdn.com/content/v1/5c8eb71b9b8fe867cc7c2e5a/1611459740635-QD1XU7URZOOE418MYF89/PetPal+Logo+Horizontal+with+R.png" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-20 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <router-link to="/" class="nav-link active text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Home</router-link>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Adopt</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Lost and Found</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Add Pet</a>
              <a href="#" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ml-10">Services</a>
              <router-link to="/about" class="text-blue-600 hover:bg-blue-600 hover:text-white rounded-md px-3 py-2 text-sm font-medium ">About</router-link>
              
            </div>
          </div>
        </div>              
      </div>
    </div>

  </nav>

    <router-view/>
</template>

<script setup>

</script>

<style lang="scss" scoped>

</style>