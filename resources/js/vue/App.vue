<template>
  <div class="container">
    <h1>RUPAU Laravel</h1>
    <p>
      This project utilizes Laravel as the backend framework and VueJS for
      Front, so PHP, Composer, Laravel, Vue, Node, NPM/Yarn are needed to run
      this project. Also, docker-compose and a PostgreSQL are needed for
      interacting with data (if for some reason the docker-compose does not
      create the database, it'll be needed to do this by yourself). For
      interacting with the database, the extension pgsql and pdo_pgsql need to
      be enabled in php.ini and installed in your machine.
    </p>
    <h1>Routes</h1>
    <PostCountry />
    <GetCountry />
    <Route title="Pick all countries" method="GET" path="/countries"> </Route>
  </div>
</template>

<script>
import PostCountry from "./components/PostCountry.vue";
import GetCountry from "./components/GetCountry.vue";
import Route from "./components/Route.vue";

export default {
  name: "App",
  components: {
    Route,
    PostCountry,
    GetCountry,
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Fira+Mono&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");
* {
  margin: 0;
  padding: 0;
  outline: 0;
  box-sizing: border-box;
}
#app {
  background-color: #fdfcfa;
  height: 100vh;
  width: 100vw;
  padding: 20px 10px;
  display: flex;
  justify-content: center;
  font-family: "Ubuntu", sans-serif;
}
.container {
  width: 600px;
  background-color: white;
}

hr {
  width: 95%;
  height: 1px;
  background-color: #191919;
  border: none;
  border-radius: 6px;
  margin: 15px auto;
}

p {
  line-height: 20px;
  font-size: 16px;
  margin: 10px 0;
}

ul {
  list-style-type: none;
  margin-left: 10px;
}

ul li {
    margin: 3px 0;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: flex-start;
}
input {
    padding: 10px 15px;
    border: none;
    background-color: #191919;
    border-radius: 10px;
    color: white;
    font-size: 16px;
    margin: 5px 0;

}
</style>
