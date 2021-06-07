<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['googleplus']['client_id']        = '849508879709-l0tnahfmnaoesi22rb423hfn3pp3v7fi.apps.googleusercontent.com';
$config['googleplus']['client_secret']    = 'SqFxXskWtKS0OXB_2ifjY4T8';
$config['googleplus']['redirect_uri']     = SURL.'Login/google_response';
$config['googleplus']['application_name'] = 'DRS Restuarant';
$config['googleplus']['api_key']          = 'AIzaSyBCF8cAzLpX4HeJkoXzrrQy4sXVKXxDzt4';
$config['googleplus']['scopes']           = array();