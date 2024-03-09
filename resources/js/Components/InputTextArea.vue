<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    type: String,
    required: true,
    placeholder: String
});

const $emit = defineEmits(['update:modelValue'])

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });

function onInputChange($event) {
    $emit('update:modelValue', $event.target.value)

    input.value.style.height = 'auto';
    input.value.style.height = input.value.scrollHeight + 'px';
}
</script>

<template>
    <textarea
        class="mb-3 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm overflow-auto"
        v-model="model"
        ref="input"
        @input="onInputChange"
        placeholder="">
        </textarea>
</template>
