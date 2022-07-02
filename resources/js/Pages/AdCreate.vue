<script setup>

import Container from "../Shared/Components/Container.vue";
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {computed, ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import Ckeditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import "@ckeditor/ckeditor5-build-classic/build/translations/fa";

// Functions
const isNumber = (str) => {
    const pattern = /^\d+\.?\d*$/;
    return pattern.test(str);
}
// To set default selected values of v-select
const setSelectValue = (field, collection) => {
    if (typeof field === null || field === null)
        return null;

    else
        return isNumber(field) ? collection.filter((f) => f.id === +field)[0]?.name || '' : field;
}
// Props
const props = defineProps({
    currencies: Object,
    states: Object,
    districts: Object,
    categories: Object,
    attributes: Object,
    state: undefined,
    category: undefined,
})
// Form
const form = useForm({
    title: null,
    price: null,
    phone_number: null,
    desc: '',
    address: null,
    category_id: setSelectValue(props.category, props.categories),
    currency_id: null,
    district_id: null,
    is_chat_enabled: true,
    images: usePage().props.value.errors,
    attributes: [],
    values: [],
})
const isFormSubmitting = ref(false);
// Form submit action
const save = () => {
    isFormSubmitting.value = true;
    form
        .transform((data) => ({
            ...data,
            attributes: data.attributes.filter((item) => {
                return item !== null || item !== '' || item !== undefined;
            }),
            values: data.values.filter((item) => {
                return item !== null || item !== '' || item !== undefined;
            }),
        }))
        .post(route('ad.create.store'), {
            preserveState: true,
            preserveScroll: true,
            replace: true,
        })
}
const state = ref(setSelectValue(props.state, props.states))
let isNegotiable = computed(() => {
    return form.currency_id === 0;
});
if (isFormSubmitting.value === false) {
    // Form watcher
    watch(() => form.category_id, () => {
        Inertia.get(route('ad.create', {
            category: form.category_id,
            state: state.value,
        }), {}, {preserveScroll: true, preserveState: true, replace: true,})
    })

    // State watcher
    watch(state, (value) => {
        Inertia.get(route('ad.create', {
            category: form.category_id,
            state: state.value,
        }), {}, {preserveScroll: true, preserveState: true, replace: true,})
    })
}
// Third Party Libraries configs
const editor = ClassicEditor;
const ckeditor = Ckeditor.component;
const editorConfig = {
    language: 'fa',
    toolbar: [
        "heading", "|",
        'bold', 'italic', '|',
        'bulletedList', 'numberedList', '|',
        'blockQuote', '|',
        'outdent', 'indent', '|',
        'undo', 'redo', '|',
    ],
};
const mlp_translations = {
    fileTypeNotAllowed: 'شما باید فایل با فرمت type انتخاب کنید',
    tooLarge: 'فایل انتخاب شده بسیار بزرگ است, max',
    tooSmall: 'فایل انتخاب شده بسیار کوچک است, min',
    tryAgain: 'لطفاً دوباره کوشش نمایید',
    somethingWentWrong: 'مشکلی در آپلود شدن فایل پیش آمده است!',
    selectOrDrag: 'فایل را انتخاب یا بکشید',
    selectOrDragMax: 'انتخاب یا کشیدن به تعداد {maxItems} فایل',
    file: {singular: 'فایل', plural: 'فایل ها'},
    anyImage: 'هر نوع تصویر',
    anyVideo: 'هر نوع ویدیو',
    goBack: 'بازگشت',
    dropFile: 'فایل را کشیده و بیاندازید',
    dragHere: 'فایل را اینجا بیاندازید',
    remove: 'حذف',
    download: 'دانلود',
};
const onImageChange = (media) => {
    form.images = media;
};

const populateAttributes = (value, index) => {
    const newAttribute = {
        attribute_id: index,
        value: value,
    };
    form.attributes[index] === 'undefined' ? form.attributes.push(newAttribute) : form.attributes[index] = newAttribute;
};

</script>

<template>
    <Head title="ثبت آگهی جدید"/>
    <Container>
        <form id="ad_form" @submit.prevent="save" method="post">
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- First grid -->
                <section>
                    <div>
                        <label class="label block flex justify-between mb-2">
                            <span class="label-text font-bold">عکس آگهی</span>
                            <small class="text-sm text-left">
                            <span class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                     stroke="#fb5858"
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                افزودن عکس، احتمال دیده شدن آگهی شما را افزایش میدهد.
                            </span>
                            </small>
                        </label>
                        <media-library-attachment
                            name="ads"
                            @change="onImageChange"
                            :initial-value="form.images"
                            :max-items="5"
                            :translations="mlp_translations"

                            :validation-rules="{accept: ['image/jpeg', 'image/png', 'image/jpg'], maxSizeInKB: 5 * 1024, minSizeInKB: 5}"
                            :validation-errors="form.errors.images"
                            multiple
                        />
                        <div v-if="form.errors.images" class="text-red-500 text-sm my-2">{{ form.errors.images }}</div>
                    </div>
                    <div class="divider"></div>
                    <section class="my-4" :class="{'grid grid-cols-1 lg:grid-cols-2 gap-4' : !isNegotiable}">
                        <div class="form-control">
                            <label for="currency" class="label">
                                <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">نوع پرداخت</span>
                            </label>
                            <v-select :class="{'input-error': form.errors.currency_id}"
                                      placeholder="نوع پرداخت را انتخاب کنید"
                                      :options="currencies" label="name"
                                      id="currency"
                                      :reduce="(option) => option.id"
                                      v-model="form.currency_id"/>
                            <div v-if="form.errors.currency_id" class="text-red-500 text-sm my-2">{{ form.errors.currency_id }}</div>
                        </div>
                        <div class="form-control" v-show="!isNegotiable">
                            <label class="label">
                                <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">قیمت</span>
                            </label>
                            <input type="number" v-model="form.price" placeholder="منصفانه ترین قیمت" class="input input-bordered bg-adaptable"
                                   :class="{'input-error': form.errors.price}"/>
                            <div v-if="form.errors.price" class="text-red-500 text-sm my-2">{{ form.errors.price }}</div>
                        </div>
                    </section>
                    <section class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-4">
                        <div class="form-control">
                            <label for="state" class="label">
                                <span class="label-text font-bold">ولایت</span>
                            </label>
                            <v-select placeholder="ولایت مورد نظر را انتخاب کنید" :options="states"
                                      label="name"
                                      id="state"
                                      :reduce="(option) => option.id"
                                      v-model="state"/>

                        </div>
                        <div class="form-control">
                            <label for="district" class="label">
                                <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">ناحیه</span>
                            </label>
                            <v-select :value="form.district_id" :class="{'input-error': form.errors.district_id}"
                                      placeholder="ناحیه مورد نظر را انتخاب کنید" :options="districts" label="name"
                                      id="district"
                                      :reduce="(option) => option.id"
                                      v-model="form.district_id"/>
                            <div v-if="form.errors.district_id" class="text-red-500 text-sm my-2">{{ form.errors.district_id }}</div>
                        </div>
                    </section>
                    <div class="divider"></div>
                    <!-- Description -->
                    <div class="my-4">
                        <label for="desc" class="label block font-medium flex justify-between mb-2">
                            <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">
                                توضیحات
                            </span>
                            <small class="text-sm text-left">
                                <span class="flex justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                         stroke="#fb5858"
                                         stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    توضیحات کامل و شفاف کیفیت آگهی شما را افزایش میدهد.
                                </span>
                            </small>
                        </label>
                        <ckeditor
                            id="desc"
                            class="rounded-lg"
                            :class="{'input-error': form.errors.desc}"
                            :editor="editor"
                            v-model="form.desc"
                            :config="editorConfig"
                            :disabled="form.processing"
                            tag-name="textarea"/>
                        <div v-if="form.errors.desc" class="text-red-500 text-sm my-2">{{ form.errors.desc }}</div>
                    </div>
                    <div class="form-control w-fit">
                        <label class="label cursor-pointer" :class="{'input-error': form.errors.is_chat_enabled}">
                            <input type="checkbox" checked="checked" class="checkbox checkbox-primary" v-model="form.is_chat_enabled"/>
                            <span class="label-text font-bold ml-1">چت فعال باشد؟</span>
                        </label>
                        <div v-if="form.errors.is_chat_enabled" class="text-red-500 text-sm my-2">{{ form.errors.is_chat_enabled }}</div>
                    </div>
                </section>
                <!-- Second grid -->
                <section>
                    <div class="form-control">
                        <label for="category" class="label block font-medium flex justify-between">
                            <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">دسته بندی</span>
                            <small class="text-sm text-left">
                            <span class="flex justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                                     stroke="#fb5858"
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                لطفاً دسته بندی را با دقت انتخاب نمایید.
                            </span>
                            </small>
                        </label>
                        <v-select :class="{'input-error': form.errors.category_id}"
                                  placeholder="دسته بندی مورد نظر را انتخاب کنید" :options="categories"
                                  label="name"
                                  id="category"
                                  :reduce="option => option.slug"
                                  v-model="form.category_id"/>
                        <div v-if="form.errors.category_id" class="text-red-500 text-sm my-2">{{ form.errors.category_id }}</div>
                    </div>
                    <section v-if="attributes.data && attributes.data.length > 0">
                        <h2 class="card-title my-2">ویژگی ها</h2>
                        <section class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <template v-for="(attribute, index) in attributes.data" :key="attribute.id">
                                <div class="form-control" v-if="attribute.frontend_type === 'text' || attribute.frontend_type === 'number'">
                                    <label class="label w-fit after:content-['*'] after:ml-0.5 after:text-red-500" :for="attribute.id"
                                           v-text="attribute.name"></label>
                                    <input :type="attribute.frontend_type"
                                           :id="attribute.id"
                                           @change="populateAttributes($event.target.value, attribute.id)"
                                           class="input input-bordered bg-adaptable">
                                    <!-- !TODO Fix error validation showing up by fixing up adding the attribute in correct attributes index of attribute.id-->
                                    <!-- attributes.0.value -->
                                    <div v-if="form.errors.attributes && form.errors.attributes[attribute.id]['value']" class="text-red-500 text-sm my-2">
                                        {{ form.errors.attributes[attribute.id]['value'] }}
                                    </div>
                                </div>
                                <div class="form-control" v-if="attribute.frontend_type === 'checkbox'">
                                    <label class="label cursor-pointer" :for="attribute.id">
                                        <span class="label-text w-fit after:content-['*'] after:ml-0.5 after:text-red-500" v-text="attribute.name"></span>
                                        <input
                                            class="checkbox checkbox-primary"
                                            type="checkbox"
                                            :id="attribute.id"
                                            required
                                            @change="populateAttributes($event.target.value, attribute.id)"
                                        >
                                    </label>
                                </div>
                                <div class="form-control" v-if="attribute.frontend_type === 'radio'">
                                    <label class="label cursor-pointer" :for="attribute.id">
                                        <span class="label-text w-fit after:content-['*'] after:ml-0.5 after:text-red-500" v-text="attribute.name"></span>
                                        <input
                                            class="radio checked:bg-primary-500"
                                            type="radio"
                                            :id="attribute.id"
                                            required
                                            @change="populateAttributes($event.target.value, attribute.id)"
                                        >
                                    </label>
                                </div>
                                <div class="form-control" v-else-if="attribute.frontend_type === 'select' && attribute.values.length > 0">
                                    <label :for="attribute.id" class="label">
                                        <span class="label-text after:content-['*'] after:ml-0.5 after:text-red-500" v-text="attribute.name"></span>
                                    </label>
                                    <v-select :value="form.values[attribute.id]"
                                              required
                                              placeholder="لطفاً یک گزینه را انتخاب نمایید" :options="attribute.values" label="name"
                                              :id="attribute.id"
                                              :reduce="(option) => { return { attribute_value_id: option.id, attribute_id: attribute.id } }"
                                              v-model="form.values[attribute.id]"/>
                                </div>
                            </template>
                        </section>
                    </section>
                    <div class="divider"></div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">آدرس</span>
                        </label>
                        <input type="text" v-model="form.address" placeholder="آدرس دقیق سرعت پیدا کردن جنس مورد نیاز مشتری را افزایش میدهد"
                               class="input input-bordered bg-adaptable" :class="{'input-error': form.errors.address}"/>
                        <div v-if="form.errors.address" class="text-red-500 text-sm my-2">{{ form.errors.address }}</div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">شماره تماس</span>
                        </label>
                        <input type="tel" v-model="form.phone_number" placeholder="شماره تماس را برای ارتباط با مشتری وارد کنید"
                               class="input input-bordered bg-adaptable" :class="{'input-error': form.errors.phone_number}"/>
                        <div v-if="form.errors.phone_number" class="text-red-500 text-sm my-2">{{ form.errors.phone_number }}</div>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-bold after:content-['*'] after:ml-0.5 after:text-red-500">عنوان آگهی</span>
                        </label>
                        <input type="text" v-model="form.title" placeholder="لطفاً کوتاه، دقیق و مشخص بنویسید و به موارد چشمگیر اشاره کنید"
                               class="input input-bordered bg-adaptable" :class="{'input-error': form.errors.title}"/>
                        <div v-if="form.errors.title" class="text-red-500 text-sm my-2">{{ form.errors.title }}</div>
                    </div>
                </section>
            </section>
            <!-- Form Submit -->
            <section class="my-6 flex justify-end">
                <button class="btn btn-primary" type="submit" :disabled="form.processing">
                    ارسال آگهی
                </button>
                <Link as="button" class="btn btn-ghost ml-4" type="button" :href="route('home')">
                    انصراف
                </Link>
            </section>
        </form>
    </Container>
</template>
