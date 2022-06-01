<?php

return [
    'created_at' => 'تاریخ ایجاد',
    'updated_at' => 'تاریخ ویرایش',
    'delete' => 'حذف',
    'delete_bulk' => 'حذف انتخاب شده',
    'status_helper' => 'در سایت نمایش داده شود یا نه؟',
    'widgets' => [
        'num_ads' => 'تعداد آگهی ها',
        'num_categories' => 'تعداد دسته بندی ها',
        'num_users' => 'تعداد کاربران',
    ],
    'actions' => [
        'status' => 'تغییر وضعیت',
    ],
    'SEO' => [
        'title' => 'سئو',
        'fields' => [
            'title' => 'عنوان',
            'author_name' => 'نویسنده/صاحب اثر',
            'desc' => 'توضیحات',
        ],
    ],
    'categories' => [
        'title' => 'دسته بندی',
        'title_plural' => 'دسته بندی ها',
        'fields' => [
            'name' => 'نام',
            'slug' => 'اسلاگ',
            'parent_id' => 'والد/پدر',
            'is_visible' => 'فعال',
            'description' => 'توضیحات',
        ],
        'placeholders' => [
            'no_parent' => 'بدون والد',
            'num_children' => 'تعداد زیردسته ها',
        ],
        'filters' => [
            'status' => 'وضعیت',
            'status_placeholder' => 'همه وضعیت ها',
            'visible' => 'فعال',
            'not_visible' => 'غیر فعال',
            'parent_status' => 'مرتبه',
            'parent_status_placeholder' => 'همه مرتبه ها',
            'parent' => 'دسته بندی های اصلی',
            'child' => 'زیردسته ها',
        ],
        'relations' => [
            'children' => 'زیردسته ها',
            'child' => 'زیردسته',
        ],
    ],
    'countries' => [
        'title' => 'کشور',
        'title_plural' => 'کشور ها',
        'fields' => [
            'name' => 'نام',
            'status' => 'وضعیت',
            'phone_code' => 'پیشوند شماره تلفن',
            'iso3' => 'کد کشور ایزو 3',
        ],
        'placeholders' => [
            'iso3_helper' => 'این یک کد 3 رقمی برای کشور ها است. مثل AFG',
        ],
    ],
    'states' => [
        'title' => 'ولایت',
        'title_plural' => 'ولایت ها',
        'fields' => [
            'name' => 'نام',
            'country_id' => 'کشور',
        ],
        'placeholders' => [
        ],
    ],
    'districts' => [
        'title' => 'ناحیه',
        'title_plural' => 'ناحیه ها',
        'fields' => [
            'name' => 'نام',
            'state_id' => 'ولایت',
            'country_id' => 'کشور',
        ],
        'placeholders' => [
        ],
    ],
    'settings' => [
        'title' => 'تنظیمات',
        'title_plural' => 'تنظیمات',
        'fields' => [
            'key' => 'کلید',
            'value' => 'قیمت',
        ],
        'placeholders' => [
        ],
    ],
    'currencies' => [
        'title' => 'واحد پولی',
        'title_plural' => 'واحد های پولی',
        'fields' => [
            'name' => 'نام',
            'symbol' => 'سمبول',
            'is_active' => 'فعال',
        ],
        'placeholders' => [
        ],
    ],
    'ads' => [
        'title' => 'اعلان',
        'title_plural' => 'اعلانات',
        'fields' => [
            'category_id' => 'دسته بندی',
            'user_id' => 'توسط',
            'title' => 'عنوان',
            'price' => 'قیمت',
            'currency_id' => 'واحد پولی',
            'phone_number' => 'شماره تماس',
            'desc' => 'توضیحات',
            'address' => 'آدرس',
            'district_id' => 'ناحیه',
            'is_published' => 'تایید/نشر شده',
            'media' => 'انتخاب تصاویر',
        ],
        'placeholders' => [
            'category' => 'انتخاب دسته بندی',
            'address_section' => 'آدرس  و ناحیه',
            'photo_section' => 'تصاویر',
            'attribute_values_section' => 'مقدار ویژگی ها',
            'no_user' => 'مهمان',
            'negotiable' => 'توافقی',
        ],
        'relations' => [
            'attributes' => [
                'attribute_id' => 'ویژگی',
                'value' => 'قیمت',
            ],
        ],
        'filters' => [
            'status' => 'وضعیت',
            'status_placeholder' => 'همه وضعیت ها',
            'published' => 'منتشر شده',
            'not_published' => 'منتشر نشده',
            'category' => 'دسته بندی',
            'state' => 'ولایت',
            'district' => 'ناحیه',
            'created_on' => 'ثبت شده در تاریخ',
            'created_from' => 'ثبت شده از تاریخ',
            'created_until' => 'ثبت شده تا تاریخ',
            'chat_status' => 'وضعیت چت',
            'chat_status_placeholder' => 'همه وضعیت ها',
            'chat_enabled' => 'چت فعال است',
            'chat_disabled' => 'چت فعال نیست',
            'updated_on' => 'ویرایش شده در تاریخ',
            'updated_from' => 'ویرایش شده از تاریخ',
            'updated_until' => 'ویرایش شده تا تاریخ',
        ],
    ],
    'attributes' => [
        'title' => 'ویژگی',
        'title_plural' => 'ویژگی ها',
        'fields' => [
            'name' => 'نام',
            'front_end_type' => 'نوع فیلد',
            'is_active' => 'فعال',
        ],
        'placeholders' => [],
    ],
    'attribute_values' => [
        'title' => 'مقدار ویژگی',
        'title_plural' => 'مقادیر ویژگی',
        'fields' => [
            'name' => 'قیمت',
            'attribute_id' => 'ویژگی',
            'is_active' => 'فعال',
        ],
        'placeholders' => [],
        'filters' => [
            'visible' => 'فعال',
            'not_visible' => 'غیر فعال',
        ],
        'relations' => [
            'attribute' => 'ویژگی',
            'value' => 'قیمت',
        ],
    ],
];
