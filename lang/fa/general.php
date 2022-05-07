<?php

return [
	'created_at' => 'تاریخ ایجاد',
	'updated_at' => 'تاریخ ویرایش',
	'delete' => 'حذف',
	'delete_bulk' => 'حذف انتخاب شده',
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
			'visible' => 'فعال',
			'not_visible' => 'غیر فعال',
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
];
