<script setup>
import AuthenticatedUserLayout from "@/Layouts/AuthenticatedUserLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="會員中心" />

  <AuthenticatedUserLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">會員中心</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 flex">
            <div class="border rounded-xl p-4 w-1/2">
              <div class="font-bold text-xl my-4">統計分析</div>
              <div class="pl-4">最高成績:</div>
              <div class="pl-4">最低成績:</div>
              <div class="pl-4">平均成績:</div>
              <div class="pl-4">測驗次數:</div>
            </div>
            <div class="border rounded-xl p-4 w-1/2">
              <div class="font-bold text-xl my-4">測驗列表</div>
              <div class="pl-4">測驗一</div>
              <div class="pl-4">測驗二</div>
              <div class="pl-4">測驗三</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedUserLayout>
</template>