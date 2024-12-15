<?php

return [
	
	/*
	|--------------------------------------------------------------------------
	| Localization Configuration
	|--------------------------------------------------------------------------
	|
	| Determines whether to translate messages in API responses.
	|
	| If set to true, the message field will always be translated in the API responses.
	|
	*/
	'localization' => true,
	
	/*
	|--------------------------------------------------------------------------
	| Sort Configuration
	|--------------------------------------------------------------------------
	|
	| Determines whether to sort the response keys when set to true.
	|
	| If set to true, the response keys will be sorted in a regular order in the API responses.
	|
	*/
	'sort'         => false,
	
	/*
	|--------------------------------------------------------------------------
	| Fields Configuration
	|--------------------------------------------------------------------------
	|
	| The fields array defines which fields should be included or excluded
	| in the API responses.
	|
	| Each field is a string that represents the name of the field.
	| Each value is a boolean or callable that indicates whether the field should be included (true), excluded (false),
	| or call a function.
	|
	*/
	'fields'       => [
		
		/*
		|--------------------------------------------------------------------------
		| Fields Data Configuration
		|--------------------------------------------------------------------------
		|
		| Determines whether to include the data field in failed API responses.
		|
		| If set to true, the data field will always be included in the API responses.
		| If set to false, the data field will be included in the success API responses.
		|
		*/
		'data'      => true,
		
		/*
		|--------------------------------------------------------------------------
		| Fields Errors Configuration
		|--------------------------------------------------------------------------
		|
		| Determines whether to include the errors field in success API responses.
		|
		| If set to true, the error field will always be included in the API responses.
		| If set to false, the error field will be included in the failed API responses.
		|
		*/
		'errors'    => true,
		
		/*
		|--------------------------------------------------------------------------
		| Fields Execution Configuration
		|--------------------------------------------------------------------------
		|
		| Determines whether to include the execution time in milliseconds in API responses.
		|
		| If set to true, the execution time will be included in the API responses.
		| If set to false, the execution time will not be included in the API responses.
		| If set to a callable function, the return of the function will be included in the API responses as execution.
		|
		*/
		'execution' => true,
		
		/*
		|--------------------------------------------------------------------------
		| Fields Version Configuration
		|--------------------------------------------------------------------------
		|
		| Determines whether to include the app version in API responses (calculated by: env(APP_VERSION)).
		|
		| If set to true, the app version will be included in the API responses.
		| If set to false, the app version will not be included in the API responses.
		| If set to a callable function, the return of the function will be included in the API responses as version.
		|
		*/
		'version'   => true,
	],
	
	/*
	|--------------------------------------------------------------------------
	| Replaces Configuration
	|--------------------------------------------------------------------------
	|
	| The replaces array defines which fields should be renamed in the API responses.
	|
	| Each field is a string that represents the original name of the field.
	| Each value is a string that represents the new name of the field.
	|
	*/
	'replaces'     => [
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.status
		|--------------------------------------------------------------------------
		|
		| The key used to represent the HTTP status code in API responses.
		|
		*/
		'status'    => 'status',
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.message
		|--------------------------------------------------------------------------
		|
		| The key used to represent the message (default: HTTP status title) in API responses.
		|
		*/
		'message'   => 'message',
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.data
		|--------------------------------------------------------------------------
		|
		| The key used to represent the data in successful API responses.
		|
		*/
		'data'      => 'data',
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.errors
		|--------------------------------------------------------------------------
		|
		| The key used to represent the errors in failed API responses.
		|
		*/
		'errors'    => 'errors',
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.execution
		|--------------------------------------------------------------------------
		|
		| The key used to represent the execution time in API responses.
		|
		*/
		'execution' => 'execution',
		
		/*
		|--------------------------------------------------------------------------
		| Configuration key: replaces.version
		|--------------------------------------------------------------------------
		|
		| The key used to represent the application version in API responses.
		|
		*/
		'version'   => 'version',
	],
	
	/*
	|--------------------------------------------------------------------------
	| Custom Keys Configuration
	|--------------------------------------------------------------------------
	|
	| An array of custom keys that are appended in API Responses.
	|
	| The key of each item is the key name in the API response.
	| The value of each item can be a callable function or any type of PHP variable.
	| If the value is callable, mixed $content, int $status, string $message arguments will be passed to it.
	|
	*/
	'custom_keys'  => [
	
	],
	
	/*
	|--------------------------------------------------------------------------
	| Methods Configuration
	|--------------------------------------------------------------------------
	|
	| An array of HTTP responses in camelCase format as PHP arrays.
	|
	| The key of each method is a callable function in the APIResponse class that returns
	| a response with code as the HTTP status code and message as the HTTP status message.
	|
	*/
	'methods'      => [
		
		/*
		|--------------------------------------------------------------------------
		| OK Response
		|--------------------------------------------------------------------------
		|
		| Represents a successful response with HTTP status code 200.
		|
		| The message indicates that the request has succeeded.
		|
		*/
		'ok'                           => [
			'code'    => 200,
			'message' => 'OK',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Success Response
		|--------------------------------------------------------------------------
		|
		| Helper method that serves as an alias for the HTTP OK response.
		|
		| Represents a successful response with HTTP status code 200.
		|
		*/
		'success'                      => [
			'code'    => 200,
			'message' => 'Success',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Created Response
		|--------------------------------------------------------------------------
		|
		| Represents a successful response indicating that a resource has been created.
		|
		| The HTTP status code is 201.
		|
		*/
		'created'                      => [
			'code'    => 201,
			'message' => 'Created',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Accepted Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the request has been accepted for processing.
		|
		| The HTTP status code is 202.
		|
		*/
		'accepted'                     => [
			'code'    => 202,
			'message' => 'Accepted',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Non-Authoritative Information Response
		|--------------------------------------------------------------------------
		|
		| Represents a response that contains non-authoritative information.
		|
		| The HTTP status code is 203.
		|
		*/
		'nonAuthoritativeInformation'  => [
			'code'    => 203,
			'message' => 'Non Authoritative Information',
		],
		
		/*
		|--------------------------------------------------------------------------
		| No Content Response
		|--------------------------------------------------------------------------
		|
		| Represents a successful response with no content to return.
		|
		| The HTTP status code is 204.
		|
		*/
		'noContent'                    => [
			'code'    => 204,
			'message' => 'No Content',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Reset Content Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the client should reset the document view.
		|
		| The HTTP status code is 205.
		|
		*/
		'resetContent'                 => [
			'code'    => 205,
			'message' => 'Reset Content',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Partial Content Response
		|--------------------------------------------------------------------------
		|
		| Represents a response that contains partial data.
		|
		| The HTTP status code is 206.
		|
		*/
		'partialContent'               => [
			'code'    => 206,
			'message' => 'Partial Content',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Multi Status Response
		|--------------------------------------------------------------------------
		|
		| Represents a response that provides status for multiple independent operations.
		|
		| The HTTP status code is 207.
		|
		*/
		'multiStatus'                  => [
			'code'    => 207,
			'message' => 'Multi Status',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Already Reported Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the instance has already been reported.
		|
		| The HTTP status code is 208.
		|
		*/
		'alreadyReported'              => [
			'code'    => 208,
			'message' => 'Already Reported',
		],
		
		/*
		|--------------------------------------------------------------------------
		| IM Used Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server has fulfilled a request for the resource.
		|
		| The HTTP status code is 226.
		|
		*/
		'imUsed'                       => [
			'code'    => 226,
			'message' => 'IM Used',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Multiple Choices Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating multiple options for the resource.
		|
		| The HTTP status code is 300.
		|
		*/
		'multipleChoices'              => [
			'code'    => 300,
			'message' => 'Multiple Choices',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Moved Permanently Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the resource has been moved permanently.
		|
		| The HTTP status code is 301.
		|
		*/
		'movedPermanently'             => [
			'code'    => 301,
			'message' => 'Moved Permanently',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Found Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the resource has been found.
		|
		| The HTTP status code is 302.
		|
		*/
		'found'                        => [
			'code'    => 302,
			'message' => 'Found',
		],
		
		/*
		|--------------------------------------------------------------------------
		| See Other Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the client should perform a GET request to another URI.
		|
		| The HTTP status code is 303.
		|
		*/
		'seeOther'                     => [
			'code'    => 303,
			'message' => 'See Other',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Not Modified Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the resource has not been modified.
		|
		| The HTTP status code is 304.
		|
		*/
		'notModified'                  => [
			'code'    => 304,
			'message' => 'Not Modified',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Use Proxy Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the client must use a proxy to access the resource.
		|
		| The HTTP status code is 305.
		|
		*/
		'useProxy'                     => [
			'code'    => 305,
			'message' => 'Use Proxy',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Temporary Redirect Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the resource resides temporarily at a different URI.
		|
		| The HTTP status code is 307.
		|
		*/
		'temporaryRedirect'            => [
			'code'    => 307,
			'message' => 'Temporary Redirect',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Permanent Redirect Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the resource has been permanently moved to a new URI.
		|
		| The HTTP status code is 308.
		|
		*/
		'permanentRedirect'            => [
			'code'    => 308,
			'message' => 'Permanent Redirect',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Bad Request Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server cannot process the request due to a client error.
		|
		| The HTTP status code is 400.
		|
		*/
		'badRequest'                   => [
			'code'    => 400,
			'message' => 'Bad Request',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Unauthorized Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the request requires user authentication.
		|
		| The HTTP status code is 401.
		|
		*/
		'unauthorized'                 => [
			'code'    => 401,
			'message' => 'Unauthorized',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Payment Required Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that payment is required to access the resource.
		|
		| The HTTP status code is 402.
		|
		*/
		'paymentRequired'              => [
			'code'    => 402,
			'message' => 'Payment Required',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Forbidden Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server understood the request but refuses to authorize it.
		|
		| The HTTP status code is 403.
		|
		*/
		'forbidden'                    => [
			'code'    => 403,
			'message' => 'Forbidden',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Not Found Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server cannot find the requested resource.
		|
		| The HTTP status code is 404.
		|
		*/
		'notFound'                     => [
			'code'    => 404,
			'message' => 'Not Found',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Method Not Allowed Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the request method is not allowed for the requested resource.
		|
		| The HTTP status code is 405.
		|
		*/
		'methodNotAllowed'             => [
			'code'    => 405,
			'message' => 'Method Not Allowed',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Not Acceptable Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server cannot produce a response matching the list of acceptable values.
		|
		| The HTTP status code is 406.
		|
		*/
		'notAcceptable'                => [
			'code'    => 406,
			'message' => 'Not Acceptable',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Proxy Authentication Required Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the client must first authenticate itself with the proxy.
		|
		| The HTTP status code is 407.
		|
		*/
		'proxyAuthenticationRequired'  => [
			'code'    => 407,
			'message' => 'Proxy Authentication Required',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Request Timeout Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the server timed out waiting for the request.
		|
		| The HTTP status code is 408.
		|
		*/
		'requestTimeout'               => [
			'code'    => 408,
			'message' => 'Request Timeout',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Conflict Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the request could not be completed due to a conflict with the current state of the resource.
		|
		| The HTTP status code is 409.
		|
		*/
		'conflict'                     => [
			'code'    => 409,
			'message' => 'Conflict',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Gone Response
		|--------------------------------------------------------------------------
		|
		| Represents a response indicating that the requested resource is no longer available and will not be available again.
		|
		| The HTTP status code is 410.
		|
		*/
		'gone'                         => [
			'code'    => 410,
			'message' => 'Gone',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Length Required Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server refuses to accept the request without a defined
		| Content-Length header.
		|
		| The HTTP status code is 411.
		|
		*/
		'lengthRequired'               => [
			'code'    => 411,
			'message' => 'Length Required',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Precondition Failed Response
		|--------------------------------------------------------------------------
		|
		| Indicates that one or more conditions given in the request header fields
		| evaluated to false when tested on the server.
		|
		| The HTTP status code is 412.
		|
		*/
		'preconditionFailed'           => [
			'code'    => 412,
			'message' => 'Precondition Failed',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Request Entity Too Large Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is refusing to process a request because the
		| request payload is larger than the server is willing or able to process.
		|
		| The HTTP status code is 413.
		|
		*/
		'requestEntityTooLarge'        => [
			'code'    => 413,
			'message' => 'Request Entity Too Large',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Request URI Too Long Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is refusing to service the request because the
		| request-target is longer than the server is willing to interpret.
		|
		| The HTTP status code is 414.
		|
		*/
		'requestURITooLong'            => [
			'code'    => 414,
			'message' => 'Request URI Too Long',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Unsupported Media Type Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server refuses to accept the request because the payload
		| format is in an unsupported format.
		|
		| The HTTP status code is 415.
		|
		*/
		'unsupportedMediaType'         => [
			'code'    => 415,
			'message' => 'Unsupported Media Type',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Requested Range Not Satisfiable Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server cannot provide the requested byte range for the
		| resource.
		|
		| The HTTP status code is 416.
		|
		*/
		'requestedRangeNotSatisfiable' => [
			'code'    => 416,
			'message' => 'Requested Range Not Satisfiable',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Expectation Failed Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server cannot meet the requirements of the Expect
		| request-header field.
		|
		| The HTTP status code is 417.
		|
		*/
		'expectationFailed'            => [
			'code'    => 417,
			'message' => 'Expectation Failed',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Unprocessable Entity Response RFC: 4918
		|--------------------------------------------------------------------------
		|
		| Indicates that the server understands the content type of the request entity,
		| and the syntax is correct, but it was unable to process the contained instructions.
		| This status code is often used for validation errors.
		|
		| Usefully for validation errors.
		| The HTTP status code is 422.
		|
		*/
		'unprocessableEntity'          => [
			'code'    => 422,
			'message' => 'Unprocessable Entity',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Locked Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the resource that is being accessed is locked.
		|
		| The HTTP status code is 423.
		|
		*/
		'locked'                       => [
			'code'    => 423,
			'message' => 'Locked',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Failed Dependency Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the method could not be performed on the resource because
		| the requested action depended on another action and that action failed.
		|
		| The HTTP status code is 424.
		|
		*/
		'failedDependency'             => [
			'code'    => 424,
			'message' => 'Failed Dependency',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Too Early Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is unwilling to risk processing a request that might
		| be replayed.
		|
		| The HTTP status code is 425.
		|
		*/
		'tooEarly'                     => [
			'code'    => 425,
			'message' => 'Too Early',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Upgrade Required Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the client should switch to a different protocol such as TLS/1.0.
		|
		| The HTTP status code is 426.
		|
		*/
		'upgradeRequired'              => [
			'code'    => 426,
			'message' => 'Upgrade Required',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Precondition Required Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the origin server requires the request to be conditional.
		|
		| The HTTP status code is 428.
		|
		*/
		'preconditionRequired'         => [
			'code'    => 428,
			'message' => 'Precondition Required',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Too Many Requests Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the user has sent too many requests in a given amount of time.
		| This is often used for rate limiting.
		|
		| The HTTP status code is 429.
		|
		*/
		'tooManyRequests'              => [
			'code'    => 429,
			'message' => 'Too Many Requests',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Request Header Fields Too Large Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is unwilling to process the request because its
		| header fields are too large.
		|
		| The HTTP status code is 431.
		|
		*/
		'requestHeaderFieldsTooLarge'  => [
			'code'    => 431,
			'message' => 'Request Header Fields Too Large',
		],
		
		/*
		|--------------------------------------------------------------------------
		| No Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server has successfully processed the request, but is not
		| returning any content.
		|
		| The HTTP status code is 444.
		|
		*/
		'noResponse'                   => [
			'code'    => 444,
			'message' => 'No Response',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Unavailable For Legal Reasons Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is denying access to the resource as a consequence
		| of a legal demand. This status code is used when the resource is unavailable
		| for legal reasons.
		|
		| The HTTP status code is 451.
		|
		*/
		'unavailableForLegalReasons'   => [
			'code'    => 451,
			'message' => 'Unavailable For Legal Reasons',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Internal Server Error Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server encountered an unexpected condition that prevented
		| it from fulfilling the request. This is a generic error message.
		|
		| The HTTP status code is 500.
		|
		*/
		'internalServerError'          => [
			'code'    => 500,
			'message' => 'Internal Server Error',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Not Implemented Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server does not support the functionality required to
		| fulfill the request. This is often used for methods that are not supported.
		|
		| The HTTP status code is 501.
		|
		*/
		'notImplemented'               => [
			'code'    => 501,
			'message' => 'Not Implemented',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Bad Gateway Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server, while acting as a gateway or proxy, received an
		| invalid response from the upstream server it accessed in attempting to
		| fulfill the request.
		|
		| The HTTP status code is 502.
		|
		*/
		'badGateway'                   => [
			'code'    => 502,
			'message' => 'Bad Gateway',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Service Unavailable Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is currently unable to handle the request due to
		| temporary overloading or maintenance of the server.
		|
		| The HTTP status code is 503.
		|
		*/
		'serviceUnavailable'           => [
			'code'    => 503,
			'message' => 'Service Unavailable',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Gateway Timeout Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server, while acting as a gateway or proxy, did not
		| receive a timely response from the upstream server or some other auxiliary
		| server it needed in order to complete the request.
		|
		| The HTTP status code is 504.
		|
		*/
		'gatewayTimeout'               => [
			'code'    => 504,
			'message' => 'Gateway Timeout',
		],
		
		/*
		|--------------------------------------------------------------------------
		| HTTP Version Not Supported Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server does not support the HTTP protocol version that
		| was used in the request message.
		|
		| The HTTP status code is 505.
		|
		*/
		'httpVersionNotSupported'      => [
			'code'    => 505,
			'message' => 'HTTP Version Not Supported',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Variant Also Negotiates Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server has an internal configuration error: the chosen
		| variant resource is configured to engage in content negotiation itself,
		| and is therefore not a proper variant.
		|
		| The HTTP status code is 506.
		|
		*/
		'variantAlsoNegotiates'        => [
			'code'    => 506,
			'message' => 'Variant Also Negotiates',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Insufficient Storage Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server is unable to store the representation needed to
		| complete the request. This is typically used when the server is out of
		| storage space.
		|
		| The HTTP status code is 507.
		|
		*/
		'insufficientStorage'          => [
			'code'    => 507,
			'message' => 'Insufficient Storage',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Loop Detected Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the server detected an infinite loop while processing a
		| request. This is typically used in situations where a request is
		| repeatedly redirected.
		|
		| The HTTP status code is 508.
		|
		*/
		'loopDetected'                 => [
			'code'    => 508,
			'message' => 'Loop Detected',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Not Extended Response
		|--------------------------------------------------------------------------
		|
		| Indicates that further extensions to the request are required for the
		| server to fulfill it. This status code is used when the server requires
		| additional information to process the request.
		|
		| The HTTP status code is 510.
		|
		*/
		'notExtended'                  => [
			'code'    => 510,
			'message' => 'Not Extended',
		],
		
		/*
		|--------------------------------------------------------------------------
		| Network Authentication Required Response
		|--------------------------------------------------------------------------
		|
		| Indicates that the client must authenticate itself to get the requested
		| response. This status code is used when the client needs to authenticate
		| with a proxy.
		|
		| The HTTP status code is 511.
		|
		*/
		'networkAuthenticationRequire' => [
			'code'    => 511,
			'message' => 'Network Authentication Require',
		],
	],
];
