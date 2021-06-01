<?php

return [

    /*
    | Laravel 6 VALIDATION TR DIL
    |--------------------------------------------------------------------------
    | Emrah Yüksel -> https://www.emrahyuksel.com.tr
    | Doğrulama Dil Satırları
    |--------------------------------------------------------------------------
    | Aşağıda yer alan dil satırları, önceden kullanılan varsayılan hata mesajlarını içerir.
    | Buradaki mesajları kendinize göre özelleştirebilirsiniz.
    */

    "accepted" => ":attribute kabul edilmelidir.",
    "active_url" => ":attribute geçerli bir URL olmalıdır.",
    "after" => ":attribute şundan daha eski bir tarih olmalıdır :date.",
    "alpha" => ":attribute sadece harflerden oluşmalıdır.",
    "alpha_dash" => ":attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.",
    "alpha_num" => ":attribute sadece harfler ve rakamlar içermelidir.",
    "array" => ":attribute dizi olmalıdır.",
    "before" => ":attribute şundan daha önceki bir tarih olmalıdır :date.",
    'before_or_equal' => ':attribute şu tarihe eşit yada önceki bir tarih olmalıdır :date.',
    "between" => array(
        "numeric" => ":attribute :min - :max arasında olmalıdır.",
        "file" => ":attribute :min - :max arasındaki kilobayt değeri olmalıdır.",
        "string" => ":attribute :min - :max arasında karakterden oluşmalıdır.",
        "array" => ":attribute :min - :max arasında nesneye sahip olmalıdır."
    ),
    'boolean' => ':attribute TRUE ya da FALSE içeren bir değer olmalıdır',
    "confirmed" => ":attribute tekrarı eşleşmiyor.",
    "date" => ":attribute geçerli bir tarih olmalıdır.",
    "date_format" => ":attribute :format biçimi ile eşleşmiyor.",
    "different" => ":attribute ile :other birbirinden farklı olmalıdır.",
    "digits" => ":attribute :digits rakam olmalıdır.",
    "digits_between" => ":attribute :min ile :max arasında rakam olmalıdır.",
    'dimensions' => ':attribute resim boyutları geçersiz.',
    'distinct' => ':attribute değeri yineleniyor.',
    "email" => ":attribute biçimi geçersiz.",
    'ends_with' => ':attribute şunlardan biri ile bitmelidir :values',
    "exists" => "Seçili :attribute geçersiz.",
    'file' => ':attribute bir dosya olmalıdır',
    'filled' => ':attribute bir değere sahip olmalı.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    "image" => ":attribute alanı resim dosyası olmalıdır.",
    "in" => ":attribute değeri geçersiz.",
    'in_array' => ':attribute şunların :other. içinde mevcut değil.',
    "integer" => ":attribute rakam olmalıdır.",
    "ip" => ":attribute geçerli bir IP adresi olmalıdır.",
    'ipv4' => ':attribute geçerli bir IPv4 adresi olmalı.',
    'ipv6' => ':attribute geçerli bir IPv6 adresi olmalı.',
    'json' => ':attribute geçerli bir JSON dizisi olmalı.',
    'lt' => [
        'numeric' => ':attribute şunlardan :value. küçük olmalıdır.',
        'file' => ':attribute şunlardan kilobytes olarak :value küçük olmalıdır.',
        'string' => ':attribute şunlardan karakter olarak  :value küçük olmalıdır.',
        'array' => ':attribute şunlardan  :value  fazla olmamalı',
    ],
    'lte' => [
        'numeric' => ':attribute şunlardan numeric olarak :value. küçük veya eşit olmalıdır.',
        'file' => ':attribute şunlardan kilobytes olarak :value küçük veya eşit olmalıdır.',
        'string' => ':attribute şunlardan karakter olarak  :value küçük veya eşit olmalıdır.',
        'array' => ':attribute şunlardan fazla olmamalı :value .',
    ],
    'max' => [
        "numeric" => ":attribute değeri :max değerinden küçük olmalıdır.",
        "file" => ":attribute değeri :max kilobayt değerinden küçük olmalıdır.",
        "string" => ":attribute değeri :max karakter değerinden küçük olmalıdır.",
        "array" => ":attribute değeri :max adedinden az nesneye sahip olmalıdır."
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => ':attribute bir dosya olmalı: :values.',
    'min' => [
        "numeric" => ":attribute değeri :min değerinden büyük olmalıdır.",
        "file" => ":attribute değeri :min kilobayt değerinden büyük olmalıdır.",
        "string" => ":attribute değeri :min karakter değerinden büyük olmalıdır.",
        "array" => ":attribute en az :min nesneye sahip olmalıdır."
    ],
    "not_in" => "Seçili :attribute geçersiz.",
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute sayı olmalıdır.',
    'present' => ':attribute mevcut değil.',
    'regex' => ':attribute geçersiz format.',
    "required" => ":attribute alanı gereklidir.",
    "required_if" => ":attribute alanı, :other :value değerine sahip olduğunda zorunludur.",
    'required_unless' => ':attribute diğerlerin unless :other olmadığında zorunludur :values.',
    "required_with" => ":attribute alanı :values varken zorunludur.",
    "required_with_all" => ":attribute alanı :values varken zorunludur.",
    "required_without" => ":attribute alanı :values yokken zorunludur.",
    "required_without_all" => ":attribute alanı :values yokken zorunludur.",
    "same" => ":attribute ile :other eşleşmelidir.",
    'size' => [
        "numeric" => ":attribute :size olmalıdır.",
        "file" => ":attribute :size kilobyte olmalıdır.",
        "string" => ":attribute :size karakter olmalıdır.",
        "array" => ":attribute :size nesneye sahip olmalıdır."
    ],
    'starts_with' => ':attribute şunlardan biri ile başlamalıdır: :values',
    'string' => ':attribute bir dize (string) değer olmalıdır.',
    'timezone' => ':attribute geçersiz bölge.',
    "unique" => ":attribute benzer kayıt mevcut.",
    'uploaded' => ':attribute yükleme başarısız.',
    "url" => ":attribute biçimi geçersiz.",
    'uuid' => 'The :attribute must be a valid UUID.',

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
