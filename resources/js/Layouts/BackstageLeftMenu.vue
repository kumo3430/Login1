<script setup>
import { storeToRefs } from 'pinia'
import { menuStore } from '@/Stores/MenuStore.js';
import MenuItem from "@/QuizComponents/MenuItem.vue";

const store=menuStore();
const { selected } = storeToRefs(store)

</script>
<template>
  <!--左側選單-->
  <div
    class="w-48 max-w-96 bg-black text-white py-8 px-2 shadow-lg 
           h-[calc(100vh_-_138px)]">
    <!--把每個項目的狀態傳進去-->
    <MenuItem :href="route('home.banks')" 
              :onSelected="selected['管理題庫']">管理題庫</MenuItem>
    <MenuItem :href="route('home.quizzes')" 
              :onSelected="selected['管理試卷']">管理試卷</MenuItem>
    <MenuItem :href="route('home.tests')" 
              :onSelected="selected['管理測驗']">管理測驗</MenuItem>
    <MenuItem :href="route('home.groups')" 
              :onSelected="selected['管理群組']">管理群組</MenuItem>
  </div>
</template>
