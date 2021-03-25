<template>
  <button :disabled="disabled" @click="$emit('click')">
    <img src="https://raw.githubusercontent.com/Codelessly/FlutterLoadingGIFs/master/packages/circular_progress_indicator.gif" v-if="loading"/>
    <slot v-else/>
  </button>
</template>

<script>
export default {
  name: "BaseButton",
  props: {
    loading: Boolean,
    disabled: Boolean,
  },
};
</script>

<style>
button {
    padding: 10px 20px;
    border: none;
    background-color: #191919;
    border-radius: 10px;
    color: white;
    margin: 5px 0;
    font-size: 18px;
    transition: all .35s cubic-bezier(0.075, 0.82, 0.165, 1);
}
button img{
    height: 15px;
    width: auto;
    mix-blend-mode: exclusion;
    filter: hue-rotate(245deg);
}
</style>
