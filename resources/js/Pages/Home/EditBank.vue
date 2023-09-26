<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  subject: Object,
  options: Array,
});

//Inertia的表單物件
const form = useForm({
  code: props.subject.code,
  level: props.subject.level,
  group: props.subject.group,
  multiple: props.subject.multiple,
  seq: props.subject.seq,
  subject: props.subject.subject,
  options: props.options,
});

//表單傳送時改用Inertia的Form組件來傳送，這是一個ajax的傳送
const submit = () => {
  form.put(route("bank.update", props.subject.id));
};
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
                            <Link :href="route('home.banks')" class="block my-2 py-2 px-4 bg-slate-200">
                            管理題庫
                            </Link>
                            <Link :href="route('home.quizzes')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理試卷</Link>
                            <Link :href="route('home.tests')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理測驗
                            </Link>
                            <Link :href="route('home.groups')" class="block my-2 py-2 px-4 hover:bg-slate-200">
                            管理群組
                            </Link>
                        </div>
                        <div class="w-5/6 border rounded-xl p-4">
                            <!--利用Vue的動作修飾詞來中斷表單submit的動作，並觸發自訂的submit函式-->
                            <form @submit.prevent="submit">
                                <div>
                                    <label>題庫編號：</label>
                                    <input type="number" name="code" v-model="form.code" class="w-24" />
                                    <label>級別：</label>
                                    <input type="number" name="level" v-model="form.level" class="w-12" />
                                    <label>題組:</label>
                                    <input type="number" name="group" v-model="form.group" class="w-12" />
                                    <input type="radio" name="multiple" v-model="form.multiple" value="0" /> 單選
                                    <input type="radio" name="multiple" v-model="form.multiple" value="1" /> 複選
                                </div>
                                <div class="my-1">
                                    <label>題號：</label>
                                    <input type="number" name="seq" min="1" v-model="form.seq" />
                                </div>
                                <div class="my-1">
                                    <label>題目：</label>
                                    <input type="text" name="subject" v-model="form.subject" class="w-[90%]" />
                                </div>
                                <div class="my-1">
                                    <label for="">選項1：</label>
                                    <input type="text" class="w-[90%]" v-model="form.options[0].option" />
                                    <input type="checkbox" v-model="form.options[0].ans" />
                                </div>
                                <div class="my-1">
                                    <label for="">選項2：</label>
                                    <input type="text" class="w-[90%]" v-model="form.options[1].option" />
                                    <input type="checkbox" v-model="form.options[1].ans" />
                                </div>
                                <div class="my-1">
                                    <label for="">選項3：</label>
                                    <input type="text" class="w-[90%]" v-model="form.options[2].option" />
                                    <input type="checkbox" v-model="form.options[2].ans" />
                                </div>

                                <div class="my-1">
                                    <label for="">選項4：</label>
                                    <input type="text" class="w-[90%]" v-model="form.options[3].option" />
                                    <input type="checkbox" v-model="form.options[3].ans" />
                                </div>
                                <button type="submit" class="border py-2 px-4 bg-blue-700 text-blue-100 rounded-xl my-2">
                                    修改
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>