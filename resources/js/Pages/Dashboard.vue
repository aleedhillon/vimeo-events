<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div
            v-if="banner"
            class="
              bg-red-100
              border border-red-400
              text-red-700
              px-4
              py-3
              rounded
              relative
            "
            role="alert"
          >
            <span class="block sm:inline">{{ banner }}</span>
          </div>
          <div class="p-6 bg-white border-b border-gray-200">
            <iframe
              src="https://player.vimeo.com/video/563568179"
              width="640"
              height="360"
              frameborder="0"
              allow="autoplay; fullscreen; picture-in-picture"
              allowfullscreen
            ></iframe>
            <p>
              <a href="https://vimeo.com/563568179">NYC! Sound (Back) On</a>
              from <a href="https://vimeo.com/user17465310">Bonamaze</a> on
              <a href="https://vimeo.com">Vimeo</a>.
            </p>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },
  data() {
    return {
      banner: null,
    };
  },
};
</script>
