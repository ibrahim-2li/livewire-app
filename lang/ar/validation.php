<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other يساوي :value.',
    'active_url' => ':attribute ليس رابطاً صحيحاً.',
    'after' => 'يجب أن يكون :attribute تاريخاً لاحقاً للتاريخ :date.',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن لا يحتوي :attribute سوى على حروف وأرقام.',
    'array' => 'يجب أن يكون :attribute ًمصفوفة.',
    'ascii' => 'يجب أن يحتوي :attribute على رموز وحروف من نوع ASCII فقط.',
    'before' => 'يجب أن يكون :attribute تاريخاً سابقاً للتاريخ :date.',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخاً سابقاً أو مطابقاً للتاريخ :date.',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max.',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false .',
    'can' => 'يحتوي الحقل :attribute على قيمة غير مصرح بها.',
    'confirmed' => 'حقل التأكيد غير مطابق للحقل :attribute.',
    'contains' => 'الحقل :attribute يفتقد إلى قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ':attribute ليس تاريخاً صحيحاً.',
    'date_equals' => 'يجب أن يكون :attribute تاريخاً مطابقاً للتاريخ :date.',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'decimal' => 'يجب أن يحتوي :attribute على :decimal خانات عشرية.',
    'declined' => 'يجب رفض :attribute.',
    'declined_if' => 'يجب رفض :attribute عندما يكون :other يساوي :value.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مختلفين.',
    'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي :attribute على عدد من الأرقام بين :min و :max.',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مكررة.',
    'doesnt_end_with' => 'يجب ألا ينتهي الحقل :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'يجب ألا يبدأ الحقل :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البنية.',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values.',
    'enum' => 'قيمة :attribute المختارة غير صالحة.',
    'exists' => 'قيمة :attribute المختارة غير صالحة.',
    'extensions' => 'يجب أن يكون امتداد :attribute أحد الامتدادات التالية: :values.',
    'file' => 'يجب أن يكون :attribute ملفاً.',
    'filled' => ':attribute إجباري.',
    'gt' => [
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'string' => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرف.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل على :value عُنصراً/عناصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'string' => 'يجب أن يكون طول النّص :attribute على الأقل :value حروفٍ/حرف.',
    ],
    'hex_color' => 'يجب أن يكون :attribute لونًا سداسيًا عشريًا صالحًا.',
    'image' => 'يجب أن يكون :attribute صورةً.',
    'in' => 'قيمة :attribute المختارة غير صالحة.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عدداً صحيحاً.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحاً.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحاً.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحاً.',
    'json' => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'list' => 'يجب أن يكون :attribute قائمة.',
    'lowercase' => 'يجب أن يكون :attribute حروفاً صغيرة.',
    'lt' => [
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'string' => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرف.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرف.',
    ],
    'mac_address' => 'يجب أن يكون :attribute عنوان MAC صحيحاً.',
    'max' => [
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن لا تكون قيمة :attribute أكبر من :max.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرف.',
    ],
    'max_digits' => 'يجب ألا يحتوي :attribute على أكثر من :max أرقام.',
    'mimes' => 'يجب أن يكون ملفاً من نوع: :values.',
    'mimetypes' => 'يجب أن يكون ملفاً من نوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصراً/عناصر.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'string' => 'يجب أن يكون طول النّص :attribute على الأقل :min حروفٍ/حرف.',
    ],
    'min_digits' => 'يجب أن يحتوي :attribute على :min أرقام على الأقل.',
    'missing' => 'يجب أن يكون الحقل :attribute مفقودًا.',
    'missing_if' => 'يجب أن يكون الحقل :attribute مفقودًا عندما يكون :other يساوي :value.',
    'missing_unless' => 'يجب أن يكون الحقل :attribute مفقودًا إلا إذا كان :other يساوي :value.',
    'missing_with' => 'يجب أن يكون الحقل :attribute مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => 'يجب أن يكون الحقل :attribute مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => 'يجب أن يكون :attribute مضاعفاً لـ :value.',
    'not_in' => 'قيمة :attribute المختارة غير صالحة.',
    'not_regex' => 'صيغة :attribute غير صحيحة.',
    'numeric' => 'يجب أن يكون :attribute رقماً.',
    'password' => [
        'letters' => 'يجب أن يحتوي :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي :attribute على حرف كبير واحد وحرف صغير واحد على الأقل.',
        'numbers' => 'يجب أن يحتوي :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'لقد ظهر :attribute في تسريب بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present' => 'يجب تقديم :attribute.',
    'present_if' => 'يجب تقديم :attribute عندما يكون :other يساوي :value.',
    'present_unless' => 'يجب تقديم :attribute إلا إذا كان :other يساوي :value.',
    'present_with' => 'يجب تقديم :attribute عندما يكون :values موجوداً.',
    'present_with_all' => 'يجب تقديم :attribute عندما تكون :values موجودة.',
    'prohibited' => 'الحقل :attribute محظور.',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other يساوي :value.',
    'prohibited_if_accepted' => 'الحقل :attribute محظور عندما يكون :other مقبولاً.',
    'prohibited_if_declined' => 'الحقل :attribute محظور عندما يكون :other مرفوضاً.',
    'prohibited_unless' => 'الحقل :attribute محظور إلا إذا كان :other في :values.',
    'prohibits' => 'الحقل :attribute يحظر وجود :other.',
    'regex' => 'صيغة :attribute غير صحيحة.',
    'required' => 'الحقل :attribute مطلوب.',
    'required_array_keys' => 'يجب أن يحتوي الحقل :attribute على مدخلات لـ: :values.',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_if_accepted' => 'الحقل :attribute مطلوب عندما يكون :other مقبولاً.',
    'required_if_declined' => 'الحقل :attribute مطلوب عندما يكون :other مرفوضاً.',
    'required_unless' => 'الحقل :attribute مطلوب إلا إذا كان :other في :values.',
    'required_with' => 'الحقل :attribute مطلوب عندما يكون :values موجوداً.',
    'required_with_all' => 'الحقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'الحقل :attribute مطلوب عندما لا يكون :values موجوداً.',
    'required_without_all' => 'الحقل :attribute مطلوب عندما لا يكون أي من :values موجوداً.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط.',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'string' => 'يجب أن يكون طول النّص :attribute :size حروفٍ/حرف.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ :attribute.',
    'uppercase' => 'يجب أن يكون :attribute حروفاً كبيرة.',
    'url' => 'صيغة الرابط :attribute غير صحيحة.',
    'ulid' => 'يجب أن يكون :attribute ULID صالحًا.',
    'uuid' => 'يجب أن يكون :attribute UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
