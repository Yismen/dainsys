<template>
  <div class="dainsys-logo animated">
    <img
      :src="logo"
      class="img-responsive center-block"
      alt="Logo"
      @click="animateLogo"
    />
  </div>
</template>

<script>
export default {
  name: "LogoComponent",
  props: {
    logo: {
      required: true,
    },
    defaultAnimation: {
      default: "rubberBand",
    },
    randomAnimation: {
      default: false,
    },
  },

  mounted() {
    this.animateLogo();
  },

  methods: {
    animateLogo() {
      let elem = document.querySelector(".dainsys-logo");
      let current = this.getAnimation();

      elem.classList.add(current);
      setTimeout(() => {
        elem.classList.remove(current);
      }, 1000);
    },

    getAnimation() {
      if (this.wantsRandom()) {
        let animations = [
          "bounce",
          "flash",
          "pulse",
          "rubberBand",
          "shake",
          "swing",
          "tada",
          "heartBeat",
          "wobble",
          "jello",
          "bounceIn",
          "fadeIn",
          "flip",
          "zoomIn",
        ];

        return animations[Math.floor(Math.random() * animations.length)];
      }
      return this.defaultAnimation;
    },

    wantsRandom() {
      return this.randomAnimation;
    },
  },
};
</script>

<style>
.dainsys-logo {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
