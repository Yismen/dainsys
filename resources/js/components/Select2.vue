<template>
  <Select2
    v-model="$attrs.value"
    :options="mappedOptions"
    :settings="{ theme }"
    :required="required"
    :name="name"
    @change="updateProps($event)"
  >
    <slot></slot>
  </Select2>
</template>

<script>
import Select2 from "v-select2-component";
export default {
  props: {
    options: {
      type: Array,
      required: true,
    },
    required: {
      type: Boolean,
      default: false,
    },
    theme: {
      default: "bootstrap",
    },
    name: {
      required: true,
      type: String,
    },
  },
  computed: {
    mappedOptions: function () {
      return this.options.map((element) => {
        return {
          id: element.id,
          text: element.text ?? element.name,
        };
      });
    },
  },
  methods: {
    updateProps(value) {
      this.$emit("selectUpdated", {
        field: this.name,
        value,
      });
    },
  },
  components: { Select2 },
};
</script>

<style>
</style>