<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Linie języka walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie języka zawierają domyślne komunikaty błędów używane przez
    | klasę walidatora. Niektóre z tych reguł mają wiele wersji, takie jak
    | reguły rozmiaru. Możesz swobodnie dostosować każdą z tych wiadomości tutaj.
    |
    */

    'accepted' => 'Pole musi zostać zaakceptowane.',
    'accepted_if' => 'Pole musi zostać zaakceptowane, gdy :other jest :value.',
    'active_url' => 'Pole nie jest prawidłowym adresem URL.',
    'after' => 'Pole musi być datą po :date.',
    'after_or_equal' => 'Pole musi być datą nie wcześniejszą niż :date.',
    'alpha' => 'Pole może zawierać tylko litery.',
    'alpha_dash' => 'Pole może zawierać tylko litery, cyfry, myślniki i podkreślenia.',
    'alpha_num' => 'Pole może zawierać tylko litery i cyfry.',
    'array' => 'Pole musi być tablicą.',
    'before' => 'Pole musi być datą przed :date.',
    'before_or_equal' => 'Pole musi być datą nie późniejszą niż :date.',
    'between' => [
        'numeric' => 'Pole musi zawierać się w przedziale od :min do :max.',
        'file' => 'Plik musi mieć rozmiar od :min do :max kilobajtów.',
        'string' => 'Pole musi mieć od :min do :max znaków.',
        'array' => 'Pole musi mieć od :min do :max elementów.',
    ],
    'boolean' => 'Pole musi być prawdą lub fałszem.',
    'confirmed' => 'Potwierdzenie pola nie zgadza się.',
    'current_password' => 'Hasło jest nieprawidłowe.',
    'date' => 'Pole nie jest prawidłową datą.',
    'date_equals' => 'Pole musi być datą równą :date.',
    'date_format' => 'Pole nie zgadza się z formatem :format.',
    'different' => 'Pole i :other muszą być różne.',
    'digits' => 'Pole musi mieć :digits cyfr.',
    'digits_between' => 'Pole musi mieć od :min do :max cyfr.',
    'dimensions' => 'Pole ma nieprawidłowe wymiary obrazu.',
    'distinct' => 'Pole ma zduplikowaną wartość.',
    'email' => 'Pole musi być prawidłowym adresem e-mail.',
    'ends_with' => 'Pole musi kończyć się jednym z następujących: :values.',
    'exists' => 'Wybrane pole jest nieprawidłowe.',
    'file' => 'Pole musi być plikiem.',
    'filled' => 'Pole musi mieć wartość.',
    'gt' => [
        'numeric' => 'Pole musi być większe niż :value.',
        'file' => 'Plik musi być większy niż :value kilobajtów.',
        'string' => 'Pole musi mieć więcej niż :value znaków.',
        'array' => 'Pole musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => 'Pole musi być większe lub równe :value.',
        'file' => 'Plik musi mieć rozmiar równy lub większy niż :value kilobajtów.',
        'string' => 'Pole musi mieć :value lub więcej znaków.',
        'array' => 'Pole musi mieć :value lub więcej elementów.',
    ],
    'image' => 'Pole musi być obrazem.',
    'in' => 'Wybrane pole jest nieprawidłowe.',
    'in_array' => 'Pole nie istnieje w :other.',
    'integer' => 'Pole musi być liczbą całkowitą.',
    'ip' => 'Pole musi być prawidłowym adresem IP.',
    'ipv4' => 'Pole musi być prawidłowym adresem IPv4.',
    'ipv6' => 'Pole musi być prawidłowym adresem IPv6.',
    'json' => 'Pole musi być prawidłowym łańcuchem znaków JSON.',
    'lt' => [
        'numeric' => 'Pole musi być mniejsze niż :value.',
        'file' => 'Plik musi być mniejszy niż :value kilobajtów.',
        'string' => 'Pole musi mieć mniej niż :value znaków.',
        'array' => 'Pole musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => 'Pole musi być mniejsze lub równe :value.',
        'file' => 'Plik musi mieć rozmiar równy lub mniejszy niż :value kilobajtów.',
        'string' => 'Pole musi mieć :value lub mniej znaków.',
        'array' => 'Pole nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => 'Pole nie może być większe niż :max.',
        'file' => 'Plik nie może być większy niż :max kilobajtów.',
        'string' => 'Pole nie może mieć więcej niż :max znaków.',
        'array' => 'Pole nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => 'Plik musi być typu: :values.',
    'mimetypes' => 'Pole musi być plikiem typu: :values.',
    'min' => [
        'numeric' => 'Pole musi być co najmniej :min.',
        'file' => 'Plik musi mieć co najmniej :min kilobajtów.',
        'string' => 'Pole musi mieć co najmniej :min znaków.',
        'array' => 'Pole musi mieć co najmniej :min elementów.',
    ],
    'multiple_of' => 'Pole musi być wielokrotnością :value.',
    'not_in' => 'Wybrane pole jest nieprawidłowe.',
    'not_regex' => 'Format pola jest nieprawidłowy.',
    'numeric' => 'Pole musi być liczbą.',
    'password' => 'Hasło jest nieprawidłowe.',
    'present' => 'Pole musi być obecne.',
    'prohibited' => 'Pole jest zabronione.',
    'prohibited_if' => 'Pole jest zabronione, gdy :other jest :value.',
    'prohibited_unless' => 'Pole jest zabronione, chyba że :other jest w :values.',
    'prohibits' => 'Pole zabrania obecności :other.',
    'regex' => 'Format pola jest nieprawidłowy.',
    'required' => 'Pole  jest wymagane.',
    'required_if' => 'Pole jest wymagane, gdy :other jest :value.',
    'required_unless' => 'Pole jest wymagane, chyba że :other jest w :values.',
    'required_with' => 'Pole jest wymagane, gdy :values jest obecne.',
    'required_with_all' => 'Pole jest wymagane, gdy :values są obecne.',
    'required_without' => 'Pole jest wymagane, gdy :values nie jest obecne.',
    'required_without_all' => 'Pole jest wymagane, gdy żadne z :values nie są obecne.',
    'same' => 'Pole i :other muszą się zgadzać.',
    'size' => [
        'numeric' => 'Pole musi mieć :size.',
        'file' => 'Plik musi mieć :size kilobajtów.',
        'string' => 'Pole musi mieć :size znaków.',
        'array' => 'Pole musi zawierać :size elementów.',
    ],
    'starts_with' => 'Pole musi zaczynać się jednym z następujących: :values.',
    'string' => 'Pole musi być ciągiem znaków.',
    'timezone' => 'Pole musi być prawidłową strefą czasową.',
    'unique' => 'Pole zostało już zajęte.',
    'uploaded' => 'Nie udało się przesłać pliku :attribute.',
    'url' => 'Format pola jest nieprawidłowy.',
    'uuid' => 'Pole musi być prawidłowym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Linie języka walidacji niestandardowej
    |--------------------------------------------------------------------------
    |
    | Tutaj możesz określić niestandardowe komunikaty walidacji dla atrybutów
    | przy użyciu konwencji "attribute.rule", aby nazwać linie. Ułatwia to
    | określenie konkretnego komunikatu niestandardowego dla danej reguły atrybutu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Niestandardowe atrybuty walidacji
    |--------------------------------------------------------------------------
    |
    | Poniższe linie języka są używane do zamiany symboli zastępczych atrybutów
    | na coś bardziej przyjaznego dla czytelnika, takiego jak "Adres E-Mail"
    | zamiast "email". Dzięki temu nasze komunikaty są nieco bardziej czytelne.
    |
    */

    'attributes' => [],

];
