<template>
  <div class="route"
   :class="{ open: expanded }">
    <div class="info">
      <h2>{{ title }}</h2>
      <unicon
        name="angle-down"
        class="icon"
        :class="{ close: expanded }"
        @click="expanded = !expanded"
        fill="white"
      ></unicon>
      <div class="path">
        <span>{{ method }}</span>
        api{{ path }}
      </div>
    </div>
    <slot/>
  </div>
</template>

<script>
export default {
  name: "Route",
  props: {
    title: String,
    method: String,
    path: String,
  },
  data() {
    return {
      expanded: false,
    };
  },
};
</script>

<style>
.route {
  position: relative;
  background-color: #2a4041;
  color: white;
  margin: 10px 0;
  padding: 20px;
  height: 86px;
  transition: all 350ms cubic-bezier(0.215, 0.61, 0.355, 1);
  overflow: hidden;
}
.route.open {
  height: unset;
}
.path {
    font-style: italic;
    font-family: 'Fira Mono', monospace;
}
.path
    span {
        font-weight: bold;
    }

.info {
    margin-bottom: 20px;
}
.icon {
  position: absolute;
  right: 25px;
  top: 25px;
  transition: all 350ms cubic-bezier(0.215, 0.61, 0.355, 1);
  cursor: pointer;
}
.icon.close {
  transform: rotate(180deg);
}
</style>
