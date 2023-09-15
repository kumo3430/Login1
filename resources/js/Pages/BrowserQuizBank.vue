<script setup>
const props = defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  username: String,
  role: String,
  quizbank: Number,
});
</script>
<template>
  <div>瀏灠題庫</div>
  <div>題庫:{{ quizbank }}</div>
</template>