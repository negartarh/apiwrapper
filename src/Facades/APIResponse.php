<?php

namespace Negartarh\APIWrapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class APIResponse
 *
 * Facade for the APIResponse service, providing a static interface to the underlying service.
 *
 * @method static \Illuminate\Http\Response ok(mixed $content = '', string $message = 'OK', array $headers = []) Return a response with HTTP status 200 (OK).
 *
 * @method static \Illuminate\Http\Response success(mixed $content = '', string $message = 'Success', array $headers = []) Return a response with HTTP status 200 (Success).
 *
 * @method static \Illuminate\Http\Response created(mixed $content = '', string $message = 'Created', array $headers = []) Return a response with HTTP status 201 (Created).
 *
 * @method static \Illuminate\Http\Response accepted(mixed $content = '', string $message = 'Accepted', array $headers = []) Return a response with HTTP status 202 (Accepted).
 *
 * @method static \Illuminate\Http\Response nonAuthoritativeInformation(mixed $content = '', string $message = 'Non Authoritative Information', array $headers = []) Return a response with HTTP status 203 (Non Authoritative Information).
 *
 * @method static \Illuminate\Http\Response noContent(mixed $content = '', string $message = 'No Content', array $headers = []) Return a response with HTTP status 204 (No Content).
 *
 * @method static \Illuminate\Http\Response resetContent(mixed $content = '', string $message = 'Reset Content', array $headers = []) Return a response with HTTP status 205 (Reset Content).
 *
 * @method static \Illuminate\Http\Response partialContent(mixed $content = '', string $message = 'Partial Content', array $headers = []) Return a response with HTTP status 206 (Partial Content).
 *
 * @method static \Illuminate\Http\Response multiStatus(mixed $content = '', string $message = 'Multi Status', array $headers = []) Return a response with HTTP status 207 (Multi Status).
 *
 * @method static \Illuminate\Http\Response alreadyReported(mixed $content = '', string $message = 'Already Reported', array $headers = []) Return a response with HTTP status 208 (Already Reported).
 *
 * @method static \Illuminate\Http\Response imUsed(mixed $content = '', string $message = 'IM Used', array $headers = []) Return a response with HTTP status 226 (IM Used).
 *
 * @method static \Illuminate\Http\Response multipleChoices(mixed $content = '', string $message = 'Multiple Choices', array $headers = []) Return a response with HTTP status 300 (Multiple Choices).
 *
 * @method static \Illuminate\Http\Response movedPermanently(mixed $content = '', string $message = 'Moved Permanently', array $headers = []) Return a response with HTTP status 301 (Moved Permanently).
 *
 * @method static \Illuminate\Http\Response found(mixed $content = '', string $message = 'Found', array $headers = []) Return a response with HTTP status 302 (Found).
 *
 * @method static \Illuminate\Http\Response seeOther(mixed $content = '', string $message = 'See Other', array $headers = []) Return a response with HTTP status 303 (See Other).
 *
 * @method static \Illuminate\Http\Response notModified(mixed $content = '', string $message = 'Not Modified', array $headers = []) Return a response with HTTP status 304 (Not Modified).
 *
 * @method static \Illuminate\Http\Response useProxy(mixed $content = '', string $message = 'Use Proxy', array $headers = []) Return a response with HTTP status 305 (Use Proxy).
 *
 * @method static \Illuminate\Http\Response temporaryRedirect(mixed $content = '', string $message = 'Temporary Redirect', array $headers = []) Return a response with HTTP status 307 (Temporary Redirect).
 *
 * @method static \Illuminate\Http\Response permanentRedirect(mixed $content = '', string $message = 'Permanent Redirect', array $headers = []) Return a response with HTTP status 308 (Permanent Redirect).
 *
 * @method static \Illuminate\Http\Response badRequest(mixed $content = '', string $message = 'Bad Request', array $headers = []) Return a response with HTTP status 400 (Bad Request).
 *
 * @method static \Illuminate\Http\Response unauthorized(mixed $content = '', string $message = 'Unauthorized', array $headers = []) Return a response with HTTP status 401 (Unauthorized).
 *
 * @method static \Illuminate\Http\Response paymentRequired(mixed $content = '', string $message = 'Payment Required', array $headers = []) Return a response with HTTP status 402 (Payment Required).
 *
 * @method static \Illuminate\Http\Response forbidden(mixed $content = '', string $message = 'Forbidden', array $headers = []) Return a response with HTTP status 403 (Forbidden).
 *
 * @method static \Illuminate\Http\Response notFound(mixed $content = '', string $message = 'Not Found', array $headers = []) Return a response with HTTP status 404 (Not Found).
 *
 * @method static \Illuminate\Http\Response methodNotAllowed(mixed $content = '', string $message = 'Method Not Allowed', array $headers = []) Return a response with HTTP status 405 (Method Not Allowed).
 *
 * @method static \Illuminate\Http\Response notAcceptable(mixed $content = '', string $message = 'Not Acceptable', array $headers = []) Return a response with HTTP status 406 (Not Acceptable).
 *
 * @method static \Illuminate\Http\Response proxyAuthenticationRequired(mixed $content = '', string $message = 'Proxy Authentication Required', array $headers = []) Return a response with HTTP status 407 (Proxy Authentication Required).
 *
 * @method static \Illuminate\Http\Response requestTimeout(mixed $content = '', string $message = 'Request Timeout', array $headers = []) Return a response with HTTP status 408 (Request Timeout).
 *
 * @method static \Illuminate\Http\Response conflict(mixed $content = '', string $message = 'Conflict', array $headers = []) Return a response with HTTP status 409 (Conflict).
 *
 * @method static \Illuminate\Http\Response gone(mixed $content = '', string $message = 'Gone', array $headers = []) Return a response with HTTP status 410 (Gone).
 *
 * @method static \Illuminate\Http\Response lengthRequired(mixed $content = '', string $message = 'Length Required', array $headers = []) Return a response with HTTP status 411 (Length Required).
 *
 * @method static \Illuminate\Http\Response preconditionFailed(mixed $content = '', string $message = 'Precondition Failed', array $headers = []) Return a response with HTTP status 412 (Precondition Failed).
 *
 * @method static \Illuminate\Http\Response requestEntityTooLarge(mixed $content = '', string $message = 'Request Entity Too Large', array $headers = []) Return a response with HTTP status 413 (Request Entity Too Large).
 *
 * @method static \Illuminate\Http\Response requestURITooLong(mixed $content = '', string $message = 'Request URI Too Long', array $headers = []) Return a response with HTTP status 414 (Request URI Too Long).
 *
 * @method static \Illuminate\Http\Response unsupportedMediaType(mixed $content = '', string $message = 'Unsupported Media Type', array $headers = []) Return a response with HTTP status 415 (Unsupported Media Type).
 *
 * @method static \Illuminate\Http\Response requestedRangeNotSatisfiable(mixed $content = '', string $message = 'Requested Range Not Satisfiable', array $headers = []) Return a response with HTTP status 416 (Requested Range Not Satisfiable).
 *
 * @method static \Illuminate\Http\Response expectationFailed(mixed $content = '', string $message = 'Expectation Failed', array $headers = []) Return a response with HTTP status 417 (Expectation Failed).
 *
 * @method static \Illuminate\Http\Response unprocessableEntity(mixed $content = '', string $message = 'Unprocessable Entity', array $headers = []) Return a response with HTTP status 422 (Unprocessable Entity).
 *
 * @method static \Illuminate\Http\Response locked(mixed $content = '', string $message = 'Locked', array $headers = []) Return a response with HTTP status 423 (Locked).
 *
 * @method static \Illuminate\Http\Response failedDependency(mixed $content = '', string $message = 'Failed Dependency', array $headers = []) Return a response with HTTP status 424 (Failed Dependency).
 *
 * @method static \Illuminate\Http\Response tooEarly(mixed $content = '', string $message = 'Too Early', array $headers = []) Return a response with HTTP status 425 (Too Early).
 *
 * @method static \Illuminate\Http\Response upgradeRequired(mixed $content = '', string $message = 'Upgrade Required', array $headers = []) Return a response with HTTP status 426 (Upgrade Required).
 *
 * @method static \Illuminate\Http\Response preconditionRequired(mixed $content = '', string $message = 'Precondition Required', array $headers = []) Return a response with HTTP status 428 (Precondition Required).
 *
 * @method static \Illuminate\Http\Response tooManyRequests(mixed $content = '', string $message = 'Too Many Requests', array $headers = []) Return a response with HTTP status 429 (Too Many Requests).
 *
 * @method static \Illuminate\Http\Response requestHeaderFieldsTooLarge(mixed $content = '', string $message = 'Request Header Fields Too Large', array $headers = []) Return a response with HTTP status 431 (Request Header Fields Too Large).
 *
 * @method static \Illuminate\Http\Response noResponse(mixed $content = '', string $message = 'No Response', array $headers = []) Return a response with HTTP status 444 (No Response).
 *
 * @method static \Illuminate\Http\Response unavailableForLegalReasons(mixed $content = '', string $message = 'Unavailable For Legal Reasons', array $headers = []) Return a response with HTTP status 451 (Unavailable For Legal Reasons).
 *
 * @method static \Illuminate\Http\Response internalServerError(mixed $content = '', string $message = 'Internal Server Error', array $headers = []) Return a response with HTTP status 500 (Internal Server Error).
 *
 * @method static \Illuminate\Http\Response notImplemented(mixed $content = '', string $message = 'Not Implemented', array $headers = []) Return a response with HTTP status 501 (Not Implemented).
 *
 * @method static \Illuminate\Http\Response badGateway(mixed $content = '', string $message = 'Bad Gateway', array $headers = []) Return a response with HTTP status 502 (Bad Gateway).
 *
 * @method static \Illuminate\Http\Response serviceUnavailable(mixed $content = '', string $message = 'Service Unavailable', array $headers = []) Return a response with HTTP status 503 (Service Unavailable).
 *
 * @method static \Illuminate\Http\Response gatewayTimeout(mixed $content = '', string $message = 'Gateway Timeout', array $headers = []) Return a response with HTTP status 504 (Gateway Timeout).
 *
 * @method static \Illuminate\Http\Response httpVersionNotSupported(mixed $content = '', string $message = 'HTTP Version Not Supported', array $headers = []) Return a response with HTTP status 505 (HTTP Version Not Supported).
 *
 * @method static \Illuminate\Http\Response variantAlsoNegotiates(mixed $content = '', string $message = 'Variant Also Negotiates', array $headers = []) Return a response with HTTP status 506 (Variant Also Negotiates).
 *
 * @method static \Illuminate\Http\Response insufficientStorage(mixed $content = '', string $message = 'Insufficient Storage', array $headers = []) Return a response with HTTP status 507 (Insufficient Storage).
 *
 * @method static \Illuminate\Http\Response loopDetected(mixed $content = '', string $message = 'Loop Detected', array $headers = []) Return a response with HTTP status 508 (Loop Detected).
 *
 * @method static \Illuminate\Http\Response notExtended(mixed $content = '', string $message = 'Not Extended', array $headers = []) Return a response with HTTP status 510 (Not Extended).
 *
 * @method static \Illuminate\Http\Response networkAuthenticationRequire(mixed $content = '', string $message = 'Network Authentication Require', array $headers = []) Return a response with HTTP status 511 (Network Authentication Require).
 *
 * @method static \Illuminate\Http\Response make(int $status = 200, mixed $content = '', string $message = '', array $headers = []) Create a new response instance with the specified status, content, message, and headers.
 **
 * @method static \Illuminate\Http\Response status(int $status = 200, mixed $content = '', string $message = '', array $headers = []) Create a response based on the given status code.
 *
 * @method static array wrap(mixed $content = '', int $status = 200, string $message = '') Wrap the response content into a standardized format.
 *
 * @package Negartarh\APIWrapper\Facades
 */
class APIResponse extends Facade
{
	/**
	 * Get the registered name of the component in the container.
	 *
	 * This method returns the string identifier for the APIResponse service,
	 * allowing the facade to resolve the underlying instance from the service container.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor(): string
	{
		return 'APIResponse';
	}
}
