<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="管理中心" />

  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">管理中心</h2>
  </template>

    <!--後台主內容區-->
    <div class="w-full bg-white flex">
      <!--左側選單-->
      <div class="w-48 max-w-96 bg-black text-white py-8 px-2 shadow-lg h-[calc(100vh_-_138px)]">
        <Link :href="route('home.banks')"
          class="block my-2 py-2 hover:bg-slate-50 hover:text-slate-900 text-center text-xl">
        管理題庫
        </Link>
        <Link :href="route('home.quizzes')"
          class="block my-2 py-2 hover:bg-slate-50 hover:text-slate-900 text-center text-xl">
        管理試卷
        </Link>
        <Link :href="route('home.tests')"
          class="block my-2 py-2 hover:bg-slate-50 hover:text-slate-900 text-center text-xl">
        管理測驗
        </Link>
        <Link :href="route('home.groups')"
          class="block my-2 py-2 hover:bg-slate-50 hover:text-slate-900 text-center text-xl">
        管理群組
        </Link>
      </div>

      <!--右側內容區-->
      <div class="w-5/6 p-4 flex flex-wrap">
        <div class="w-1/2 border rounded-xl flex p-4 h-48 bg-green-400">
            題庫：
        </div>
        <div class="w-1/2 border rounded-xl flex p-4 h-48 bg-sky-400">
            試卷：
        </div>
        <div class="w-1/2 border rounded-xl flex p-4 h-48 bg-yellow-400">
            測驗：
        </div>
        <div class="w-1/2 border rounded-xl flex p-4 h-48 bg-orange-400">
            群組：
        </div>
    </div>
    </div>
  </AuthenticatedLayout>
</template>