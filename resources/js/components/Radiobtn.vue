
<template>
  <div class="inline-flex">
    <input
      :id="id || name"
      :checked="isChecked"
      :value="value" @change="$emit('change', $event.target.value)"
      type="checkbox"
      class="form-radio h-5 w-5 text-indigo-600"
    >
    <label :for="id || name" class="ml-2 text-gray-500 dark:text-gray-200">
      <slot />
    </label>
  </div>

</template>

<script>
export default {
  name: 'Radiobtn',
  model: {
    prop: 'modelValue',
    event: 'change'
  },
  props: {
    "id": { type: String, default: null },
    "modelValue": { default: "" },
    "value": { type: String, default: undefined }
  },
  computed: {
    isChecked() {
      return this.modelValue == this.value
    }
  }
}
</script>



<style>

.form-radio{
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  -webkit-print-color-adjust: exact;
          color-adjust: exact;
  display: inline-block;
  vertical-align: middle;
  background-origin: border-box;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  flex-shrink: 0;
  height: 1.3em;
  width: 1.3em;
  color: #3758f9;
  background-color: #fff;
  border-color: #d9dadd;
  border-width: 1px;
  border-radius: 100%;
  margin-top: 5px;
}

.form-radio:checked {
  background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
  border-color: transparent;
  background-color: currentColor;
  background-size: 100% 100%;
  background-position: center;
  background-repeat: no-repeat;
}

.ckbox-size{
  width: 18px;
  height: 18px;
}

.disable-color {
  background-color: #ea5455;
  border-color: #ea5455;
  opacity: .5;
}

</style>