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

    'nav.group' => 'کاربران و نقش ها',
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

    /**
     * Role Setting Page
     */
    'page' => [
        'name' => 'تنظیمات',
        'icon' => 'heroicon-o-adjustments',
        'save' => 'ذخیره',
        'generate' => 'ذخیره و تولید',
        'load_default_settings' => 'بارگزاری تنظیمات اولیه',
        'cancel' => 'لغو',
    ],
    'labels.super_admin.toggle_input' => 'دسترسی سوپر ادمین',
    'labels.super_admin.text_input' => 'نام نقش',
    'labels.filament_user.toggle_input' => 'نقش کاربر عادی',
    'labels.filament_user.text_input' => 'نام نقش',
    'labels.role_policy.toggle_input' => 'پالیسی نقش در سیستم ثبت شود؟',
    'labels.role_policy.message' => 'از ثبت شدن پالسی دسترسی در سیستم مطمئن شوید!',
    'labels.prefixes.placeholder' => 'پیشوند های دسترسی های پیش فرض',
    'labels.prefixes.resource' => 'صفحات ادمین',
    'labels.prefixes.resource.placeholder' => 'حذف یا اضافه کردن نقش های صفحات ادمین...',
    'labels.prefixes.page' => 'صفحه',
    'labels.prefixes.widget' => 'ویجت',
    'labels.entities.placeholder' => 'وجودی تولید نقش ها و تب ها',
    'labels.entities.message' => 'تولید کننده گان و تب ها ',
    'labels.entities.resources' => 'صفحات ادمین',
    'labels.entities.pages' => 'صفحات',
    'labels.entities.widgets' => 'ویجت ها',
    'labels.entities.custom_permissions' => 'دسترسی ها سفارشی',
    'labels.entities.custom_permissions.message' => 'تب ',
    'labels.status.enabled' => 'فعال است',
    'labels.status.disabled' => 'غیرفعال است',
    'labels.status.yes' => 'بله',
    'labels.status.no' => 'نخیر',
    'labels.exclude.placeholder' => 'حالت استثنا',
    'labels.exclude.message' => 'با فعال سازی حالت استثنا شما به تولید کننده دسترسی ها فرمان میدهید که دسترسی ها را برای وجودی هایی که انتخاب نموده اید، رد کند',
    'labels.exclude.resources' => 'صفحات ادمین',
    'labels.exclude.resources.placeholder' => 'صفحات ادمین را انتخاب کنید ...',
    'labels.exclude.pages' => 'صفحات',
    'labels.exclude.pages.placeholder' => 'صفحات را انتخاب کنید ...',
    'labels.exclude.widgets' => 'ویجت ها',
    'labels.exclude.widgets.placeholder' => 'ویجت ها را انتخاب کنید...',

    /**
     * Messages
     */
    'forbidden' => 'شما دسترسی کافی برای این صفحه را ندارید!',
    'update' => 'تنظیمات محافظ سیستم نوسازی شد.',
    'generate' => 'تنظیمات محافظ سیستم نوسازی و دسترسی ها بدون پالیسی ها تولید شد.',
    'loaded_default_settings' => 'تنظیمات اولیه بارگزاری شد.',

    /**
     * Resource Permissions
     */
    'resource_permission_prefixes_labels' => [
        'view' => 'نمایش',
        'view_any' => 'نمایش همه',
        'create' => 'ایجاد',
        'update' => 'ویرایش',
        'delete' => 'حذف',
        'delete_any' => 'حذف همه',
        'export' => 'پشتیبان گیری',
    ],
];
