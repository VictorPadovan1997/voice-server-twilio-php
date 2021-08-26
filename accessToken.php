<?php
include('./vendor/autoload.php');
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

// Required for all Twilio access tokens
$twilioAccountSid = 'ACbb0b9289fc6e7ca9fac6dd58187a1e61';
$twilioApiKey = 'SKea15f7557b4b905fc179afe942a0f615';
$twilioApiSecret = 'uxmQ69MVlgwwfYUVukapL4W23eb6nNBJ';

// Required for Voice grant
$outgoingApplicationSid = 'AP44ef5816d50dcb055cf7cf8c6f56b998';
// An identifier for your app - can be anything you'd like
$identity = "victor";

// Create access token, which we will serialize and send to the client
$token = new AccessToken(
    $twilioAccountSid,
    $twilioApiKey,
    $twilioApiSecret,
    3600,
    $identity
);

// Create Voice grant
$voiceGrant = new VoiceGrant();
$voiceGrant->setOutgoingApplicationSid($outgoingApplicationSid);

// Optional: add to allow incoming calls
$voiceGrant->setIncomingAllow(true);

// Add grant to token
$token->addGrant($voiceGrant);


echo $token->toJWT();
