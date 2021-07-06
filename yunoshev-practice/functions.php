<?php

function getStatusText($httpCode) {
    switch ($httpCode) {
        case 100: $text = 'Continue'; break;
        case 101: $text = 'Switching Protocols'; break;
        case 102: $text = 'Processing'; break;
        case 103: $text = 'Early Hints'; break;

        case 200: $text = 'OK'; break;
        case 201: $text = 'Created'; break;
        case 202: $text = 'Accepted'; break;
        case 203: $text = 'Non-Authoritative Information'; break;
        case 204: $text = 'No Content'; break;
        case 205: $text = 'Reset Content'; break;
        case 206: $text = 'Partial Content'; break;
        case 207: $text = 'Multi-Status'; break;
        case 208: $text = 'Already Reported'; break;
        case 226: $text = 'IM Used'; break;

        case 300: $text = 'Multiple Choices'; break;
        case 301: $text = 'Moved Permanently'; break;
        case 302: $text = 'Moved Temporarily'; break;
        case 303: $text = 'See Other'; break;
        case 304: $text = 'Not Modified'; break;
        case 305: $text = 'Use Proxy'; break;
        case 307: $text = 'Temporary Redirect'; break;
        case 308: $text = 'Permanent Redirect'; break;
        
        case 400: $text = 'Bad Request'; break;
        case 401: $text = 'Unauthorized'; break;
        case 402: $text = 'Payment Required'; break;
        case 403: $text = 'Forbidden'; break;
        case 404: $text = 'Not Found'; break;
        case 405: $text = 'Method Not Allowed'; break;
        case 406: $text = 'Not Acceptable'; break;
        case 407: $text = 'Proxy Authentication Required'; break;
        case 408: $text = 'Request Time-out'; break;
        case 409: $text = 'Conflict'; break;
        case 410: $text = 'Gone'; break;
        case 411: $text = 'Length Required'; break;
        case 412: $text = 'Precondition Failed'; break;
        case 413: $text = 'Request Entity Too Large'; break;
        case 414: $text = 'Request-URI Too Large'; break;
        case 415: $text = 'Unsupported Media Type'; break;
        case 416: $text = 'Range Not Satisfiable'; break;
        case 417: $text = 'Expectation Failed'; break;
        case 418: $text = 'I’m a teapot'; break;
        case 419: $text = 'Authentication Timeout (not in RFC 2616)'; break;
        case 421: $text = 'Misdirected Request'; break;
        case 422: $text = 'Unprocessable Entity'; break;
        case 423: $text = 'Locked'; break;
        case 424: $text = 'Failed Dependency'; break;
        case 425: $text = 'Too Early'; break;
        case 426: $text = 'Upgrade Required'; break;
        case 428: $text = 'Precondition Required'; break;
        case 429: $text = 'Too Many Requests'; break;
        case 431: $text = 'Request Header Fields Too Large'; break;
        case 449: $text = 'Retry With'; break;
        case 451: $text = 'Unavailable For Legal Reasons'; break;
        case 499: $text = 'Client Closed Request'; break;

        case 500: $text = 'Internal Server Error'; break;
        case 501: $text = 'Not Implemented'; break;
        case 502: $text = 'Bad Gateway'; break;
        case 503: $text = 'Service Unavailable'; break;
        case 504: $text = 'Gateway Time-out'; break;
        case 505: $text = 'HTTP Version not supported'; break;
        case 506: $text = 'Variant Also Negotiates'; break;
        case 507: $text = 'Insufficient Storage'; break;
        case 508: $text = 'Loop Detected'; break;
        case 509: $text = 'Bandwidth Limit Exceeded'; break;
        case 510: $text = 'Not Extended'; break;
        case 511: $text = 'Network Authentication Required'; break;
        case 520: $text = 'Unknown Error'; break;
        case 521: $text = 'Web Server Is Down'; break;
        case 522: $text = 'Connection Timed Out'; break;
        case 523: $text = 'Origin Is Unreachable'; break;
        case 524: $text = 'A Timeout Occurred'; break;
        case 525: $text = 'SSL Handshake Failed'; break;
        case 526: $text = 'Invalid SSL Certificate'; break;
       
        default: $text = 'Unknown http status code "' . htmlentities($httpCode) . '"'; break;
    }
    return $text;
}

function getStatusType($httpCode) {
    if ($httpCode >= 100 && $httpCode < 200) $type = 'Information';
    else if ($httpCode >= 200 && $httpCode < 300) $type = 'Success';
    else if ($httpCode >= 300 && $httpCode < 400) $type = 'Redirection';
    else if ($httpCode >= 400 && $httpCode < 500) $type = 'Client Error';
    else if ($httpCode >= 500 && $httpCode < 600) $type = 'Server Error';
    else $type = "Unknown";
    return $type;
}

function getDefaultErrorSpecifications($httpCode) {
    switch ($httpCode) {        
        case 400: $text = 'The server cannot or will not process the request due to an apparent client error 
            (e.g., malformed request syntax, size too large, invalid request message framing, or deceptive 
            request routing).'; break;
        case 401: $text = 'Similar to 403 Forbidden, but specifically for use when authentication 
            is required and has failed or has not yet been provided.'; break;
        case 402: $text = 'The original intention was that this code might be used as part of some form of digital 
            cash or micropayment scheme, as proposed, for example, by GNU Taler, but that has not yet happened, 
            and this code is not widely used.'; break;
        case 403: $text = 'The request contained valid data and was understood by the server, but the server is refusing action.'; break;
        case 404: $text = 'The requested resource could not be found but may be available in the future.'; break;
        case 405: $text = 'A request method is not supported for the requested resource; for example, 
            a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.';break;
        case 406: $text = 'The requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request.'; break;
        case 407: $text = 'The client must first authenticate itself with the proxy.';  break;
        case 408: $text = 'The server timed out waiting for the request.'; break;
        case 409: $text = 'Indicates that the request could not be processed because of conflict in the current state of the resource, 
            such as an edit conflict between multiple simultaneous updates.'; break;
        case 410: $text = 'Indicates that the resource requested is no longer available and will not be available again.'; break;
        case 411: $text = 'The request did not specify the length of its content, which is required by the requested resource.'; break;
        case 412: $text = 'The server does not meet one of the preconditions that the requester put on the request header fields.'; break;
        case 413: $text = 'The request is larger than the server is willing or able to process.'; break;
        case 414: $text = 'The URI provided was too long for the server to process.'; break;
        case 415: $text = 'The request entity has a media type which the server or resource does not support. 
            For example, the client uploads an image as image/svg+xml, but the server requires that images use a different format.'; break;
        case 416: $text = 'The client has asked for a portion of the file (byte serving), but the server cannot supply that portion. 
            For example, if the client asked for a part of the file that lies beyond the end of the file. Called "Requested Range Not Satisfiable" previously.'; break;
        case 417: $text = 'The server cannot meet the requirements of the Expect request-header field.'; break;
        case 418: $text = "This code was defined in 1998 as one of the traditional IETF April Fools' jokes, in RFC 2324, 
            Hyper Text Coffee Pot Control Protocol, and is not expected to be implemented by actual HTTP servers."; break;
        case 421: $text = 'The request was directed at a server that is not able to produce a response (for example because of connection reuse).'; break;
        case 422: $text = 'The request was well-formed but was unable to be followed due to semantic errors.'; break;
        case 423: $text = 'The resource that is being accessed is locked.'; break;
        case 424: $text = 'The request failed because it depended on another request and that request failed (e.g., a PROPPATCH).'; break;
        case 425: $text = 'Indicates that the server is unwilling to risk processing a request that might be replayed.'; break;
        case 426: $text = 'The client should switch to a different protocol such as TLS/1.3, given in the Upgrade header field.'; break;
        case 428: $text = 'The origin server requires the request to be conditional.'; break;
        case 429: $text = 'The user has sent too many requests in a given amount of time. Intended for use with rate-limiting schemes.'; break;
        case 431: $text = 'The server is unwilling to process the request because either an individual header field, 
            or all the header fields collectively, are too large.'; break;
        case 451: $text = 'A server operator has received a legal demand to deny access to a resource or to a set of resources 
            that includes the requested resource.'; break;
  
        case 500: $text = 'A generic error message, given when an unexpected condition was encountered and no more specific message is suitable.'; break;
        case 501: $text = 'The server either does not recognize the request method, or it lacks the ability to fulfil the request. 
            Usually this implies future availability (e.g., a new feature of a web-service API).'; break;
        case 502: $text = 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.'; break;
        case 503: $text = 'The server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state.'; break;
        case 504: $text = 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.'; break;
        case 505: $text = 'The server does not support the HTTP protocol version used in the request.'; break;
        case 506: $text = 'Transparent content negotiation for the request results in a circular reference.'; break;
        case 507: $text = 'The server is unable to store the representation needed to complete the request.'; break;
        case 508: $text = 'The server detected an infinite loop while processing the request (sent instead of 208 Already Reported).'; break;
        case 510: $text = 'Further extensions to the request are required for the server to fulfil it.'; break;
        case 511: $text = 'The client needs to authenticate to gain network access. Intended for use by intercepting proxies used to control access 
            to the network (e.g., "captive portals" used to require agreement to Terms of Service before granting full Internet access via a Wi-Fi hotspot).'; break;
  
        default: $text = 'No description'; break;
    }
    return $text;
}

?>