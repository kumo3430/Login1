<script setup>
const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    username: String,
    role:String,
    quizbank: Number,
    type: String,
});
</script>
<template>
    <div>測驗及練習</div>
    <div>題庫：{{ quizbank }}</div>
    <div>類型：{{ type }}</div>
</template>