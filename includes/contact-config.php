<?php
/**
 * Set these to confirmed, monitored company email addresses before enabling
 * public message delivery. Environment variables override these values.
 */
return [
    'recipient' => getenv('ITES_CONTACT_EMAIL') ?: '',
    'sender' => getenv('ITES_CONTACT_FROM') ?: '',
];
