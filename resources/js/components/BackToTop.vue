<template>
  <a id="back2Top" title="Back to top" href="#">&#10148;</a>
</template>

<script>
export default {
  name: "BackToTop",
  mounted() {
    this.showButton();
  },

  methods: {
    showButton() {
      $(window).scroll(
        _.debounce(function () {
          var height = $(window).scrollTop();
          if (height > 100) {
            $("#back2Top").fadeIn();
          } else {
            $("#back2Top").fadeOut();
          }
        }, 300)
      );
      $(document).ready(function () {
        $("#back2Top").click(function (event) {
          event.preventDefault();
          $("html, body").animate({ scrollTop: 0 });
          return false;
        });
      });
    },
  },
};
</script>

<style lang="css" scoped>
#back2Top {
  width: 40px;
  line-height: 40px;
  overflow: hidden;
  z-index: 999;
  display: none;
  cursor: pointer;
  -moz-transform: rotate(270deg);
  -webkit-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  transform: rotate(270deg);
  position: fixed;
  bottom: 50px;
  right: 0;
  background-color: #ddd;
  color: #555;
  text-align: center;
  font-size: 30px;
  text-decoration: none;
}
#back2Top:hover {
  background-color: #ddf;
  color: #000;
}
</style>
