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

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200 flex">
            <div class="w-1/6 border rounded-xl p-4">
              <Link :href="route('home.bank')"
                    class="block my-2 py-2 px-4 hover:bg-slate-200">
                    管理題庫
              </Link>
              <Link :href="route('home.quiz')"
                    class="block my-2 py-2 px-4 hover:bg-slate-200">
                    管理試卷
              </Link>
              <Link :href="route('home.test')"
                    class="block my-2 py-2 px-4 hover:bg-slate-200">
                    管理測驗
              </Link>
              <Link :href="route('home.group')"
                    class="block my-2 py-2 px-4 hover:bg-slate-200">
                    管理群組
              </Link>
            </div>
            <div class="w-5/6 border rounded-xl p-4 flex flex-wrap">
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
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>