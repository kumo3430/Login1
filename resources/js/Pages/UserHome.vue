<script setup>
import AuthenticatedUserLayout from "@/Layouts/AuthenticatedUserLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>
<template>
  <Head title="管理中心" />

  <AuthenticatedUserLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          會員中心
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <ul>
              <li>可以查看自己測驗成績</li>
              <li>可以對做過的題目進行註解</li>
              <li>可以標記題目，方便日後查詢</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedUserLayout>
</template>