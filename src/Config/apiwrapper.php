<?php

return [

    /**
     * Configuration key: localization
     *
     * Determines whether to translate messages in API responses.
     *
     * - If set to true, the message field will always be translated in the API responses.
     */
    'localization' => true,

    /**
     * Configuration key: fields
     *
     * The fields array defines which fields should be included or excluded in the API responses
     *
     * - Each field is a string that represents the name of the field
     * - Each value is a boolean that indicates whether the field should be included (true) or excluded (false)
     */
    'fields' => [

        /**
         * Configuration key: fields.data
         *
         * Determines whether to include the data filed in failed API responses.
         *
         * - If set to true, the data field will always be included in the API responses.
         * - If set to false, the data field will be included in the success API responses.
         */
        'data' => true,

        /**
         * Configuration key: fields.errors
         *
         * Determines whether to include the errors filed in success API responses.
         *
         * - If set to true, the error field will always be included in the API responses.
         * - If set to false, the error field will be included in the failed API responses.
         */
        'errors' => true,

        /**
         * Configuration key: fields.execution
         *
         * Determines whether to include the execution time in milliseconds in API responses.
         *
         * - If set to true, the execution time will be included in the API responses.
         * - If set to false, the execution time will not be included in the API responses.
         * - If set to callable function, return of function will bew include in the API responses as execution.
         */
        'execution' => true,

        /**
         * Configuration key: fields.version
         *
         * Determines whether to include the app version in API responses (calculated by: env(APP_VERSION)).
         *
         * - If set to true, the app version be included in the API responses.
         * - If set to false, the app version will not be included in the API responses.
         * - If set to callable function, return of function will bew include in the API responses as execution.
         */
        'version' => true,

    ],

    /**
     * Configuration key: replaces
     *
     * The replaces array defines which fields should be renamed in the API responses
     *
     * - Each field is a string that represents the original name of the field
     * - Each value is a string that represents the new name of the field
     */
    'replaces' => [


        /**
         * Configuration key: replaces.status
         *
         * Wrapper key of status HTTP code in API responses.
         */
        'status' => 'status',


        /**
         * Configuration key: replaces.message
         *
         * Wrapper key of message (default: HTTP status title) in API responses.
         */
        'message' => 'message',

        /**
         * Configuration key: replaces.data
         *
         * Wrapper key of data in success API responses.
         */
        'data' => 'data',

        /**
         * Configuration key: replaces.errors
         *
         * Wrapper key of errors in failed API responses.
         */
        'errors' => 'errors',

        /**
         * Configuration key: replaces.execution
         *
         * Wrapper key of execution time in API responses.
         */
        'execution' => 'execution',

        /**
         * Configuration key: replaces.version
         *
         * Wrapper key of app version in API responses.
         */
        'version' => 'version',

    ],

    /**
     * Configuration key: custom_keys
     *
     * An array of custom keys that`s append in API Responses.
     *
     * - The key of each item is key name in the API response.
     * - The value of each item can be callable function or any type of php variables.
     * - if value is callable, mixed $content, int $status, string $message arguments will be pass to it.
     */
    'custom_keys' => [

    ],

    /**
     * Configuration key: methods
     *
     * An array of HTTP responses in camelCase format as PHP arrays.
     *
     * - The key of each method is a callable function in the APIResponse class that returns
     * a response with code as the HTTP status code and message as the HTTP status message.
     */
    'methods' => [

        'ok' => [
            'code' => 200,
            'message' => 'OK',
        ],

        /**
         * Helper method
         *
         * - Alias of HTTP OK
         */
        'success' => [
            'code' => 200,
            'message' => 'Success',
        ],

        'created' => [
            'code' => 201,
            'message' => 'Created',
        ],

        'accepted' => [
            'code' => 202,
            'message' => 'Accepted',
        ],

        'nonAuthoritativeInformation' => [
            'code' => 203,
            'message' => 'Non Authoritative Information',
        ],

        'noContent' => [
            'code' => 204,
            'message' => 'No Content',
        ],

        'resetContent' => [
            'code' => 205,
            'message' => 'Reset Content',
        ],

        'partialContent' => [
            'code' => 206,
            'message' => 'Partial Content',
        ],

        'multiStatus' => [
            'code' => 207,
            'message' => 'Multi Status',
        ],

        'alreadyReported' => [
            'code' => 208,
            'message' => 'Already Reported',
        ],

        'imUsed' => [
            'code' => 226,
            'message' => 'IM Used',
        ],

        'multipleChoices' => [
            'code' => 300,
            'message' => 'Multiple Choices',
        ],

        'movedPermanently' => [
            'code' => 301,
            'message' => 'Moved Permanently',
        ],

        'found' => [
            'code' => 302,
            'message' => 'Found',
        ],

        'seeOther' => [
            'code' => 303,
            'message' => 'See Other',
        ],

        'notModified' => [
            'code' => 304,
            'message' => 'Not Modified',
        ],

        'useProxy' => [
            'code' => 305,
            'message' => 'Use Proxy',
        ],

        'temporaryRedirect' => [
            'code' => 307,
            'message' => 'Temporary Redirect',
        ],

        'permanentRedirect' => [
            'code' => 308,
            'message' => 'Permanent Redirect',
        ],

        'badRequest' => [
            'code' => 400,
            'message' => 'Bad Request',
        ],

        'unauthorized' => [
            'code' => 401,
            'message' => 'Unauthorized',
        ],

        'paymentRequired' => [
            'code' => 402,
            'message' => 'Payment Required',
        ],

        'forbidden' => [
            'code' => 403,
            'message' => 'Forbidden',
        ],

        'notFound' => [
            'code' => 404,
            'message' => 'Not Found',
        ],

        'methodNotAllowed' => [
            'code' => 405,
            'message' => 'Method Not Allowed',
        ],

        'notAcceptable' => [
            'code' => 406,
            'message' => 'Not Acceptable',
        ],

        'proxyAuthenticationRequired' => [
            'code' => 407,
            'message' => 'Proxy Authentication Required',
        ],

        'requestTimeout' => [
            'code' => 408,
            'message' => 'Request Timeout',
        ],

        'conflict' => [
            'code' => 409,
            'message' => 'Conflict',
        ],

        'gone' => [
            'code' => 410,
            'message' => 'Gone',
        ],

        'lengthRequired' => [
            'code' => 411,
            'message' => 'Length Required',
        ],

        'preconditionFailed' => [
            'code' => 412,
            'message' => 'Precondition Failed',
        ],

        'requestEntityTooLarge' => [
            'code' => 413,
            'message' => 'Request Entity Too Large',
        ],

        'requestURITooLong' => [
            'code' => 414,
            'message' => 'Request URI Too Long',
        ],

        'unsupportedMediaType' => [
            'code' => 415,
            'message' => 'Unsupported Media Type',
        ],

        'requestedRangeNotSatisfiable' => [
            'code' => 416,
            'message' => 'Requested Range Not Satisfiable',
        ],

        'expectationFailed' => [
            'code' => 417,
            'message' => 'Expectation Failed',
        ],


        /**
         * RFC: 4918
         *
         * - Usefully for validation errors
         */
        'unprocessableEntity' => [
            'code' => 422,
            'message' => 'Unprocessable Entity',
        ],

        'locked' => [
            'code' => 423,
            'message' => 'Locked',
        ],

        'failedDependency' => [
            'code' => 424,
            'message' => 'Failed Dependency',
        ],

        'tooEarly' => [
            'code' => 425,
            'message' => 'Too Early',
        ],

        'upgradeRequired' => [
            'code' => 426,
            'message' => 'Upgrade Required',
        ],

        'preconditionRequired' => [
            'code' => 428,
            'message' => 'Precondition Required',
        ],

        'tooManyRequests' => [
            'code' => 429,
            'message' => 'Too Many Requests',
        ],

        'requestHeaderFieldsTooLarge' => [
            'code' => 431,
            'message' => 'Request Header Fields Too Large',
        ],

        'noResponse' => [
            'code' => 444,
            'message' => 'No Response',
        ],

        'unavailableForLegalReasons' => [
            'code' => 451,
            'message' => 'Unavailable For Legal Reasons',
        ],

        'internalServerError' => [
            'code' => 500,
            'message' => 'Internal Server Error',
        ],

        'notImplemented' => [
            'code' => 501,
            'message' => 'Not Implemented',
        ],

        'badGateway' => [
            'code' => 502,
            'message' => 'Bad Gateway',
        ],

        'serviceUnavailable' => [
            'code' => 503,
            'message' => 'Service Unavailable',
        ],

        'gatewayTimeout' => [
            'code' => 504,
            'message' => 'Gateway Timeout',
        ],

        'httpVersionNotSupported' => [
            'code' => 505,
            'message' => 'HTTP Version Not Supported',
        ],

        'variantAlsoNegotiates' => [
            'code' => 506,
            'message' => 'Variant Also Negotiates',
        ],

        'insufficientStorage' => [
            'code' => 507,
            'message' => 'Insufficient Storage',
        ],

        'loopDetected' => [
            'code' => 508,
            'message' => 'Loop Detected',
        ],

        'notExtended' => [
            'code' => 510,
            'message' => 'Not Extended',
        ],

        'networkAuthenticationRequire' => [
            'code' => 511,
            'message' => 'Network Authentication Require',
        ],
    ],
];
