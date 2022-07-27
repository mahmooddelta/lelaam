<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Columns
    |--------------------------------------------------------------------------
    */

    'column.name' => 'نام',
    'column.guard_name' => 'اسم گارد',
    'column.roles' => 'نقش ها',
    'column.permissions' => 'دسترسی ها',
    'column.updated_at' => 'ویرایش شده در',

    /*
    |--------------------------------------------------------------------------
    | Form Fields
    |--------------------------------------------------------------------------
    */

    'field.name' => 'اسم',
    'field.guard_name' => 'اسم گارد',
    'field.permissions' => 'دسترسی ها',
    'field.select_all.name' => 'انتخاب همه',
    'field.select_all.message' => 'تمام دسترسی های فعلی را برای این نقش  <span class="text-primary font-medium">فعال</span> کن',

    /*
    |--------------------------------------------------------------------------
    | Navigation & Resource
    |--------------------------------------------------------------------------
    */

    'nav.group' => 'سپر محافظتی سیستم',
    'nav.role.label' => 'نقش ها',
    'nav.role.icon' => 'heroicon-o-shield-check',
    'resource.label.role' => 'نقش',
    'resource.label.roles' => 'نقش ها',

    /*
    |--------------------------------------------------------------------------
    | Section & Tabs
    |--------------------------------------------------------------------------
    */

    'section' => 'وجودی ها',
    'resources' => 'منابع',
    'widgets' => 'ویجت ها',
    'pages' => 'صفحات',
    'custom' => 'دسترسی ها سفارشی',

    /*
    |--------------------------------------------------------------------------
    | Shield Settings Page
    |--------------------------------------------------------------------------
    */

    'page' => [
        'name' => 'تنظیمات',
        'icon' => 'heroicon-o-adjustments',
        'save' => 'ذخیره',
        'generate' => 'ذخیره و تولید',
        'load_default_settings' => 'بارگزاری تنظیمات اولیه',
        'cancel' => 'لغو',
    ],

    'settings' => [
        'enabled' => false,
        'label' => 'صفحه تنظیمات',
        'helper_text' => 'فعال یا غیرفعال سازی صفحه تنظیمات. قابل دسترس فقط برای سوپرادمین.',
        'navigation_label' => 'تنظیمات',

        'generator_options' => [
            'policies_and_permissions' => 'تولید پالیسی و دسترسی ها',
            'policies' => 'فقط پالیسی ها تولید شود',
            'permissions' => 'فقط دسترسی ها تولید شود',
        ],

        'auth_provider' => [
            'label' => 'مدل ارائه دهنده Auth',
            'helper_text' => 'اسم کامل کلاس مدل برای تولید پالیسی ها استفاده میشود.',
        ],

        'resource' => [
            'name' => 'منبع ارائه دهنده سپر محافظتی سیستم',
            'slug' => 'اسلاگ',
            'navigation_sort' => 'موقعیت قرار گیری در منو',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | MISC Labels
    |--------------------------------------------------------------------------
    */

    'labels.super_admin.toggle_input' => 'نقش سوپرادمین',
    'labels.super_admin.text_input' => 'اسم نقش',
    'labels.filament_user.toggle_input' => 'نقش کاربر عادی',
    'labels.filament_user.text_input' => 'اسم نقش',
    'labels.role_policy.toggle_input' => 'پالیسی نقش در سیستم ثبت شود؟',
    'labels.role_policy.message' => 'از ثبت شدن پالسی دسترسی در سیستم مطمئن شوید!',
    'labels.permission_prefixes.placeholder' => 'پیشوند های دسترسی های پیش فرض',
    'labels.permission_prefixes.resource' => 'منبع',
    'labels.permission_prefixes.resource.placeholder' => 'حذف یا اضافه کردن نقش های صفحات ادمین...',
    'labels.permission_prefixes.page' => 'صفحه',
    'labels.permission_prefixes.widget' => 'ویجت',
    'labels.entities.placeholder' => 'تب ها و تولید کننده گان دسترسی های وجودی',
    'labels.entities.message' => 'تولید کننده گان و تب های ',
    'labels.entities.resources' => 'منابع',
    'labels.entities.pages' => 'صفحات',
    'labels.entities.widgets' => 'ویجت ها',
    'labels.entities.custom_permissions' => 'دسترسی های سفارشی',
    'labels.entities.custom_permissions.message' => 'تب ',
    'labels.status.enabled' => 'فعال',
    'labels.status.disabled' => 'غیرفعال',
    'labels.status.yes' => 'بله',
    'labels.status.no' => 'نخیر',
    'labels.exclude.placeholder' => 'حالت استثنا',
    'labels.exclude.message' => 'با فعال سازی حالت استثنا شما به تولید کننده دسترسی ها فرمان میدهید که دسترسی ها را برای وجودی هایی که انتخاب نموده اید، رد کند',
    'labels.exclude.resources' => 'منابع',
    'labels.exclude.resources.placeholder' => 'منابع موردنظر را انتخاب نمائید ...',
    'labels.exclude.pages' => 'صفخات',
    'labels.exclude.pages.placeholder' => 'صفحات موردنظر را انتخاب نمائید ...',
    'labels.exclude.widgets' => 'ویجت ها',
    'labels.exclude.widgets.placeholder' => 'ویجت های موردنظر را انتخاب نمائید ...',

    /*
    |--------------------------------------------------------------------------
    | Messages
    |--------------------------------------------------------------------------
    */

    'forbidden' => 'شما دسترسی کافی برای این صفحه را ندارید!',
    'update' => 'تنظیمات محافظ سیستم نوسازی شد.',
    'generate' => 'تنظیمات محافظ سیستم نوسازی و دسترسی ها بدون پالیسی ها تولید شد.',
    'loaded_default_settings' => 'تنظیمات اولیه بارگزاری شد.',

    /*
    |--------------------------------------------------------------------------
    | Resource Permissions' Labels
    |--------------------------------------------------------------------------
    */

    'resource_permission_prefixes_labels' => [
        'view' => 'نمایش',
        'view_any' => 'دیدن صفحه',
        'create' => 'ایجاد',
        'update' => 'ویرایش',
        'delete' => 'حذف',
        'delete_any' => 'حذف همه',
        'export' => 'پشتیبان گیری',
        'import' => 'بازگردانی پشتیبان',
        'force_delete' => 'حذف کامل از سیستم',
        'force_delete_any' => 'حذف کامل همه از سیستم',
        'restore' => 'بازگرداندن',
        'restore_any' => 'بازگرداندن همه',
        'replicate' => 'کپی کردن',
    ],
];
