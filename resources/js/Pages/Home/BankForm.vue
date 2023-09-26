<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  	header: { type: String, default: "新增表單" },
  	button: { type: String, default: "新增" },
  	bank: { //建立一個預設的題庫資料屬性，預設的文字內容都是空字串，預設級別是A
            type: Object,
            default: { code: "", name: "", level: "A" },
        },
    });

//在組件建立時，把props中的bank資料引入(可能有實際的資料，也可能只是預設值)
const form = useForm(props.bank); 

//當使用者按下送出按鈕時執行submit函式
//這個函式會根據bank資料中有沒有id這個屬性來決定要執行的新增還是更新的動作
const submit = () => {
  if (typeof form.id !== "undefined") {
    form.put(route("bank.update", form.id)); //更新
  } else {
    form.post(route("bank.store"));  //新增
  }
};
</script>

<template>
  <Head title="管理中心" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">管理中心</h2>
    </template>

    <div class="w-[calc(100%_-_12rem)] p-4">
      <h2 class="text-xl font-bold">{{ header }}</h2>
      <div>
        <div>
          <label>題庫代碼：</label>
          <input type="text" name="code" id="code" v-model="form.code" />
        </div>
        <div>
          <label>題庫名稱：</label>
          <input type="text" name="name" id="name" v-model="form.name" />
        </div>
        <div>
          <label>題庫級別：</label>
          <select name="level" id="level" v-model="form.level">
            <option value="A">甲級</option>
            <option value="B">乙級</option>
            <option value="C">丙級</option>
            <option value="D">單一級</option>
          </select>
        </div>
        <button @click="submit" class="my-2 border px-6 py-2 rounded-xl shadow">
          {{ button }}
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
