<?php

return [
    'created_at' => 'تاریخ ایجاد',
    'updated_at' => 'تاریخ ویرایش',
    'expires_at' => 'تاریخ انقضا',
    'delete' => 'حذف',
    'delete_bulk' => 'حذف انتخاب شده',
    'status_helper' => 'در سایت نمایش داده شود یا نه؟',
    'widgets' => [
        'total_num_ads' => 'تعداد آگهی ها',
        'total_num_published_ads' => 'تعداد آگهی های منتشر شده',
        'total_num_not_published_ads' => 'تعداد آگهی های منتشر نشده',
        'num_categories' => 'تعداد دسته بندی ها',
        'num_users' => 'تعداد کاربران',
        'today_num_ads' => 'تعداد آگهی های ثبت شده امروز',
        'today_num_published_ads' => 'تعداد آگهی های منتشر شده امروز',
        'today_num_not_published_ads' => 'تعداد آگهی های منتشر نشده امروز',
        'ads_chart' => 'آگهی ها',
        'ads_published_chart' => 'آگهی های منتشر شده',
        'ads_not_published_chart' => 'آگهی های منتشر نشده',
    ],
    'export' => [
        'bulk_action_button_label' => 'ذخیره سازی یا پشتیبان گیری',
        'file_name_field_label' => 'اسم فایل',
        'format_field_label' => 'فرمت فایل',
        'page_orientation_field_label' => 'جهت گیری صفحه',
        'filters_column_field_label' => 'ستون های موردنیاز',
        'additional_columns_field_label' => 'ستون های اضافی',
        'additional_columns_title_field_label' => 'ستون های اضافی',
        'additional_columns_default_value_field_label' => 'ستون های اضافی',
        'additional_columns_add_button_label' => 'اضافه کردن ستون',
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
            'position' => 'موقعیت نمایش',
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
            'attributes_relation_manager_select' => 'یک ویژگی انتخاب نمائید',
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
            'user' => 'کاربر',
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
            'expired_label' => 'منقضی شده / نشده',
            'expired_placeholder' => 'انتخاب گزینه',
            'expired' => 'منقضی شده',
            'not_expired' => 'منقضی نشده',
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
    'users' => [
        'title' => 'کاربر',
        'title_plural' => 'کاربران',
        'fields' => [
            "name" => "اسم",
            "email" => "ایمیل",
            "email_verified_at" => "ایمیل تایید شده است",
            "password" => "رمز عبور",
            "roles" => "نقش ها",
            "phone" => "شماره تماس",
            "state_id" => "ولایت",
            "phone_verified_at" => "شماره تماس تایید شده است",
            "banned_at" => "وضعیت بلاک",
        ],
        'filters' => [
            'email' => [
                'status' => 'وضعیت تاییدی ایمیل',
                'status_placeholder' => 'همه وضعیت ها',
                "verified" => "تایید شده",
                "unverified" => "تایید نشده",
            ],
            'phone' => [
                'status' => 'وضعیت تاییدی شماره تماس',
                'status_placeholder' => 'همه وضعیت ها',
                "verified" => "تایید شده",
                "unverified" => "تایید نشده",
            ],
            'ban' => [
                'status' => 'وضعیت بلاکی',
                'status_placeholder' => 'همه وضعیت ها',
                "banned" => "بلاک شده",
                "unbanned" => "بلاک نشده",
            ],
        ],
        'actions' => [
            'ban' => [
                'label' => 'بلاک کاربر',
                'plural_label' => 'بلاک کاربران',
                'comment' => 'دلیل؟',
                'expires_at' => 'تاریخ پایان بلاک',
                'permanent' => 'بلاک دائمی',
                'messages' => [
                    'success' => 'کاربر بلاک شد.',
                    'error' => 'عملیات ناموفق بود!',
                    'success_plural' => 'کاربران انتخاب شده بلاک شدند.',
                    'error_plural' => 'عملیات ناموفق بود!',
                ],
            ],
            'unban' => [
                'label' => 'رفع بلاک کاربر',
                'plural_label' => 'رفع بلاک کاربران',
                'messages' => [
                    'success' => 'کاربر رفع بلاک شد.',
                    'error' => 'رفع بلاک کاربر ناموفق بود!',
                    'success_plural' => 'کاربران رفع بلاک شدند.',
                    'error_plural' => 'رفع بلاک کاربر ناموفق بود!',
                ],
            ],
        ],
    ],
    'report_types' => [
        'title' => 'نوع گزارش',
        'title_plural' => 'انواع گزارش',
        'fields' => [
            'name' => 'نام',
            'description' => 'توضیحات',
            'is_active' => 'فعال',
        ],
        'placeholders' => [

        ],
        'filters' => [
            'is_active' => [
                'status' => 'وضعیت فعال بودن',
                'status_placeholder' => 'همه وضعیت ها',
                "is_active" => "فعال",
                "is_inactive" => "غیرفعال",
            ],
        ],
    ],
    'reports' => [
        'title' => 'گزارش',
        'title_plural' => 'گزارشات',
        'fields' => [
            'ad_id' => 'آگهی',
            'user_id' => 'کاربر',
            'report_type_id' => 'نوع گزارش',
            'description' => 'توضیحات',
            'status' => 'وضعیت',
            'is_active' => 'فعال',
        ],
        'placeholders' => [

        ],
        'filters' => [
            'user' => [
                'label' => 'کاربر',
                'label_placeholder' => 'تمام کاربران',
            ],
            'ad' => [
                'label' => 'آگهی',
                'label_placeholder' => 'همه آگهی ها',
            ],
            'report_type' => [
                'label' => 'نوع گزارش',
                'label_placeholder' => 'همه انواع گزارش',
            ],
            'is_active' => [
                'label' => 'وضعیت فعال بودن',
                'label_placeholder' => 'همه وضعیت ها',
                "is_active" => "فعال",
                "is_inactive" => "غیرفعال",
            ],
        ],
    ],
    // Blog
    'blog_categories' => [
        'title' => 'دسته بندی بلاگ',
        'title_plural' => 'دسته بندی های بلاگ',
        'fields' => [
            'name' => 'نام',
            'slug' => 'اسلاگ',
            'description' => 'توضیحات',
            'is_visible' => 'وضعیت نمایش',
            'position' => 'موقعیت نمایش',
        ],
        'filters' => [
            'status' => 'وضعیت',
            'status_placeholder' => 'همه وضعیت ها',
            'visible' => 'فعال',
            'not_visible' => 'غیر فعال',
        ],
        'relations' => [
            'post' => 'پست',
            'posts' => 'پست ها',
        ],
        'placeholder' => [
            'is_visible' => 'آیا در سایت نمایش داده شود؟',
        ],
    ],
    'blog_posts' => [
        'title' => 'نوشته بلاگ',
        'title_plural' => 'نوشته های بلاگ',
        'fields' => [
            'category_id' => 'دسته بندی',
            'user_id' => 'توسط',
            'title' => 'عنوان',
            'slug' => 'اسلاگ',
            'content' => 'توضیحات',
            'published_at' => 'نشر شده',
            'media' => 'انتخاب تصاویر',
            'tags' => 'تگ ها',
        ],
        'placeholders' => [
            'category' => 'انتخاب دسته بندی',
            'address_section' => 'آدرس  و ناحیه',
            'photo_section' => 'تصاویر',
            'no_user' => 'مهمان',
            'tags' => 'با کامه (،) تگ وارد شده را اضافه کنید.',
        ],
        'filters' => [
            'status' => 'وضعیت',
            'status_placeholder' => 'همه وضعیت ها',
            'published' => 'منتشر شده',
            'not_published' => 'منتشر نشده',
            'category' => 'دسته بندی',
            'user' => 'کاربر',
        ],
    ],
];
