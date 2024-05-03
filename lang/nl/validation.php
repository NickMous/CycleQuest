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

    'accepted' => 'Het :attribute veld moet geaccepteerd worden.',
    'accepted_if' => 'Het :attribute veld moet geaccepteerd worden wanneer :other :value is.',
    'active_url' => 'Het :attribute is geen geldige URL.',
    'after' => 'Het :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'Het :attribute moet een datum zijn na of gelijk aan :date.',
    'alpha' => 'Het :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'Het :attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => 'Het :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'Het :attribute moet een array zijn.',
    'ascii' => 'Het :attribute mag alleen ASCII karakters bevatten.',
    'before' => 'Het :attribute moet een datum zijn voor :date.',
    'before_or_equal' => 'Het :attribute moet een datum zijn voor of gelijk aan :date.',
    'between' => [
        'array' => 'Het :attribute moet tussen :min en :max items bevatten.',
        'file' => 'Het :attribute moet tussen :min en :max kilobytes zijn.',
        'numeric' => 'Het :attribute moet tussen :min en :max zijn.',
        'string' => 'Het :attribute moet tussen :min en :max karakters zijn.',
    ],
    'boolean' => 'Het :attribute veld moet true of false zijn.',
    'can' => 'Het :attribute veld bevat een ongeautoriseerde waarde.',
    'confirmed' => 'De :attribute bevestiging komt niet overeen.',
    'current_password' => 'Het wachtwoord is incorrect.',
    'date' => 'Het :attribute is geen geldige datum.',
    'date_equals' => 'Het :attribute moet een datum zijn gelijk aan :date.',
    'date_format' => 'Het :attribute komt niet overeen met het formaat :format.',
    'decimal' => 'Het :attribute moet :decimal decimalen bevatten.',
    'declined' => 'Het :attribute moet worden afgewezen.',
    'declined_if' => 'Het :attribute moet worden afgewezen wanneer :other :value is.',
    'different' => 'Het :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het :attribute moet :digits cijfers bevatten.',
    'digits_between' => 'Het :attribute moet tussen :min en :max cijfers bevatten.',
    'dimensions' => 'Het :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het :attribute veld heeft een dubbele waarde.',
    'doesnt_end_with' => 'Het :attribute mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => 'Het :attribute mag niet beginnen met een van de volgende: :values.',
    'email' => 'Het :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het :attribute moet eindigen met een van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'Het geselecteerde :attribute is ongeldig.',
    'extensions' => 'Het :attribute moet een van de volgende extensies hebben: :values.',
    'file' => 'Het :attribute moet een bestand zijn.',
    'filled' => 'Het :attribute veld moet een waarde bevatten.',
    'gt' => [
        'array' => 'Het :attribute moet meer dan :value items bevatten.',
        'file' => 'Het :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute moet groter zijn dan :value.',
        'string' => 'Het :attribute moet meer dan :value karakters bevatten.',
    ],
    'gte' => [
        'array' => 'Het :attribute moet :value items of meer bevatten.',
        'file' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value.',
        'string' => 'Het :attribute moet groter zijn dan of gelijk zijn aan :value karakters.',
    ],
    'hex_color' => 'Het :attribute moet een geldige hexadecimale kleur zijn.',
    'image' => 'Het :attribute moet een afbeelding zijn.',
    'in' => 'Het geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het :attribute veld bestaat niet in :other.',
    'integer' => 'Het :attribute moet een geheel getal zijn.',
    'ip' => 'Het :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'Het :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'Het :attribute moet een geldige JSON-string zijn.',
    'lowercase' => 'Het :attribute moet in kleine letters zijn.',
    'lt' => [
        'array' => 'Het :attribute moet minder dan :value items bevatten.',
        'file' => 'Het :attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute moet kleiner zijn dan :value.',
        'string' => 'Het :attribute moet minder dan :value karakters bevatten.',
    ],
    'lte' => [
        'array' => 'Het :attribute mag niet meer dan :value items bevatten.',
        'file' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value.',
        'string' => 'Het :attribute moet kleiner zijn dan of gelijk zijn aan :value karakters.',
    ],
    'mac_address' => 'Het :attribute moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het :attribute mag niet meer dan :max items bevatten.',
        'file' => 'Het :attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het :attribute mag niet groter zijn dan :max.',
        'string' => 'Het :attribute mag niet groter zijn dan :max karakters.',
    ],
    'max_digits' => 'Het :attribute mag niet meer dan :max cijfers bevatten.',
    'mimes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => 'Het :attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'array' => 'Het :attribute moet ten minste :min items bevatten.',
        'file' => 'Het :attribute moet minimaal :min kilobytes zijn.',
        'numeric' => 'Het :attribute moet minimaal :min zijn.',
        'string' => 'Het :attribute moet minimaal :min karakters zijn.',
    ],
    'min_digits' => 'Het :attribute moet minimaal :min cijfers bevatten.',
    'missing' => 'Het :attribute veld moet ontbreken.',
    'missing_if' => 'Het :attribute veld moet ontbreken wanneer :other :value is.',
    'missing_unless' => 'Het :attribute veld moet ontbreken tenzij :other :value is.',
    'missing_with' => 'Het :attribute veld moet ontbreken wanneer :values aanwezig is.',
    'missing_with_all' => 'Het :attribute veld moet ontbreken wanneer :values aanwezig zijn.',
    'multiple_of' => 'Het :attribute moet een veelvoud zijn van :value.',
    'not_in' => 'Het geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het :attribute formaat is ongeldig.',
    'numeric' => 'Het :attribute moet een nummer zijn.',
    'password' => [
        'letters' => 'Het :attribute moet minimaal één letter bevatten.',
        'mixed' => 'Het :attribute moet minimaal één hoofdletter en één kleine letter bevatten.',
        'numbers' => 'Het :attribute moet minimaal één cijfer bevatten.',
        'symbols' => 'Het :attribute moet minimaal één symbool bevatten.',
        'uncompromised' => 'Het opgegeven :attribute is verschenen in een datalek. Kies alstublieft een ander :attribute.',
    ],
    'present' => 'Het :attribute veld moet aanwezig zijn.',
    'present_if' => 'Het :attribute veld moet aanwezig zijn wanneer :other :value is.',
    'present_unless' => 'Het :attribute veld moet aanwezig zijn tenzij :other :value is.',
    'present_with' => 'Het :attribute veld moet aanwezig zijn wanneer :values aanwezig is.',
    'present_with_all' => 'Het :attribute veld moet aanwezig zijn wanneer :values aanwezig zijn.',
    'prohibited' => 'Het :attribute veld is verboden.',
    'prohibited_if' => 'Het :attribute veld is verboden wanneer :other :value is.',
    'prohibited_unless' => 'Het :attribute veld is verboden tenzij :other in :values is.',
    'prohibits' => 'Het :attribute veld verbiedt :other aanwezig te zijn.',
    'regex' => 'Het :attribute formaat is ongeldig.',
    'required' => 'Het :attribute veld is verplicht.',
    'required_array_keys' => 'Het :attribute veld moet invoer bevatten voor: :values.',
    'required_if' => 'Het :attribute veld is verplicht wanneer :other :value is.',
    'required_if_accepted' => 'Het :attribute veld is verplicht wanneer :other is geaccepteerd.',
    'required_unless' => 'Het :attribute veld is verplicht tenzij :other in :values is.',
    'required_with' => 'Het :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => 'Het :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_without' => 'Het :attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het :attribute veld is verplicht wanneer geen van :values aanwezig is.',
    'same' => 'Het :attribute veld moet overeenkomen met :other.',
    'size' => [
        'array' => 'Het :attribute veld moet :size items bevatten.',
        'file' => 'Het :attribute veld moet :size kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet :size zijn.',
        'string' => 'Het :attribute veld moet :size karakters zijn.',
    ],
    'starts_with' => 'Het :attribute veld moet beginnen met een van de volgende: :values.',
    'string' => 'Het :attribute veld moet een string zijn.',
    'timezone' => 'Het :attribute veld moet een geldige tijdzone zijn.',
    'unique' => 'Het :attribute is al in gebruik.',
    'uploaded' => 'Het uploaden van het :attribute is mislukt.',
    'uppercase' => 'Het :attribute veld moet in hoofdletters zijn.',
    'url' => 'Het :attribute veld moet een geldige URL zijn.',
    'ulid' => 'Het :attribute veld moet een geldige ULID zijn.',
    'uuid' => 'Het :attribute veld moet een geldige UUID zijn.',

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

    'attributes' => [
        'password' => 'wachtwoord',
        'email' => 'e-mailadres',
        'name' => 'naam',
        'current_password' => 'huidig wachtwoord',
        'new_password' => 'nieuw wachtwoord',
        'confirm_password' => 'bevestig wachtwoord',
    ],

];
