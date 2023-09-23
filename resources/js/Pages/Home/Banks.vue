<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({ subjects: Array, count: Number });
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
                            <Link :href="route('home.bank')" class="block my-2 py-2 px-4 bg-slate-200">
                            管理題庫
                            </Link>
                            <Link :href="route('home.quiz')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理試卷</Link>
                            <Link :href="route('home.test')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理測驗
                            </Link>
                            <Link :href="route('home.group')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理群組
                            </Link>
                        </div>
                        <div class="w-5/6 border rounded-xl p-4">
                            <Link :href="route('bank.create')"
                                class="inline-block py-2 px-3 border rounded-xl bg-blue-700 text-blue-100 my-4">
                            新增題庫
                            </Link>
                            <div class="w-full px-4 py-2">題目總數:{{ count }}</div>
                            <div v-for="subject in subjects" :key="subject.id"
                                class="w-full border rounded-xl flex p-4 bg-green-400 justify-between">
                                <div>
                                    {{ subject.seq }}.
                                    {{ subject.subject }}
                                </div>
                                <Link :href="route('bank.edit', subject.id)">編輯</Link>
                                <Link :href="route('bank.destroy', subject.id)" method="delete" as="buttion">刪除</Link>
                                <!-- <div>編輯</div> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>