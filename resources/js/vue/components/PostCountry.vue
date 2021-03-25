<template>
  <Route title="Register a country" method="POST" path="/country/:country">
    <form>
      <input placeholder="Country..." v-model="country" type="text" />
      <BaseButton
        :loading="loading"
        :disabled="loading"
        @click="postCountry"
        >Register</BaseButton
      >
    </form>
    <div v-if="response" class="response">
        <h2>Response</h2>
        <ul v-if="response !== 'Country not found'">
            <li v-for="data in response" :key="data[0]"><b>{{data[0]}}:</b> {{data[1]}}</li>
        </ul>
        <p v-else>Country not found</p>
    </div>
  </Route>
</template>

<script>
import Route from "./Route.vue";
import BaseButton from "./BaseButton.vue";
import api from "../api";

export default {
  name: "PostCountry",
  components: {
    Route,
    BaseButton,
  },
  data() {
    return {
      country: "",
      loading: false,
      response: null,
    };
  },
  methods: {
    async postCountry() {
      if (this.loading) return;
      this.loading = true;
      try {
          const response = await api.post(
            `/country/${this.country.toLowerCase()}`
          );
          this.response = response.data == "Country not found" ? response.data : Object.entries(response.data);
      } catch (error) {

      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
