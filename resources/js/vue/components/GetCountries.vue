<template>
  <Route title="Pick all countries" method="GET" path="/countries">
    <form>
      <BaseButton :loading="loading" :disabled="loading" @click="getCountries"
        >Get all countries</BaseButton
      >
    </form>
    <div v-if="response" class="response">
      <h2>Response</h2>
      <div v-if="typeof response !== 'string'">
        <ul v-for="(country, i) in response" :key="i">
          <b> {{ country.name }} </b>
          <li v-for="(item, j) in Object.entries(country)" :key="j">
            <b>{{ item[0] }}:</b> {{ item[1] }}
          </li>
          <br />
        </ul>
      </div>
      <p v-else>Country not found</p>
    </div>
  </Route>
</template>

<script>
import Route from "./Route.vue";
import BaseButton from "./BaseButton.vue";
import api from "../api";

export default {
  name: "GetCountry",
  components: {
    Route,
    BaseButton,
  },
  data() {
    return {
      loading: false,
      response: null,
    };
  },
  methods: {
    async getCountries() {
      if (this.loading) return;
      this.loading = true;
      try {
        const response = await api.get("/countries");
        this.response = response.data.data.length
          ? response.data.data
          : "No countries registred";
      } catch (error) {
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>
