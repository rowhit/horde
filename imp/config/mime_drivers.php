<?php
/**
 * MIME Viewer configuration for IMP.
 *
 * Settings in this file override settings in horde/config/mime_drivers.php.
 * All drivers configured in that file, but not configured here, will also
 * be used to display MIME content.
 *
 * IMPORTANT: DO NOT EDIT THIS FILE!
 * Local overrides MUST be placed in mime_drivers.local.php or mime_drivers.d/.
 * If the 'vhosts' setting has been enabled in Horde's configuration, you can
 * use mime_drivers-servername.php.
 *
 * Additional settings for IMP:
 *   - limit_inline_size: (integer) If present, limits the display of message
 *     data inline for large messages.  The value is the maximum number of
 *     bytes that can be shown for the part; above this limit, the user will
 *     only be able to download the part. An empty value (not set, or set to
 *     0) will disable this check.
 */

$mime_drivers = array(
    /* Plain text viewer. */
    'plain' => array(
        'inline' => true,
        'handles' => array(
            'application/pgp',
            'text/plain',
            'text/rfc822-headers'
        ),

        /* See above for description. */
        'limit_inline_size' => 1048576,

        /* Scans the text for inline PGP data. If true, will strip this data
         * out of the output (and, if PGP is active, will display the
         * results of the PGP action). */
        'pgp_inline' => false,

        /* If you want to scan ALL incoming text/plain messages for UUencoded
         * data, set the following to true. This is very performance intensive
         * and can take a long time for large messages. It is not recommended
         * (as UUencoded data is rare these days) and is disabled by
         * default. */
        'uudecode' => false
    ),

    /* HTML driver settings */
    'html' => array(
        /* NOTE: Inline HTML display is turned OFF by default. */
        'inline' => false,
        'handles' => array(
            'text/html'
        ),
        'icons' => array(
            'default' => 'html.png'
        ),

        /* See above for description. */
        'limit_inline_size' => 1048576,

        /* Check for phishing exploits? */
        'phishing_check' => true
    ),

    /* Default smil driver. */
    'smil' => array(
        'inline' => true,
        'handles' => array(
            'application/smil'
        )
    ),

    /* Image display. */
    'images' => array(
        'inline' => true,
        'handles' => array(
            'image/*'
        ),

        /* Display images inline that are less than this size (in bytes). */
        'inlinesize' => 262144,

        /* Display image thumbnails? */
        'thumbnails' => true,

        /* If displaying image thumbnails, send thumbnail data with the
         * base message data? This saves server accesses (1 for each thumbnail
         * generated in a message) at the expense that ALL thumbnails for a
         * message need to be generated before the message can be viewed. */
        'thumbnails_dataurl' => false
    ),

    /* Enriched text display. */
    'enriched' => array(
        'inline' => true,
        'handles' => array(
            'text/enriched'
        ),
        'icons' => array(
            'default' => 'text.png'
        )
    ),

    /* PDF display. */
    'pdf' => array(
        'handles' => array(
            'application/pdf',
            'application/x-pdf',
            'image/pdf'
        ),
        'icons' => array(
            'default' => 'pdf.png'
        ),

        /* Display PDF thumbnails? */
        'thumbnails' => true
    ),

    /* PGP (Pretty Good Privacy) display. */
    'pgp' => array(
        'inline' => true,
        'handles' => array(
            'application/pgp-encrypted',
            'application/pgp-keys',
            'application/pgp-signature'
        ),
        'icons' => array(
            'default' => 'encryption.png'
        )
    ),

    /* S/MIME display. */
    'smime' => array(
        'inline' => true,
        'handles' => array(
            'application/x-pkcs7-signature',
            'application/x-pkcs7-mime',
            'application/pkcs7-signature',
            'application/pkcs7-mime'
        ),
        'icons' => array(
            'default' => 'encryption.png'
        )
    ),

    /* vCard display. */
    'vcard' => array(
        'inline' => true,
        'handles' => array(
            'text/directory',
            'text/vcard',
            'text/x-vcard'
        ),
        'icons' => array(
            'default' => 'vcard.png'
        )
    ),

    /* Zip file display.
     * To access gzipped files, the zlib library must have been built into PHP
     * (with the --with-zlib option). */
    'zip' => array(
        'handles' => array(
            'application/x-compressed',
            'application/x-zip-compressed',
            'application/zip'
        ),
        'icons' => array(
            'default' => 'compressed.png'
        ),

        /* By default, ZIP contents are only shown if the user requests. Set
         * this value to true to automatically show the contents on the
         * initial load. */
        'show_contents' => false
    ),

    /* Tar file display.
     * To access gzipped files, the zlib library must have been built into PHP
     * (with the --with-zlib option). */
    'tgz' => array(
        'inline' => true,
        'handles' => array(
            'application/gzip',
            'application/x-compressed-tar',
            'application/x-gtar',
            'application/x-gzip',
            'application/x-gzip-compressed',
            'application/x-tar',
            'application/x-tgz'
        ),
        'icons' => array(
            'default' => 'compressed.png'
        )
    ),

    /* Delivery status messages display. */
    'status' => array(
        'inline' => true,
        'handles' => array(
            'message/delivery-status'
        )
    ),

    /* Message Disposition Notification (MDN) display. */
    'mdn' => array(
        'inline' => true,
        'handles' => array(
            'message/disposition-notification'
        )
    ),

    /* Appledouble message display. */
    'appledouble' => array(
        'inline' => true,
        'handles' => array(
            'multipart/appledouble'
        ),
        'icons' => array(
            'default' => 'apple.png'
        )
    ),

    /* ITIP (iCalendar Transport-Independent Interoperability Protocol)
     * display. */
    'itip' => array(
        'inline' => true,
        'handles' => array(
            'text/calendar',
            'text/x-vcalendar'
        ),
        'icons' => array(
            'default' => 'itip.png'
        ),

        /* How event replies are handled when a user opens the message.
         *   - false: Reply status is never automatically updated; requires
         *            explicit action by the user.
         *   - true: Reply status is always automatically updated.
         *   - Array: An array of domains for which replies are always
         *            automatically updated. All other domains require the
         *            reply status to be explicitly updated by user action. */
        'auto_update_eventreply' => false,

        /* How free/busy publish data is handled when a user opens the
         * message.
         *   - false: Free/busy data is never automatically updated; requires
         *            explicit action by the user.
         *   - true: Free/busy data is always automatically updated.
         *   - Array: An array of domains for which free/busy data is always
         *            automatically updated. All other domains require the
         *            free/busy data to be explicitly updated by user
         *            action. */
        'auto_update_fbpublish' => false,

        /* How free/busy replies are handled when a user opens the message.
         *   - false: Free/busy data is never automatically updated; requires
         *            explicit action by the user.
         *   - true: Free/busy data is always automatically updated.
         *   - Array: An array of domains for which free/busy data is always
         *            automatically updated. All other domains require the
         *            free/busy data to be explicitly updated by user
         *            action. */
        'auto_update_fbreply' => false
    ),

    /* Audio data. */
    'audio' => array(
        'handles' => array(
            'audio/*'
        ),
        'icons' => array(
            'default' => 'audio.png'
        )
    ),

    /* Video data. */
    'video' => array(
        'handles' => array(
            'video/*'
        ),
        'icons' => array(
            'default' => 'video.png'
        ),

        /* Display video thumbnails? */
        'thumbnails' => true,

        /* REQUIRED for thumbnails: location of ffmpeg binary.
         * http://ffmpeg.org/ */
        'ffmpeg' => '/usr/bin/ffmpeg'
    ),

    /* Alternative part display.
     * YOU SHOULD NOT NORMALLY ALTER THIS SETTING. */
    'alternative' => array(
        'inline' => true,
        'handles' => array(
            'multipart/alternative'
        )
    ),

    /* Related part display.
     * YOU SHOULD NOT NORMALLY ALTER THIS SETTING. */
    'related' => array(
        'inline' => true,
        'handles' => array(
            'multipart/related'
        ),
        'icons' => array(
            'default' => 'html.png'
        )
    ),

    /* Partial parts display.
     * YOU SHOULD NOT NORMALLY ALTER THIS SETTING. */
    'partial' => array(
        'handles' => array(
            'message/partial'
        )
    ),

    /* Digest message (RFC 2046 [5.2.1]) display.
     * YOU SHOULD NOT NORMALLY ALTER THIS SETTING. */
    'rfc822' => array(
        'handles' => array(
            'message/rfc822',
            'x-extension/eml'
        )
    ),

    /* External-body (RFC 2046 [5.2.3]) display.
     * YOU SHOULD NOT NORMALLY ALTER THIS SETTING. */
    'externalbody' => array(
        'handles' => array(
            'message/external-body'
        )
    )
);
