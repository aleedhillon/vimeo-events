<template>
  <breeze-authenticated-layout v-bind:isParticipant="isParticipant">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form class="w-full max-w-4xl mb-8">
              <div class="flex items-center border-b border-teal-500 py-2">
                <input
                  v-model="banner"
                  class="
                    appearance-none
                    bg-transparent
                    border-none
                    w-full
                    text-gray-700
                    mr-3
                    py-1
                    px-2
                    leading-tight
                    focus:outline-none
                  "
                  type="text"
                  placeholder="Enter Banner text here..."
                  aria-label="Banner Text"
                />
                <button
                  class="
                    flex-shrink-0
                    bg-teal-500
                    hover:bg-teal-700
                    border-teal-500
                    hover:border-teal-700
                    text-sm
                    border-4
                    text-white
                    bg-red-700
                    py-1
                    px-2
                    rounded
                  "
                  type="button"
                  @click="sendBanner"
                >
                  Send Banner
                </button>
              </div>
            </form>
            <ul class="list-decimal p-6 m-2">
              <li v-for="banner in banners" :key="banner.id">
                {{ banner.content }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated";
import axios from "axios";

export default {
  components: {
    BreezeAuthenticatedLayout,
  },
  props: {
    isParticipant: Boolean,
    banners: Array,
  },
  data() {
    return {
      banner: null,
    };
  },
  methods: {
    async sendBanner() {
      try {
        const response = await axios({
          method: "post",
          url: "/banners",
          data: {
            content: this.banner,
          },
        });

        if (response.status == 200) {
          this.banners.push(response.data.banner);
          this.banner = null;
        }
      } catch (error) {
        console.log("error");
      }
    },
  },
};
</script>
